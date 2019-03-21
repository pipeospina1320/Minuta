$(document).ready(function(){

  NProgress.start();
  NProgress.set(0.4);
  //Increment
  var interval = setInterval(function() { NProgress.inc(); }, 1000);
  $(document).ready(function(){
      NProgress.done();
      clearInterval(interval);
  });
  //Cuando el formulario con ID acceso se envíe...
  $('form[name="frmlogin[]"]').on("submit", function(e){
    e.preventDefault();
      var user = $("#UserUsername").val();
      var pass = $("#UserPassword").val();
      if(user!="" && pass!=""){
        $.post("index.php?c=home&a=loginUser",{do_login:"do_login", user:user, password:pass}, function(data){
          // console.log(data);
          if ($.trim(data) == true) {
            location.href="MisionVision";
          }else if ($.trim(data) == "successpassword" ) {
              $("#mostrarmodal").modal("show");
            }else if ($.trim(data) == "authentication") {
              $("#resultalogin").html("Identificación o Contraseña son Incorrectos");
              $("#resultalogin").css({"text-align": "center", "color": "red"});
            }
          });
      }

  });


var Validate = {
  config: {
    minLen: 6,
    bothCase: true,
    alphNum: true,
    classContainer: '.formContainer',
    classPassword: '.pass1',
    classConfirm: '.pass2',
    classMsgBox:'.msgBox'
  },
  init: function(config){
    $.extend(Validate.config, config);
    this.elPassword = $(this.config.classPassword);
    this.elConfirm = $(this.config.classConfirm);
    this.elMsgBox = $(this.config.classMsgBox);

    var objInput = this.elPassword;
    this.elMsgBox.hide();
    this.elConfirm.on('click', Validate.setFocus);
    $('body').on('focus.password', this.config.classPassword, Validate.validate);
    $('body').on('blur.password', this.config.classPassword, Validate.validate);
    $('body').on('keyup.password', this.config.classPassword, Validate.validate);

  },
  setFocus: function(){
    var container = Validate.config.classContainer,
        msg = $(this).closest(container).find(Validate.config.classMsgBox).text();
    (msg !== 'aprobado') && $(this).closest(container).find(Validate.config.classPassword).focus();
  },
  showError: function(msg, objInput){
    var container = Validate.config.classContainer,
        msgBox = objInput.closest(container).find('.passwordValidator'),
        objConfirm = objInput.closest(container).find(Validate.config.classConfirm);
    if(msg === 'aprobado'){
      msgBox.html(msg).delay(500).slideUp();
    }else{
      msgBox.is(':hidden') ? msgBox.html(msg).slideDown() : msgBox.html(msg);
      objConfirm.val('');
    }
    return false
  },
  validate: function(){
    var objInput = $(this),
        regExp;

    if(objInput.val().length < Validate.config.minLen){
        Validate.showError("La contraseña debe contener al menos " + Validate.config.minLen + " caracteres alfanuméricos ", objInput);
        return false;
      }
      else{

        regExp = /[a-z]/;
        if(Validate.config.bothCase && !regExp.test(objInput.val())){
          Validate.showError("La contraseña debe contener al menos una letra minúscula (a-z)", objInput);
          return false;
        }

        // regExp = /[A-Z]/;
        // if(Validate.config.bothCase && !regExp.test(objInput.val())){
        //   Validate.showError("La contraseña debe contener al menos una letra mayúscula (A-Z)", objInput);
        //   return false;
        // }

        regExp = /[0-9]/;
        if(Validate.config.alphNum && !regExp.test(objInput.val())){
          Validate.showError("La contraseña debe contener al menos un número (0-9)", objInput);
          return false;
        }

        Validate.showError("aprobado", objInput)
        return false;
      }
  }
}

// console.clear();

Validate.init({
  classPassword: '.textPassword',
  classConfirm: '.textConfirmPassword',
  classMsgBox:'.passwordValidator',
})
  $('form[name="frmpassword[]"]').on('submit', function(e){
      e.preventDefault();
        var password = $("#pwd").val();
        var confirmpassword = $("#confpwd").val();

  if(password != confirmpassword){
    $('#error').text("Las contraseñas que escribió no coinciden o no están completas");
  }
  else if(password == confirmpassword) {
    $("#error").remove();

    $.ajax({
      type: 'POST',
      url: 'index.php?c=home&a=passwordNew',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data) {
     if (data == true) {
      $("#mostrarmodal").modal("hide");
       swal({  title: "La Contraseña",
            text: "Fue Guardada Correctamente Por Favor No Olvidarla ",
            type: "success",
            confirmButtonColor: "#337AB7",
            showConfirmButton: true},
            function(isConfirm){
              if (isConfirm) {
                 location.href="MisionVision";
              }
            }
           );
     }else if (data == false) {
       location.href="Error500";
     }
  }
    });
  }
  });

});

// 1. copiar y pegar en la vista despues de ingresar jquery Nota: Estudiar Jquery $.post
//
//       $("document").ready(function(){
//         $("#btnSearch").click(function(){
//           var datoingresado = $("#data").val();
//
//
//           $.post("index.php?c=home&a=search",{dato: datoingresado}, function(data){
//               $("#resultado").html(data);
//           });
//         });
//       });
//
//
// 2. Copiar y pegar en el controlador
//
//   public function search(){
//
//     $resultSearch = $this->model->readEvents($_POST["dato"]);
//     print_r($resultSearch);
//
// }

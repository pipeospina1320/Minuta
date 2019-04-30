$(document).ready(function(){
  //######################################################
  // INICIO NOVEDADADES
  //######################################################

  // Inicio funcion para guardar datos en la bd las Novedades
  $('form[name="frmnovedad[]"]').on("submit", function(e){
    e.preventDefault();
    var sede = $("#selecionasede").val();
    var servicio = $("#frmnovedadservicio").val();
    var turno = $("#frmnovedadturno").val();
    var novedad = $("#frmnovedadnovedad").val();
    var fecha = $("#frmnovedadfecha").val();
    var tnovedad = $("#frmnovedadtipo").val();
    if (sede != "" && servicio != "" && turno != "" && novedad != "" && fecha != "" && tnovedad != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=novedad&a=createNovedad',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
          // console.log(data);
       if (data == true) {
         swal({  title: "La Novedad",
              text: "Fue Enviado Exitosamente",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteNovedades";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }
    }
      });
    }

  });

  //Valida si se subio un archivo IMAGENES
  $('#frmnovedadfile').change( function() {
    if(this.files[0].size > 51200000) { // 512000 bytes = 500 Kb
    		$(this).val('');
        swal({
          title: "Lo Sentimos.",
          text: "El archivo supera el límite de peso permitido.",
          type: "error",
          confirmButtonColor: "#337AB7",
        });
    } else { //ok
       var formato = (this.files[0].name).split('.').pop();
       	if(formato.toLowerCase() == 'jpg' || formato.toLowerCase() == 'png' || formato.toLowerCase() == 'jpeg') {

        } else {
          $(this).val('');
          swal({
            title: "Lo Sentimos.",
            text: "Seleccione un archivo de IMAGEN válida..",
            type: "error",
            confirmButtonColor: "#337AB7",
          });
        }
       }
  });
  // Fin funcion para guardar datos en la bd las Novedades
  $('form[name="frmObservacion[]"]').on("submit", function(e){
    e.preventDefault();
    var obsernovedad = $("#observacionnovedades").val();
    var obserfecha = $("#observacionnovedades").val();
    var obserid = $("#observacionnovedades").val();

    if (obsernovedad != "" && obserfecha != "" && obserid != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=novedad&a=createObservacion',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
        $("#exampleModal").modal("hide");
         swal({  title: "La Observación",
              text: "Fue Enviada Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                    location.reload();
                   // location.href="ConsultaNovedades-Total";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }
    }
      });
    }
  });

  //######################################################
  // FIN NOVEDADADES
  //######################################################

  //######################################################
  // INICIO DOTACION
  //######################################################
  // Inicio funcion para guardar datos en la bd las dotaciones
  $('form[name="frmdotacion[]"]').on("submit", function(e){
    e.preventDefault();
    var dotaelement = $("#frmdotacionelemto").val();
    var dotaserie = $("#frmdotacionserie").val();
    var dotaaspecto = $("#frmdotacionestdo").val();
    var dotafecha = $("#frmdotacionestdofecha").val();
    if (dotaelement != "" && dotaserie != "" && dotaaspecto != "" && dotafecha != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=dotacion&a=createDotacion',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Dotación",
              text: "Fue Reportada Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteDotacion";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }
    }
      });
    }
  });
  // Fin funcion para guardar datos en la bd las dotaciones
  //######################################################
  // FIN DOTACION
  //######################################################

  //######################################################
  // INICIO PROTOCOLOS
  //######################################################

  // Inicio funcion para guardar y borrar datos en la bd los Protocolos
  $('form[name="frmprotocolo[]"]').on("submit", function(e){
    e.preventDefault();
    var categoria = $("#selecionacateproto").val();
    var descripcion = $("#frmprotocolodescrip").val();
    var files = $("#frmprotocolofile").val();

    if (categoria != "" && descripcion != "" && files != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=protocolo&a=createProtocolo',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "El Protocolo",
              text: "Fue Creado Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteProtocolos";
                }
              }
             );
       }else if (data == false) {
         location.href="Error500";
       }
    },
      });
    }
  });

  //Valida si se subio un archivo PDF
  $("#frmprotocolofile").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frmprotocolofile").val('');
          return false;
      }
  });

//funcion para eliminar un protocolo
  $(document).on("click", "#borrarArchivoProto", function(){
    var borrarArchivoProto  = $(this).data("idborrar");
    swal({
            title: "Estás seguro?",
            text: "De Eliminar Este Protocolo!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#E74C3C",
            confirmButtonText: "Si, Eliminar!",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (!isConfirm) return;
            $.post("index.php?c=protocolo&a=borrarArchivoProto",{borrar:borrarArchivoProto}, function(data){
              if (data == true) {
                swal({  title: "El Protocolo",
                     text: "Fue eliminado exitosamente",
                     type: "success",
                     confirmButtonColor: "#337AB7",
                     showConfirmButton: true},
                     function(isConfirm){
                       if (isConfirm) {
                          location.href="ReporteProtocolos";
                       }
                     }
                    );
              }else if (data == false) {
                location.href="Error500";
              }
        });
    });
  });
  // Fin funcion para guardar y borrar datos en la bd los Protocolos

  // Inicio funcion para editar y guardar datos en la bd los Protocolos
  $('form[name="frmeditarprotocolo[]"]').on("submit", function(e){
    e.preventDefault();
    var categoriaedit = $("#selecionacateprotoedit").val();
    var descripcionedit = $("#frmprotocolodescripedit").val();
    var filesedit = $("#frmprotocolofileedit").val();

    if (categoriaedit != "" && descripcionedit != "" && filesedit != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=protocolo&a=updateProtocolo',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "El Protocolo",
              text: "Fue actualizado exitosamente",
              type: "success",
              confirmButtonColor: "#337ab7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteProtocolos";
                }
              }
             );
       }else if (data == false) {
         location.href="Error500";
       }
    },
      });
    }
  });

  //Valida si se subio un archivo PDF
  $("#frmprotocolofileedit").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frmprotocolofileedit").val('');
          return false;
      }
  });
  // Fin funcion para editar y guardar datos en la bd los Protocolos
  //######################################################
  // FIN PROTOCOLOS
  //######################################################

  //######################################################
  // INICIO CONSIGNAS
  //######################################################
  // Inicio funcion para guardar y borrar datos en la bd las Consignas Generales
  $('form[name="frmconsigene[]"]').on("submit", function(e){
    e.preventDefault();
    var title = $("#frmconsigenetitle").val();
    var descripcion = $("#frmconsigenedesp").val();
    var files = $("#frmconsigenefile").val();

    if (title != "" && descripcion != "" && files != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=consigna&a=createConsigGene',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Consigna",
              text: "Fue Creada Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteConsignas";
                }
              }
             );
       }else if (data == false) {
         location.href="Error500";
       }
    },
      });
    }
  });

  //Valida si se subio un archivo PDF
  $("#frmconsigenefile").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frmconsigenefile").val('');
          return false;
      }
  });

  //funcion para eliminar una consigna general
    $(document).on("click", "#borrarArchivo", function(){
      var borrarArchivo  = $(this).data("idborrar");
      swal({
              title: "Estás seguro?",
              text: "De Eliminar Esta Consigna!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#E74C3C",
              confirmButtonText: "Si, Eliminar!",
              closeOnConfirm: false
          }, function (isConfirm) {
              if (!isConfirm) return;
              $.post("index.php?c=consigna&a=borrarArchivo",{Borrar:borrarArchivo}, function(data){
                if (data == true) {
                  swal({  title: "La Consigna",
                       text: "Fue eliminada exitosamente",
                       type: "success",
                       confirmButtonColor: "#337AB7",
                       showConfirmButton: true},
                       function(isConfirm){
                         if (isConfirm) {
                            location.href="ReporteConsignas";
                         }
                       }
                      );
                }else if (data == false) {
                  location.href="Error500";
                }
          });
      });
    });
  // Fin funcion para guardar datos en la bd las Consignas Generales

  // Inicio funcion para editar y guardar datos en la bd las Consignas Generales
  $('form[name="frmeditarconsigene[]"]').on("submit", function(e){
    e.preventDefault();
    var titleeditconsig = $("#frmeditarconsigenetitle").val();
    var descripcioneditconsig = $("#frmeditarconsigenedesp").val();
    var fileseditconsig = $("#frmeditarconsigenefile").val();

    if (titleeditconsig != "" && descripcioneditconsig != "" && fileseditconsig != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=consigna&a=updateConsigGene',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Consigna",
              text: "Fue Actualizada exitosamente",
              type: "success",
              confirmButtonColor: "#337ab7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteConsignas";
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

  //Valida si se subio un archivo PDF
  $("#frmeditarconsigenefile").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frmeditarconsigenefile").val('');
          return false;
      }
  });
  // Fin funcion para editar y guardar datos en la bd las Consignas Generales

  // Inicio funcion para guardar y borrar datos en la bd las Consignas Particular
  $('form[name="frmconsipart[]"]').on("submit", function(e){
    e.preventDefault();
    var sede = $("#selecionasede").val();
    var title = $("#frmconsiparttitle").val();
    var descripcion = $("#frmconsipartdescrip").val();
    var files = $("#frmconsipartfile").val();

    if (sede != "" && title != "" && descripcion != "" && files != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=consigna&a=createConsigPart',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Consigna Particular",
              text: "Fue Creada Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteConsignas";
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

  //Valida si se subio un archivo PDF
  $("#frmconsipartfile").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frmconsipartfile").val('');
          return false;
      }
  });

  //funcion para eliminar una Consigna Particular
    $(document).on("click", "#borrarArchivoParti", function(){
      var borrarArchivoParti  = $(this).data("idborrar");
      swal({
              title: "Estás seguro?",
              text: "De Eliminar Esta Consigna Particular!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#E74C3C",
              confirmButtonText: "Si, Eliminar!",
              closeOnConfirm: false
          }, function (isConfirm) {
              if (!isConfirm) return;
              $.post("index.php?c=consigna&a=borrarArchivoParti",{Borrar:borrarArchivoParti}, function(data){
                if (data == true) {
                  swal({  title: "La Consigna Particular",
                       text: "Fue eliminada exitosamente",
                       type: "success",
                       confirmButtonColor: "#337AB7",
                       showConfirmButton: true},
                       function(isConfirm){
                         if (isConfirm) {
                            location.href="ReporteConsignas";
                         }
                       }
                      );
                }else if (data == false) {
                  location.href="Error500";
                }
          });
      });
    });
  // Fin funcion para guardar datos en la bd las Consignas Particular

  // Inicio funcion para editar y guardar datos en la bd las Consignas Particular
  $('form[name="frmeditarconsiparti[]"]').on("submit", function(e){
    e.preventDefault();
    var sede = $("#selecionasede").val();
    var titleeditconsig = $("#frmeditarconsipartititle").val();
    var descripcioneditconsig = $("#frmeditarconsipartidesp").val();
    var fileseditconsig = $("#frmeditarconsipartifile").val();

    if (sede != "" && titleeditconsig != "" && descripcioneditconsig != "" && fileseditconsig != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=consigna&a=updateConsgPart',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Consigna Particular",
              text: "Fue Actualizada exitosamente",
              type: "success",
              confirmButtonColor: "#337ab7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteConsignas";
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

  //Valida si se subio un archivo PDF
  $("#frmeditarconsipartifile").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frmeditarconsipartifile").val('');
          return false;
      }
  });
  // Fin funcion para editar y guardar datos en la bd las Consignas Particular
  //######################################################
  // FIN CONSIGNAS
  //######################################################

  //######################################################
  // INICIO CIRCULARES
  //######################################################
  // Inicio funcion para guardar y borrar datos en la bd las Circulares
  $('form[name="frmcircular[]"]').on("submit", function(e){
    e.preventDefault();
    var sede = $("#selecionasede").val();
    var title = $("#frmcirculartitle").val();
    var descripcion = $("#frmcirculardescrip").val();
    var files = $("#frmcircularfile").val();

    if (sede != "" && title != "" && descripcion != "" && files != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=circular&a=createCircular',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Circular",
              text: "Fue Creado Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteCirculares";
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
  //Valida si se subio un archivo PDF
  $("#frmcircularfile").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frmcircularfile").val('');
          return false;
      }
  });

  //funcion para eliminar una Circular
    $(document).on("click", "#borrarArchivoCircu", function(){
      var borrarArchivoCircu  = $(this).data("idborrar");
      swal({
              title: "Estás seguro?",
              text: "De Eliminar Esta Circular!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#E74C3C",
              confirmButtonText: "Si, Eliminar!",
              closeOnConfirm: false
          }, function (isConfirm) {
              if (!isConfirm) return;
              $.post("index.php?c=circular&a=borrarArchivoCircu",{Borrar:borrarArchivoCircu}, function(data){
                if (data == true) {
                  swal({  title: "La Circular",
                       text: "Fue eliminada exitosamente",
                       type: "success",
                       confirmButtonColor: "#337AB7",
                       showConfirmButton: true},
                       function(isConfirm){
                         if (isConfirm) {
                            location.href="ReporteCirculares";
                         }
                       }
                      );
                }else if (data == false) {
                  location.href="Error500";
                }
          });
      });
    });
  // Fin funcion para guardar y borrar datos en la bd las Circulares

  // Inicio funcion para editar y guardar datos en la bd las Circulares
  $('form[name="frmeditarcircular[]"]').on("submit", function(e){
    e.preventDefault();
    var sede = $("#selecionasede").val();
    var titleedit = $("#frmeditarcirculartitle").val();
    var descripcionedit = $("#frmeditarcirculardesp").val();
    var filesedit = $("#frmeditarcircularfile").val();

    if (sede != "" && titleedit != "" && descripcionedit != "" && filesedit != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=circular&a=updateCircular',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Circular",
              text: "Se Actualizo exitosamente",
              type: "success",
              confirmButtonColor: "#337ab7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteCirculares";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }
    }
      });
    }
  });

  //Valida si se subio un archivo PDF
  $("#frmeditarcircularfile").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frmeditarcircularfile").val('');
          return false;
      }
  });
  // Fin funcion para editar y guardar datos en la bd las Circulares
  //######################################################
  // FIN CIRCULARES
  //######################################################

  //######################################################
  // INICIO INSTRUCCIONES
  //######################################################
  // Inicio funcion para guardar y borrar datos en la bd las Instrucciónes
  $('form[name="frminstruccion[]"]').on("submit", function(e){
    e.preventDefault();
    var sede = $("#selecionasede").val();
    var title = $("#frminstrucciontitle").val();
    var descripcion = $("#frminstrucciondescrip").val();
    var files = $("#frminstruccionfile").val();

    if (sede != "" && title != "" && descripcion != "" && files != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=instruccion&a=createInstruccion',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Instrucción",
              text: "Fue Creada Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteInstrucciones";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }
    }
      });
    }
  });
  //Valida si se subio un archivo PDF
  $("#frminstruccionfile").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frminstruccionfile").val('');
          return false;
      }
  });

  //funcion para eliminar una Instrucción
    $(document).on("click", "#borrarArchivoInstru", function(){
      var borrarArchivoInstru  = $(this).data("idborrar");
      swal({
              title: "Estás seguro?",
              text: "De Eliminar Esta Instrucción!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#E74C3C",
              confirmButtonText: "Si, Eliminar!",
              closeOnConfirm: false
          }, function (isConfirm) {
              if (!isConfirm) return;
              $.post("index.php?c=instruccion&a=borrarArchivoInstru",{Borrar:borrarArchivoInstru}, function(data){
                if (data == true) {
                  swal({  title: "La Instrucción",
                       text: "Se Elimino exitosamente",
                       type: "success",
                       confirmButtonColor: "#337AB7",
                       showConfirmButton: true},
                       function(isConfirm){
                         if (isConfirm) {
                            location.href="ReporteInstrucciones";
                         }
                       });
                }else if (data == false) {
                  location.href="Error500";
                }
          });
      });
    });
    // Fin funcion para guardar y borrar datos en la bd las Intrucciones

    // Inicio funcion para editar y guardar datos en la bd las Instrucciónes
    $('form[name="frmeditarinstruccion[]"]').on("submit", function(e){
      e.preventDefault();
      var sede = $("#selecionasede").val();
      var titleedit = $("#frmeditarinstrucciontitle").val();
      var descripcionedit = $("#frmeditarinstrucciondesp").val();
      var filesedit = $("#frmeditarinstruccionfile").val();

      if (sede != "" && titleedit != "" && descripcionedit != "" && filesedit != "") {
        $.ajax({
          type: 'POST',
          url: 'index.php?c=instruccion&a=updateinstruccion',
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data) {
         if (data == true) {
           swal({  title: "La Instrucción",
                text: "Se Actualizo exitosamente",
                type: "success",
                confirmButtonColor: "#337ab7",
                showConfirmButton: true},
                function(isConfirm){
                  if (isConfirm) {
                     location.href="ReporteInstrucciones";
                  }
                });
         }else if (data == false) {
           location.href="Error500";
         }
      }
        });
      }
    });

    //Valida si se subio un archivo PDF
    $("#frmeditarinstruccionfile").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["application/pdf"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Seleccione un archivo de PDF válido.');
            $("#frmeditarinstruccionfile").val('');
            return false;
        }
    });
    // Fin funcion para editar y guardar datos en la bd las Instrucciónes

    // Inicio funcion para guardar datos en la bd las Instrucciónes Manuales
    $('form[name="frminstruccionmanual[]"]').on("submit", function(e){
      e.preventDefault();
      var sedes = $("#selecionasedes").val();
      var descripcion = $("#frminstruccionmanualdesp").val();
      var fecha = $("#frminstruccionmanualfecha").val();
      var datos = [sedes, descripcion, fecha];
      console.log(sedes)
      if (sedes != "" && descripcion != "" && fecha != "") {
        $.post("index.php?c=instruccion&a=createInstruccionManual",{frminstruccionmanual: datos}, function(data){
            if (data == true) {
            swal({  title: "La Instrucción",
                 text: "Fue Enviado Exitosamente ",
                 type: "success",
                 confirmButtonColor: "#337ab7",
                 showConfirmButton: true},
                 function(isConfirm){
                   if (isConfirm) {
                      location.href="ReporteInstrucciones";
                   }
                 });
            }else if (data == false){
              location.href="Error500";
            }
        });
      }
    });

  // Fin funcion para guardar datos en la bd las Intrucciones Manuales
  //######################################################
  // FIN INSTRUCCIONES
  //######################################################

  //######################################################
  // INICIO CONFIGURACIÓN
  //######################################################
  // Inicio funcion para guardar datos en la bd los Nuevos Usuarios
  $('form[name="frmregister[]"]').on("submit", function(e){
    e.preventDefault();
    var number = $("#frmregisternumber").val();
    var user1 = $("#frmregisteruser1").val();
    var last1 = $("#frmregisterlast1").val();
    var last2 = $("#frmregisterlast2").val();
    var cargo = $("#frmregistercargo").val();
    var cliente = $("#frmregistercliente").val();
    var estado = $("#frmregisterestado").val();
    var sede = $("#frmregistersede").val();
    var area = $("#frmregisterarea").val();
    if (number != "" && user1 != "" && last1 != "" && last2 != "" && cargo != "" && cliente != "" && estado != "" && sede != "" && area != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=home&a=createUser',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
          console.log(data);
          if ($.trim(data) == "existe") {
            $("#notificacionUser").html('<div class="col-md-6 col-sm-6 col-xs-12"><div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><p style="text-align:center"><strong>El usuario</strong> Ya existe en el sistema</p></div></div>');
            $("#notificacionUser").css({"display": "flex", "justify-content": "center"});
          }else if (data == true) {
           swal({  title: "El Usuario",
                text: "Fue Creado Exitosamente ",
                type: "success",
                confirmButtonColor: "#337AB7",
                showConfirmButton: true},
                function(isConfirm){
                  if (isConfirm) {
                     location.href="CrearUsuario";
                  }
                });
         }else if (data == false) {
           location.href="Error500";
         }
    }
      });
    }
  });
  // Fin funcion para guardar datos en la bd los Nuevos Usuarios

  // Inicio funcion para editar datos en la bd los Usuarios
  $('form[name="frmeditar[]"]').on("submit", function(e){
    e.preventDefault();
    var number = $("#frmeditarnumber").val();
    var user1 = $("#frmeditaruser1").val();
    var last1 = $("#frmeditarlast1").val();
    var last2 = $("#frmeditarlast2").val();
    var cargo = $("#frmeditarcargo").val();
    var cliente = $("#frmeditarcliente").val();
    var sede = $("#frmeditatsede").val();
    var area = $("#frmeditararea").val();
    if (number != "" && user1 != "" && last1 != "" && last2 != "" && cargo != "" && cliente != "" && sede != "" && area != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=home&a=updateUser',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
          // console.log(data);
       if (data == true) {
         swal({  title: "La Información",
              text: "Fue Actualizada Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="VerUsuarios";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }
    }
      });
    }
  });
  // Inicio funcion para editar datos en la bd los Usuarios

  // Inicio funcion para crear Clientes Nuevos en la bd
  $('form[name="frmcliente[]"]').on("submit", function(e){
    e.preventDefault();
    var cliente = $("#frmclientenombre").val();
    if (cliente != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=home&a=createClient',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "El Cliente",
              text: "Fue Creado Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="CrearClienteSedes";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }
    }
      });
    }
  });
  // Fin funcion para crear Clientes Nuevos en la bd

  // Inicio funcion para crear Sedes despues de haber creado el Clientes en la bd
  $('form[name="frmsede[]"]').on("submit", function(e){
    e.preventDefault();
    var cliente = $("#selecionaclientes").val();
    var sede = $("#frmsedesede").val();
    if (cliente != "" && sede != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=home&a=createSed',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Sede",
              text: "Fue Creado Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="CrearClienteSedes";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }
    }
      });
    }
  });
  // Fin funcion para crear Sedes despues de haber creado el Clientes en la bd

  //Inicio funcion para Restablecer Constraseña a Usuarios --Admin--
    $(document).on("click", "#userRestPassAdmin", function(){
      var userRestPassAdmin  = $(this).data("idrestablecer");
      swal({
              title: "Estás seguro?",
              text: "De Que Quieres Restablecer Constraseña!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#E74C3C",
              confirmButtonText: "Si, Restaurar!",
              closeOnConfirm: false
          }, function (isConfirm) {
              if (!isConfirm) return;
              $.post("index.php?c=home&a=userRestPassAdmin",{lockid:userRestPassAdmin}, function(data){
                if (data == true) {
                  swal({  title: "La Constraseña",
                       text: "Fue Restablecida Exitosamente",
                       type: "success",
                       confirmButtonColor: "#337AB7",
                       showConfirmButton: true});
                }else if (data == false) {
                  location.href="Error500";
                }
          });
      });
    });
  //Fin funcion para Restablecer Constraseña a Usuarios --Admin--

  //Inicio funcion para Restablecer Constraseña a Usuarios --Normal--
    $(document).on("click", "#userRestPass", function(){
      var userRestPass  = $(this).data("idrestablecer");
      swal({
              title: "Estás seguro?",
              text: "De Que Quieres Restablecer Constraseña!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#E74C3C",
              confirmButtonText: "Si, Restaurar!",
              closeOnConfirm: false
          }, function (isConfirm) {
              if (!isConfirm) return;
              $.post("index.php?c=home&a=userRestPass",{lockid:userRestPass}, function(data){
                if (data == true) {
                  swal({  title: "La Constraseña",
                       text: "Fue Restablecida Exitosamente",
                       type: "success",
                       confirmButtonColor: "#337AB7",
                       showConfirmButton: true});
                }else if (data == false) {
                  location.href="Error500";
                }
          });
      });
    });
    //Fin funcion para Restablecer Constraseña a Usuarios --Normal--

    // Inicio funcion para guardar datos en la bd los Cargos Nuevos
    $('form[name="frmcargo[]"]').on("submit", function(e){
      e.preventDefault();
      var cargo = $("#frmcargonombre").val();
      if (cargo != "") {
        $.ajax({
          type: 'POST',
          url: 'index.php?c=home&a=createCarg',
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data) {
         if (data == true) {
           swal({  title: "El Cargo",
                text: "Fue Creado Exitosamente ",
                type: "success",
                confirmButtonColor: "#337AB7",
                showConfirmButton: true},
                function(isConfirm){
                  if (isConfirm) {
                     location.href="CrearCargo";
                  }
                });
         }else if (data == false) {
           location.href="Error500";
         }
      }
        });
      }
    });
    // Fin funcion para guardar datos en la bd Cargos Nuevos
  //######################################################
  // FIN CONFIGURACIÓN
  //######################################################


  //######################################################
  // INICIO REPARACIÓN DE EQUIPOS
  //######################################################
  // Inicio funcion para guardar datos en la bd la Reparación de Equipos
  var f = new Date();
  var fh = (f.getDate()+"-"+(f.getMonth()+1)+"-"+f.getFullYear()+" "+f.getHours()+":"+f.getMinutes()+":"+f.getSeconds());
  $("#fecharequipo").val(fh);
  $('form[name="frmcreateRepaEquipo[]"]').on("submit", function(e){
    e.preventDefault();
      var cliente = $("#selecioncliente").val();
      var statu = $("#selecionastatus").val();
      var area = $("#arearequipo").val();
      var dispo = $("#disposotivorequipo").val();
      var marca = $("#marcarequipo").val();
      var modelo = $("#modelorequipo").val();
      var serial = $("#serialrequipo").val();
      var fretiro = $("#fecharetirorequipo").val();
      var fingreso = $("#fechaingresorequipo").val();
      var provee = $("#provedorrequipo").val();
      var reparado = $("#reparadorequipo").val();
      var asesor = $("#asesorrequipo").val();
      var tecnico = $("#tecnicorequipo").val();
      var estado = $("#estadorequipo").val();
      var falla = $("#fallarequipo").val();
      var dianostig = $("#dianosticorequipo").val();
      var onbserva = $("#observacionrequipo").val();
      if (cliente != "" && statu != "" &&  area != "" &&  dispo != "" &&  marca != "" &&  modelo != "" &&  serial != "" &&  fretiro != "" &&  fingreso != "" &&
      provee != "" && reparado != "" && asesor != "" && tecnico != "" && estado != "" && falla != "" && dianostig != "" && onbserva != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=reparacionequipo&a=createRepaEquipo',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "El Equipo",
              text: "Fue Reportado Exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ReporteReparacionEquipo";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }else if (data != false && data != true){
         // console.log(data);
       }
    }
      });
      }
  });

  //Valida si se subio un archivo PDF
  $("#frmfileRepaEquipo").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#frmfileRepaEquipo").val('');
          return false;
      }
  });
  // Fin funcion para guardar datos en la bd la Reparación de Equipos

  // Inicio funcion para editar datos en la bd la la Reparación de Equipos
  $('form[name="frmeditarRepaEquipo[]"]').on("submit", function(e){
    e.preventDefault();
    var ecliente = $("#editselecioncliente").val();
    var estatu = $("#editselecionastatus").val();
    var earea = $("#editarearequipo").val();
    var edispo = $("#editdisposotivorequipo").val();
    var emarca = $("#editmarcarequipo").val();
    var emodelo = $("#editmodelorequipo").val();
    var eserial = $("#editserialrequipo").val();
    var efretiro = $("#editfecharetirorequipo").val();
    var efingreso = $("#editfechaingresorequipo").val();
    var eprovee = $("#editprovedorrequipo").val();
    var ereparado = $("#editreparadorequipo").val();
    var easesor = $("#editasesorrequipo").val();
    var etecnico = $("#edittecnicorequipo").val();
    var eestado = $("#editestadorequipo").val();
    var efalla = $("#editfallarequipo").val();
    var edianostig = $("#editdianosticorequipo").val();
    var eonbserva = $("#editobservacionrequipo").val();
    if (ecliente != "" && estatu != "" &&  earea != "" &&  edispo != "" &&  emarca != "" &&  emodelo != "" &&  eserial != "" &&  efretiro != "" &&  efingreso != "" &&
    eprovee != "" && ereparado != "" && easesor != "" && etecnico != "" && eestado != "" && efalla != "" && edianostig != "" && eonbserva != "") {
      $.ajax({
        type: 'POST',
        url: 'index.php?c=reparacionequipo&a=editarRepaEquipo',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
       if (data == true) {
         swal({  title: "La Información",
              text: "Se Actualizo exitosamente ",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="ConsultaReparacionEquipo";
                }
              });
       }else if (data == false) {
         location.href="Error500";
       }
    }
      });
    }
  });

  //Valida si se subio un archivo PDF
  $("#editfileRepaEquipo").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["application/pdf"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Seleccione un archivo de PDF válido.');
          $("#editfileRepaEquipo").val('');
          return false;
      }
  });

  // Fin funcion para editar datos en la bd la la Reparación de Equipos
//######################################################
// FIN REPARACIÓN DE EQUIPOS
//######################################################

//######################################################
// INICIO SERVICIO
//######################################################
// Inicio funcion para guardar datos en la bd la Reparación de Equipos

$('form[name="frmservicio[]"]').on("submit", function(e){
  e.preventDefault();
  var scliente = $("#selecionclienteser").val();
  var sdireccion = $("#direccionclienteser").val();
  var stelefono = $("#telefonoclienteser").val();
  var sabonado = $("#abonadoser").val();
  var sfechar = $("#fechareporte").val();
  var spersona = $("#personaser").val();
  var ssintoma = $("#sintomaser").val();
  var sequipo = $("#disposotivoser").val();
  var sfechae = $("#fechaejecucion").val();
  var shorae = $("#horaentrada").val();
  var shoras = $("#horasalida").val();
  var sdescripcion = $("#descripcionser").val();
  var sseguimiento = $("#seguimientoser").val();
  if (scliente != "" && sdireccion != "" && stelefono != "" && sabonado != "" && sfechar != "" && spersona != "" && ssintoma != "" && sequipo != "" && sfechae != "" && shorae != "" && shoras != "" && sdescripcion != "" && sseguimiento != "") {
    $.ajax({
      type: 'POST',
      url: 'index.php?c=servicio&a=createServicio',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data) {
        // console.log(data);
     if (data == true) {
       swal({  title: "El Servicio",
            text: "Se Guardo Exitosamente ",
            type: "success",
            confirmButtonColor: "#337AB7",
            showConfirmButton: true},
            function(isConfirm){
              if (isConfirm) {
                 location.href="ReporteServicios";
              }
            });
     }else if (data == false) {
       location.href="Error500";
     }
  }
    });
  }
});
// Fin funcion para guardar datos en la bd la Reparación de Equipos
//######################################################
// FIN SERVICIO
//######################################################

//######################################################
// INICIO VISITANTE
//######################################################
// Inicio funcion para guardar datos en la bd las visitas

$('form[name="frmvisitanteregister[]"]').on("submit", function(e){
  e.preventDefault();
  var vcedula = $("#cedulavisitante").val();
  var vnombre = $("#frmvisitantenombre").val();
  var vapellido = $("#frmvisitanteapellido").val();
  var varea = $("#selecionaarea").val();
  var vresponsable = $("#selecionaresponsable").val();
  var vdescripcion = $("#frmvisitantedescrp").val();
  var vempresa = $("#frmvisitanteempresa").val();

  if (vcedula != "" && vnombre != "" && vapellido != "" && varea != "" && vresponsable != "" && vdescripcion != "" && vempresa != "") {
    $.ajax({
      type: 'POST',
      url: 'index.php?c=visitante&a=createVisita',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data) {
      var print = $.trim(data);
      // console.log(print);
      if (/^([0-9])*$/.test(print)) {
        $("#capturarfoto").hide();
        $("#volveratomar").hide();
        $("#subirfoto").hide();
        $("#myModal").modal("show");
        $("#permisotomarfoto").on("click", function(){
        Webcam.set({
				width: 250,
				height: 187,
				image_format: 'png',
				jpeg_quality: 90
			});
      $("#preimagenfile").hide();
      $("#permisotomarfoto").hide();
      $("#my_camera").show();
      $("#capturarfoto").show();
			Webcam.attach( '#my_camera' );
    });
        $("#capturarfoto").on("click", function(){
          Webcam.snap( function(data_uri) {
          document.getElementById('results').innerHTML =
          '<img id="imageprev" src="'+data_uri+'"/>';
          });
          $("#my_camera").hide();
          $("#capturarfoto").hide();
          $("#results").show();
          $("#volveratomar").show();
          $("#subirfoto").show();
          Webcam.reset();
        });

        $("#volveratomar").on("click", function(){
          Webcam.set({
          width: 250,
          height: 187,
          image_format: 'png',
          jpeg_quality: 90
        });
        $("#results").hide();
        $("#volveratomar").hide();
        $("#subirfoto").hide();
        $("#my_camera").show();
        $("#capturarfoto").show();
        Webcam.attach( '#my_camera' );
        });

        $(document).on('click','#subirfoto',function(){
          $.post("index.php?c=visitante&a=createFotoWebcam",{ dato: print}, function(data){
            // console.log(data);
            var prints = $.trim(data);
                if(prints == true){
                    $("#myModal").modal("hide");
                  swal({  title: "El Registro Del Visitante Y La Foto",
                       text: "Ha Sido Exitosamente",
                       type: "success",
                       confirmButtonColor: "#337AB7",
                       showConfirmButton: true},
                       function(isConfirm){
                         if (isConfirm) {
                            location.href="VisitantesRegistro";

                         }
                       });
                  }else if(prints == false){
                     location.href="Error500";
                  }
            });
            var base64image =  document.getElementById("imageprev").src;
            Webcam.upload( base64image, 'index.php?c=visitante&a=createFotoWebcam', function(code, text) {
            // console.log('Save successfully');
            // console.log(text);
             });

        });
        }else if (print == "successingreso"){
         $("#resultadovisiante").html('<div class="col-md-6 col-sm-6 col-xs-12"><div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>El Visitante Ya Fue Ingresado En El Sistema</strong> <br> Debes Darle Salida Y Posteriormente Registrar Nuevamente El Ingreso</div></div>');
         $("#resultadovisiante").css({"display": "flex", "justify-content": "center"});
       }else if(print == "ingreso"){
         swal({  title: "El Registro Del Visitante",
              text: "Ha Sido Exitoso",
              type: "success",
              confirmButtonColor: "#337AB7",
              showConfirmButton: true},
              function(isConfirm){
                if (isConfirm) {
                   location.href="VisitantesRegistro";

                }
              });
       }else if(print == "errores"){
          location.href="Error500";
       }
    }
    });
  }
});
// Fin funcion para guardar datos en la bd las visitas

//Inicio funcion para Restablecer Constraseña a Usuarios --Admin--
  $(document).on("click", "#Darlesalida", function(){
    var hoy = new Date();
    var fechatotal = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate()
    var horatotal = hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
    var fechayhorasalida = fechatotal+" "+horatotal
    var salida  = $(this).data("idsalida");
    swal({
            title: "Estás seguro?",
            text: "De Darle salida",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#E74C3C",
            confirmButtonText: "Si, Darle Salida!",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (!isConfirm) return;
            $.post("index.php?c=visitante&a=darSalidaVisitante",{lockid:salida, fechasalida:fechayhorasalida}, function(data){
              // console.log(data);
              if (data == true) {
                swal({  title: "Salida Exitosa",
                     text: "El Visitante Ya Puede Salir",
                     type: "success",
                     confirmButtonColor: "#337AB7",
                     showConfirmButton: true},
                     function(isConfirm){
                       if (isConfirm) {
                          location.href="VisitantesConsultaHoy";
                       }
                     }
                   );
              }else if (data == false) {
                location.href="Error500";
              }
        });
    });
  });
//Fin funcion para Restablecer Constraseña a Usuarios --Admin--
//######################################################
// FIN VISITANTE
//######################################################

//######################################################
// INICIO DE EQUIPOS
//######################################################
// Inicio funcion para guardar datos en la bd la Reparación de Equipos
$("#fechaequipo").val(fh);
$('form[name="frmcreateEquipo[]"]').on("submit", function(e){
  e.preventDefault();
    var equimarca = $("#puestorequipomarca").val();
    var equimodelo = $("#puestorequipomodelo").val();
    var equiserial = $("#puestorequiposerial").val();
    var equiimei = $("#puestorequipoimei").val();
    var equisimcard = $("#puestorequiposemcard").val();
    var equinombre = $("#puestorequiponombre").val();
    var equicargo = $("#puestorequipocargo").val();

    if (equimarca != "" &&  equimodelo != "" &&  equiserial != "" &&  equiimei != "" &&  equisimcard != "" && equinombre != "" && equicargo != "") {
    $.ajax({
      type: 'POST',
      url: 'index.php?c=equipo&a=frmcreateEquipo',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data) {
        // console.log(data);
     var result = $.trim(data);
     if (result == true) {
       swal({  title: "El Equipo",
            text: "Fue Resgistrado Exitosamente ",
            type: "success",
            confirmButtonColor: "#337AB7",
            showConfirmButton: true},
            function(isConfirm){
              if (isConfirm) {
                 location.href="ReporteEquipoRegistro";
              }
            });
     }else if (result == false) {
       location.href="Error500";
     }
  }
    });
    }
});
$("#fechaequipotop").val(fh);
$('form[name="frmcreateEquipoLaptop[]"]').on("submit", function(e){
  e.preventDefault();
    var equimarcatop = $("#equipolaptopmarca").val();
    var equimodelotop = $("#equipolaptopmodelo").val();
    var equiserialtop = $("#equipolaptopserial").val();
    var equiasignadotop = $("#equipolaptopasignado").val();
    var equicargotop = $("#equipolaptopcargo").val();
    var equicaracteriticastop = $("#equipolaptopcaracteristicas").val();
    if (equimarcatop != "" &&  equimodelotop != "" &&  equiserialtop != "" &&  equiasignadotop != "" && equicargotop != "" && equicaracteriticastop != "") {
    $.ajax({
      type: 'POST',
      url: 'index.php?c=equipo&a=frmcreateEquipo',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data) {
        // console.log(data);
     var result = $.trim(data);
     if (result == true) {
       swal({  title: "El Equipo",
            text: "Fue Reportado Exitosamente ",
            type: "success",
            confirmButtonColor: "#337AB7",
            showConfirmButton: true},
            function(isConfirm){
              if (isConfirm) {
                 location.href="ReporteEquipoRegistro";
              }
            });
     }else if (result == false) {
       location.href="Error500";
     }
  }
    });
    }
});
$("#fechaequipopc").val(fh);
$('form[name="frmcreateEquipoPc[]"]').on("submit", function(e){
  e.preventDefault();
    var equimarcapc = $("#puestorequipomarcapc").val();
    var equimodelopc = $("#puestorequipomodelopc").val();
    var equiserialpc = $("#puestorequiposerialpc").val();
    if (equimarcapc != "" &&  equimodelopc != "" &&  equiserialpc != "") {
    $.ajax({
      type: 'POST',
      url: 'index.php?c=equipo&a=frmcreateEquipo',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data) {
        // console.log(data);
     var result = $.trim(data);
     if (result == true) {
       swal({  title: "El Equipo",
            text: "Fue Reportado Exitosamente ",
            type: "success",
            confirmButtonColor: "#337AB7",
            showConfirmButton: true},
            function(isConfirm){
              if (isConfirm) {
                 location.href="ReporteEquipoRegistro";
              }
            });
     }else if (result == false) {
       location.href="Error500";
     }
  }
    });
    }
});

$("#fechaacta").val(fh);
$('form[name="frmcreateActa[]"]').on("submit", function(e){
  e.preventDefault();
    var nombreyapellido = $("#frmactanombreyapellido").val();
    var cedulaacta = $("#frmactacedula").val();
    var cargaacta = $("#frmactacargo").val();
    if (nombreyapellido != "" &&  cedulaacta != "" &&  cargaacta != "") {
    $.ajax({
      type: 'POST',
      url: 'index.php?c=equipo&a=frmcreateActaEquipo',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data) {
     var result = $.trim(data);
     if (result == true) {
       swal({  title: "El Equipo",
            text: "Fue Reportado Exitosamente ",
            type: "success",
            confirmButtonColor: "#337AB7",
            showConfirmButton: true},
            function(isConfirm){
              if (isConfirm) {
                 location.href="ReporteEquipoRegistro";
              }
            });
     }else if (result == false) {
       location.href="Error500";
     }
  }
    });
    }
});
//######################################################
// FIN DE EQUIPOS
//######################################################
$(document).on("click", "#borrarnotyproto", function(){
  var idnotificacion  = $(this).data("idnotiproto");
     $.post("index.php?c=notificacion&a=borrarNotiProtoLeido",{idnotiproto:idnotificacion}, function(data){
         // console.log(data);
         if (data == true) {
            location.reload()
        }else if (data==false){
            location.href="Error500";
        }else {
            console.log(data);
        }
      });
});

$(document).on("click", "#borrarnotyconsig", function(){
  var idnotificacion  = $(this).data("idnoticonsig");
     $.post("index.php?c=notificacion&a=borrarNotiCosnigLeido",{idnoticonsig:idnotificacion}, function(data){
         // console.log(data);
         if (data == true) {
            location.reload()
        }else if (data==false){
            location.href="Error500";
        }else {
            console.log(data);
        }
      });
});

$(document).on("click", "#borrarnotyconsip", function(){
  var idnotificacion  = $(this).data("idnoticonsip");
     $.post("index.php?c=notificacion&a=borrarNotiCosnipLeido",{idnoticonsip:idnotificacion}, function(data){
         // console.log(data);
         if (data == true) {
            location.reload()
        }else if (data==false){
            location.href="Error500";
        }else {
            console.log(data);
        }
      });
});

$(document).on("click", "#borrarnotycircu", function(){
  var idnotificacion  = $(this).data("idnoticircu");
     $.post("index.php?c=notificacion&a=borrarNotiCircuLeido",{idnoticircu:idnotificacion}, function(data){
         // console.log(data);
         if (data == true) {
            location.reload()
        }else if (data==false){
            location.href="Error500";
        }else {
            console.log(data);
        }
      });
});

function numbernoty(){
    var number = document.getElementById("numbernoty").innerText;
    if (number == 0) {
        $(".badge").hide();
    }else{
        $("#numbernoty").show();
    }
}
numbernoty();

$(document).on("click", "#borrarnotyinstru", function(){
  var idnotificacion  = $(this).data("idnotiinstru");
     $.post("index.php?c=notificacion&a=borrarNotiInstruLeido",{idnotiinstru:idnotificacion}, function(data){
         // console.log(data);
         if (data == true) {
            location.reload()
        }else if (data==false){
            location.href="Error500";
        }else {
            console.log(data);
        }
      });
});

$(document).on("click", "#borrarnotyinstrumanu", function(){
  var idnotificacion  = $(this).data("idnotiproto");
     $.post("index.php?c=notificacion&a=searchNotificacionInstruManual",{idnotiinstrumanu:idnotificacion}, function(data){
        var res = data[0].res;
        var msn = data[0].msn;

        if (res == 'success') {
            $('#Mymodals').modal('show');
            $('#cerrar').hide();
            $('#titlemodal').html("Notificación de instrucción manual");
            $('#contenidomodal').html('<div class="container" style="display: flex; justify-content: center;  align-items: center;"><div class="col-md-10"><textarea disabled="" class="form-control" rows="8" >'+msn[0][1]+'</textarea><div><br><p>Persona Quién Hace referencia con la instrucción:</p> <input type="text" class="form-control" disabled="disabled" placeholder="'+msn[0][4]+" "+msn[0][5]+'">   </div>');
            $("#cerrarnotificacion").attr("data-idnotiinstrumanu",msn[0][0]);
        }
      },"json");
});

$(document).on("click", "#cerrarnotificacion", function(){
  var idnotificacion  = $(this).data("idnotiinstrumanu");
     $.post("index.php?c=notificacion&a=borrarNotiInstruManuLeido",{idnotiinstrumanu:idnotificacion}, function(data){
         // console.log(data);
         if (data == true) {
            $('#Mymodals').modal('hide');
            location.reload()
        }else if (data==false){
            location.href="Error500";
        }else {
            console.log(data);
        }
      });
});

});

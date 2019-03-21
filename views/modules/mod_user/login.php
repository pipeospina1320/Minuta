<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Website description-->
    <meta name="description" content = "Covotec Ltda"/>
    <meta name="author" content ="Edison Monsalve L.">
    <meta name="keywords" content ="Seguridad, Vigilancia Fisica, Electronica, Alarmas">

    <!--Favicon & App Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="views/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="views/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="views/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="views/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="views/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="views/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="views/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="views/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="views/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="views/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="views/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="views/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="views/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="views/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="views/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#000000">

    <title>Covitec Ltda</title>
    <!-- Bootstrap -->
    <link href="views/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="views/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Style personalize -->
    <link href="views/assets/css/main.css?<?php echo time();?>" rel="stylesheet">
    <!-- SweetAlert -->
    <link href="views/assets/css/sweetalert.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="views/assets/nprogress/nprogress.css" rel="stylesheet">

  </head>
  <body>

<div id="login" class="container" name="frmlogin[]">
  <div class="row-fluid">
    <div class="span12">
      <div class="login well well-small">
        <div class="center">
          <img src="views/assets/images/logo_image.png" alt="logo">
        </div>
        <form name="frmlogin[]" class="login-form" id="UserLoginForm">
          <div class="control-group">
            <div class="input-prepend ">
              <input name="frmlogin[]" class="form-control" required="required" placeholder="Numero de Identificación" maxlength="10" type="number" id="UserUsername">
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="input-prepend" >
              <input name="frmlogin[]" class="form-control" required="required" placeholder="Contraseña" type="password" id="UserPassword">
            </div>
          </div>
          <div class="control-group">
            <label id="remember-me" class="remember-me">
              <input type="checkbox" name="frmlogin[]" value="1" id="UserRememberMe"> Recordar Contraseña?</label>
          </div>
          <div class="control-group">
            <input class="btn btn-primary btn-large btn-block" type="submit" value="Iniciar Sesión" id="bottonlogin">
          </div>
        </form>
        <p id="resultalogin"></p>
      </div><!--/.login-->
    </div><!--/.span12-->
  </div><!--/.row-fluid-->
</div><!--/.container-->

<!--/modal-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <h3 style="text-align: center;">Cambio de Contraseña</h3>
           </div>
           <br>
           <div class="formContainer">
           <form class="form-horizontal form-label-left" name="frmpassword[]">
            <div class="form-group">
              <label class="control-label col-md-5 col-sm-5 col-xs-12" >Contraseña Nueva: </label>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <input type="password" name="frmpassword[]" required="required" class="form-control col-md-7 col-xs-12 textPassword" id="pwd">
              </div>
              <div class="control-label col-md-11 col-sm-12 col-xs-12 passwordValidator"></div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-5 col-sm-5 col-xs-12">Confirma Contraseña: </label>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <input type="password" name="frmpassword[]" required="required" class="form-control col-md-7 col-xs-12 textConfirmPassword" id="confpwd">
              </div>
            </div>
            <div id="error" style="color: red; text-align: center;"></div>

          </div>
           <div class="modal-footer">
              <button type="submit" class="btn btn-primary center-block">Guardar</button>
           </div>
              </form>
      </div>
   </div>
</div>
<!--/.fin modal-->


<!-- jQuery -->
<script src="views/assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="views/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Ajax dinamico -->
<script src="views/assets/js/validar.js?<?php echo time(); ?>"></script>
<!-- SweetAlert -->
<script src="views/assets/js/sweetalert.min.js"></script>
<!-- NProgress -->
<script src="views/assets/nprogress/nprogress.js"></script>

</body>
</html>

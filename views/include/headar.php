<!-- Inciio de sesión -->
<?php

  session_start();// activa la variable de sesion
  if (!$_SESSION["validar"]) {
     header("location:Error403");
     exit();
  }
  $nombresession = $_SESSION["nombre"];
  $apellidosession = $_SESSION["apellido"];
  $rol = $_SESSION["cargo"];
 ?>
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

    <title>Covitec Ltda | <?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link href="views/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="views/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="views/assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="views/assets/build/css/custom.min.css?<?php echo time(); ?>" rel="stylesheet">
    <!-- Style Css personalize -->
    <link href="views/assets/css/home.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="views/assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="views/assets/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="views/assets/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="views/assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- SweetAlert -->
    <link href="views/assets/css/sweetalert.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="MisionVision" class="site_title"><i class="fa fa-hospital-o"></i> <span>Covitec Ltda.</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="views/assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $nombresession." ".$apellidosession; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php if ($rol == 1) { ?>
            <!--sidebar menu Admin-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-building-o"></i> Mi Empresa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="MisionVision">Nuestra Misión y Visión</a></li>
                      <li><a href="Valores">Nuestros Valores</a></li>
                      <li><a href="Planes">Planes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-home"></i> Reporte <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ReporteNovedades">Minuta</a></li>
                      <li><a href="ReporteDotacion">Entrega/Recibida</a></li>
                      <li><a href="ReporteProtocolos">Protocolos</a></li>
                      <li><a href="ReporteConsignas">Consignas</a></li>
                      <li><a href="ReporteCirculares">Circulares</a></li>
                      <li><a href="ReporteInstrucciones">Instrucciones Especiales</a></li>
                      <li><a href="ReporteServicios">Servicio</a></li>
                      <li><a href="ReporteReparacionEquipo">Reparación Equipos</a></li>
                      <li><a href="ReporteEquipoRegistro">Equipos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Consulta <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="ConsultaNovedades">Consulta Minuta</a></li>
                      <li><a href="ConsultaNovedades-Total">Consulta Minuta Todo</a></li>
                      <li><a href="ConsultaDotacion">Consulta Entrega/Recibida</a></li>
                      <li><a href="ConsultaDotacion-Total">Consulta Entrega/Recibida Total</a></li>
                      <li><a href="ConsultaProtocolos">Consulta Protocolos</a></li>
                      <li><a href="ConsultaConsignas">Consulta Consignas</a></li>
                      <li><a href="ConsultaCirculares">Consulta Circular</a></li>
                      <li><a href="ConsultaInstrucciones">Instrucciones Especiales</a></li>
                      <li><a href="ConsultaReparacionEquipo">Consulta Reparación Equipos</a></li>
                      <li><a href="ConsultaEquipo">Consulta Equipos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Visitantes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="VisitantesRegistro">Visitantes Registrar</a></li>
                      <li><a href="VisitantesConsultaHoy">Visitantes Consulta</a></li>
                      <li><a href="VisitantesConsulta">Visitantes Registados</a></li>
                      <li><a href="VisitantesConsultaTotal">Visitantes Registados Total</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Configuración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="CrearUsuario">Crear Usuario</a></li>
                      <li><a href="VerTodoLosUsuarios">Ver Todos Los Usuarios</a></li>
                      <li><a href="VerUsuarios">Ver Usuarios</a></li>
                      <li><a href="CrearClienteSedes">Crear Cliente Y Sede</a></li>
                      <li><a href="CrearCargo">Crear Un Cargo</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu Admin-->

          <?php }elseif ($rol == 2 || $rol == 3 || $rol == 9) { ?>
          <!-- sidebar menu Directores, Jefes operativos y Ingeniero de Soporte-->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-building-o"></i> Mi Empresa <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="MisionVision">Nuestra Misión y Visión</a></li>
                    <li><a href="Valores">Nuestros Valores</a></li>
                    <li><a href="Planes">Planes</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-home"></i> Reporte <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="ReporteNovedades">Minuta</a></li>
                    <li><a href="ReporteDotacion">Entrega/Recibida</a></li>
                    <li><a href="ReporteProtocolos">Protocolos</a></li>
                    <li><a href="ReporteConsignas">Consignas</a></li>
                    <li><a href="ReporteCirculares">Circulares</a></li>
                    <li><a href="ReporteInstrucciones">Instrucciones Especiales</a></li>
                    <li><a href="ReporteServicios">Servicio</a></li>
                    <li><a href="ReporteReparacionEquipo">Reparación Equipos</a></li>
                    <li><a href="ReporteEquipoRegistro">Equipos</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Consulta <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="ConsultaNovedades">Consulta Minuta</a></li>
                    <li><a href="ConsultaDotacion-Total">Consulta Entrega/Recibida</a></li>
                    <li><a href="ConsultaProtocolos">Consulta Protocolos</a></li>
                    <li><a href="ConsultaConsignas">Consulta Consignas</a></li>
                    <li><a href="ConsultaCirculares">Consulta Circular</a></li>
                    <li><a href="ConsultaInstrucciones">Instrucciones Especiales</a></li>
                    <li><a href="ConsultaReparacionEquipo">Consulta Reparación Equipos</a></li>
                    <li><a href="ConsultaEquipo">Consulta Equipos</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-users"></i> Visitantes <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="VisitantesRegistro">Visitantes Registrar</a></li>
                    <li><a href="VisitantesConsultaHoy">Visitantes Consulta</a></li>
                    <li><a href="VisitantesConsultaTotal">Visitantes Registados</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Configuración <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="CrearUsuario">Crear Usuario</a></li>
                    <li><a href="VerUsuarios">Ver Usuarios</a></li>
                    <li><a href="CrearClienteSedes">Crear Cliente Y Sede</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu Directores, Jefes operativos y Ingeniero de Soporte-->

        <?php }elseif ($rol == 4) { ?>
        <!-- sidebar menu Supervisores -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
              <li><a><i class="fa fa-building-o"></i> Mi Empresa <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="MisionVision">Nuestra Misión y Visión</a></li>
                  <li><a href="Valores">Nuestros Valores</a></li>
                  <li><a href="Planes">Planes</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-home"></i> Reporte <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="ReporteNovedades">Minuta</a></li>
                  <li><a href="ReporteDotacion">Entrega/Recibida</a></li>
                  <li><a href="ReporteProtocolos">Protocolos</a></li>
                  <li><a href="ReporteConsignas">Consignas</a></li>
                  <li><a href="ReporteCirculares">Circulares</a></li>
                  <li><a href="ReporteInstrucciones">Instrucciones Especiales</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-edit"></i> Consulta <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="ConsultaNovedades">Consulta Minuta</a></li>
                  <li><a href="ConsultaDotacion-Total">Consulta Entrega/Recibida</a></li>
                  <li><a href="ConsultaProtocolos">Consulta Protocolos</a></li>
                  <li><a href="ConsultaConsignas">Consulta Consignas</a></li>
                  <li><a href="ConsultaCirculares">Consulta Circular</a></li>
                  <li><a href="ConsultaInstrucciones">Instrucciones Especiales</a></li>
                  <li><a href="ConsultaReparacionEquipo">Consulta Reparación Equipos</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-desktop"></i> Configuración <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="CrearUsuario">Crear Usuario</a></li>
                  <li><a href="VerUsuarios">Ver Usuarios</a></li>
                  <li><a href="CrearClienteSedes">Crear Cliente Y Sede</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- /sidebar menu Supervisores-->

        <?php }elseif ($rol == 5) { ?>
          <!-- sidebar menu Vigilantes -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-building-o"></i> Mi Empresa <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="MisionVision">Nuestra Misión y Visión</a></li>
                    <li><a href="Valores">Nuestros Valores</a></li>
                    <li><a href="Planes">Planes</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-home"></i> Reporte <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="ReporteNovedades">Minuta</a></li>
                    <li><a href="ReporteDotacion">Entrega/Recibida</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Consulta <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="ConsultaNovedades">Consulta Minuta</a></li>
                    <li><a href="ConsultaDotacion">Consulta Entrega/Recibida</a></li>
                    <li><a href="ConsultaProtocolos">Consulta Protocolos</a></li>
                    <li><a href="ConsultaConsignas">Consulta Consignas</a></li>
                    <li><a href="ConsultaCirculares">Consulta Circular</a></li>
                    <li><a href="ConsultaInstrucciones">Instrucciones Especiales</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu Vigilantes-->

        <?php }elseif ($rol == 8) { ?>
          <!-- sidebar menu Tecnico -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-building-o"></i> Mi Empresa <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="MisionVision">Nuestra Misión y Visión</a></li>
                    <li><a href="Valores">Nuestros Valores</a></li>
                    <li><a href="Planes">Planes</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-home"></i> Reporte <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="ReporteServicios">Servicio</a></li>
                    <li><a href="ReporteReparacionEquipo">Reparación Equipos</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Consulta <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="ConsultaReparacionEquipo">Consulta Reparación Equipos</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu Tecnico-->

        <?php }elseif ($rol == 10) { ?>
       <!-- sidebar menu Recepción -->
       <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
         <div class="menu_section">
           <h3>General</h3>
           <ul class="nav side-menu">
             <li><a><i class="fa fa-building-o"></i> Mi Empresa <span class="fa fa-chevron-down"></span></a>
               <ul class="nav child_menu">
                 <li><a href="MisionVision">Nuestra Misión y Visión</a></li>
                 <li><a href="Valores">Nuestros Valores</a></li>
                 <li><a href="Planes">Planes</a></li>
               </ul>
             </li>
             <li><a><i class="fa fa-users"></i> Visitantes <span class="fa fa-chevron-down"></span></a>
               <ul class="nav child_menu">
                  <li><a href="VisitantesRegistro">Visitantes Registrar</a></li>
                 <li><a href="VisitantesConsultaHoy">Visitantes Consulta</a></li>
                 <li><a href="VisitantesConsulta">Visitantes Registados</a></li>
               </ul>
               </li>
           </ul>
         </div>
       </div>
       <!-- /sidebar menu Recepción-->

     <?php }elseif ($rol == 11) { ?>
    <!-- sidebar menu Usuario Empresa -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-building-o"></i> Mi Empresa <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="MisionVision">Nuestra Misión y Visión</a></li>
              <li><a href="Valores">Nuestros Valores</a></li>
              <li><a href="Planes">Planes</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu Usuario Empresa-->

      <!-- sidebar menu Error Rol -->
      <?php }else{ echo'<script language="javascript"> window.location="Error403-Rol" </script>'; } ?>
      <!-- /sidebar menu Error Rol -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="views/assets/images/user.png" alt=""><?php echo $nombresession." ".$apellidosession; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="MiPerfil"> Perfil</a></li>

                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="numbernoty" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"><?php  $numberNoty = new NotificacionController(); echo $numberNoty->numbersNotification(); ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php $noty = new NotificacionController();  $noty->reportNotification(); ?>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

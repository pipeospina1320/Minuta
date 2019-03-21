<?php

  require_once 'model/conn.model.php';
  require_once 'controller/home.controller.php';
  require_once 'controller/novedad.controller.php';
  require_once 'controller/notificacion.controller.php';



  if (isset($_REQUEST["c"])){
    $controller = strtolower($_REQUEST["c"]);
    $action = isset($_REQUEST["a"]) ? $_REQUEST["a"]: "index";

    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'Controller';

    $controller = new $controller;

    call_user_func(array($controller, $action));
    }else{

      $controller = "home";
      require_once "controller/$controller.controller.php";
      $controller = ucwords($controller).'Controller';
      $controller = new $controller;
      $controller->index();
    }


?>

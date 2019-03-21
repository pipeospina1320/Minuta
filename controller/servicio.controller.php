<?php
require_once 'model/servicio.model.php';
  require_once 'controller/reparacionequipo.controller.php';

class ServicioController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new ServicioModel();
  }
  // Funcion para
  public function wiewsServicio(){
  $title = "Reporte Servicio";
  require_once 'views/include/headar.php';
  require_once 'views/modules/mod_servicio/reporteservicios.php';
  require_once 'views/include/footer.php';
  }

  public function searchDataClient(){
    if ($_POST["dato"] != ""){
    $data = $_POST["dato"];
    $const = $this->model->searchDataClients($data);
    if ($const != "") {
      foreach ($const as $key => $value) {
        $nit = $value[1]."-".$value[2];
        $direccion = $value[4];
        $telefono = $value[5];
        $abonado = $value[6];
        print_r($nit."/".$direccion."/".$telefono."/".$abonado);
        // echo json_encode($result);
      }
    }else {
      print_r("");
    }
  }else {
    print_r("");
  }
  }

  public function searchClienteSer(){
    if ($_POST["dato"] != ""){
      $data = $_POST["dato"];
      $const = $this->model->searchClientesSer($data);
      if ($const != "") {
        foreach ($const as $key => $value) {
          $codigo = $value[0];
          $nombre = $value[3];
          $direccion = $value[4];
          $telefono = $value[5];
          $abonado = $value[6];
          $nit = $value[1];
          $codigov = $value[2];
          $guion = "-";
          print_r($codigo."/".$nombre."/".$direccion."/".$telefono."/".$abonado."/".$nit."/".$guion."/".$codigov);
        }
      }else {
        print_r("");
      }
    }else {
      print_r("");
    }
  }

  public function createServicio(){
    if (isset($_POST["frmservicio"], $_POST["opcionservicio"], $_POST["opcionterminado"], $_POST["opciondano"], $_POST["opcionfactura"], $_POST["iCheckser"])) {
      $servicio = $_POST["frmservicio"];
      $serviciopc = $_POST["opcionservicio"];
      $terminado =  $_POST["opcionterminado"];
      $dano = $_POST["opciondano"];
      $factura = $_POST["opcionfactura"];
      $icheck = $_POST["iCheckser"];
      $data = array($servicio, $serviciopc, $terminado, $dano, $factura, $icheck);
      $result = $this->model->createServicioTecnico($data);
      print_r($result);
    }
  }

}

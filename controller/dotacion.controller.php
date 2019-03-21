<?php
require_once 'model/dotacion.model.php';

class DotacionController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new DotacionModel();
  }
  // Funcion para
  public function wiewsDotacion(){
  $title = "Reporte Dotación";
  require_once 'views/include/headar.php';
  require_once 'views/modules/mod_dotacion/reportedotacion.php';
  require_once 'views/include/footer.php';
  }

  public function wiewsConstDotacion(){
    $title = "Consulta Minuta";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_dotacion/consultadotacion.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsConstDotacionTotal(){
    $title = "Consulta Minuta";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_dotacion/consultadotaciont.php';
    require_once 'views/include/footer.php';
  }

  public function selectElement(){
    $const = $this->model->selectElements();
    foreach ($const as $key => $value){
      echo '<option value="'.$value["elem_id"].'">'.$value["elem_nombre"].'</option>';
    }
  }

  public function selectAspecto(){
    $const = $this->model->selectAspectos();
    foreach ($const as $key => $value){
      echo '<option value="'.$value["asp_id"].'">'.$value["asp_nombre"].'</option>';
    }
  }

  public function createDotacion(){
    if (isset($_POST["frmdotacion"])) {
      $data = $_POST["frmdotacion"];
      $dotacion = array_map('strtoupper', $data);
      $result = $this->model->createDotacion($dotacion);
      print_r($result);
    }
  }

  public function consultaDotacion(){
    $const = $this->model->consultaDotacion();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr role="row">
            <td>'.$item["dot_fecha"].'</td>
            <td>'.$item["elem_nombre"].'</td>
            <td>'.$item["dot_serie"].'</td>
            <td>'.$item["asp_nombre"].'</td>
            <td>'.$item["dot_observacion"].'</td>
            <td>'.$item["usua_nombre1"].' '.$item["usua_nombre2"].' '.$item["usua_apellido1"].' '.$item["usua_apellido2"].'</td>
            </tr>';
      }
    }
  }

  public function consultaDotacionTotal(){
    $const = $this->model->consultaDotacionTotal();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr role="row">
            <td>'.$item["dot_fecha"].'</td>
            <td>'.$item["elem_nombre"].'</td>
            <td>'.$item["dot_serie"].'</td>
            <td>'.$item["asp_nombre"].'</td>
            <td>'.$item["dot_observacion"].'</td>
            <td>'.$item["usua_nombre1"].' '.$item["usua_nombre2"].' '.$item["usua_apellido1"].' '.$item["usua_apellido2"].'</td>
            <td>'.$item["dot_fechareal"].'</td>
            </tr>';
      }
    }
  }

}

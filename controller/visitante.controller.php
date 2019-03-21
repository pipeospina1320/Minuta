<?php
require_once 'model/visitante.model.php';

class VisitanteController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new VisitanteModel();
  }
  // Funcion para
  public function wiewsReporVisit(){
    $title = "Visitantes";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_visitante/reportevisitante.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsConsulVisitHoy(){
    $title = "Consulta Visitantes";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_visitante/consultavisitantehoy.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsConsulVisit(){
    $title = "Consulta Visitantes";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_visitante/consultavisitante.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsConsulVisitTotal(){
    $title = "Consulta Visitantes";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_visitante/consultavisitantet.php';
    require_once 'views/include/footer.php';
  }

  public function consultVisitante(){
    if (isset($_POST["dato"])){
      $data = $_POST["dato"];
      $const = $this->model->consultVisitantes($data);
      if ($const != "") {
        foreach ($const as $key => $value) {
          $nombres = $value[0];
          $apellidos = $value[1];
          $idarea = $value[2];
          $area = $value[3];
          $idreasponsable = $value[4];
          $reasponsable = $value[5]." ".$value[6]." ".$value[7]." ".$value[8];;
          $motivo = $value[9];
          $empresa = $value[10];
          $imegenfoto = $value[11];

          $data = $nombres."|".$apellidos."|".$idarea."|".$area."|".$idreasponsable."|".$reasponsable."|".$motivo."|".$empresa."|".$imegenfoto;
          print_r($data);
        }
      }else {
        print_r("");
      }
    }else {
    print_r("");
    }
  }

  public function selectAreaVisitar(){
    $const = $this->model->selectAreaVisitar();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["area_id"].'">'.$value["area_nombre"].'</option>';
    }
  }

  public function searchAreaResponsable(){
    if (isset($_POST["dato"])) {
      $data = $_POST["dato"];
      $resultSearch = $this->model->searchAreaResponsable($data);
      foreach ($resultSearch as $key => $value) {
        echo '<option value="'.$value["usua_id"].'">'.$value["usua_nombre1"]." " .$value["usua_nombre2"]." ".$value["usua_apellido1"]." ".$value["usua_apellido2"].'</option>';
      }
    }else {
      print_r("");
    }
  }

  public function createVisita(){
    if (isset($_POST["frmvisitanteregister"])) {
      $data = $_POST["frmvisitanteregister"];
      $visita = array_map('strtoupper', $data);
      $result = $this->model->createVisitas($visita);
      print_r($result);
    }
  }

  public function createFotoWebcam(){
    $data = $_POST["dato"];
    $filename = 'users_250x187'.date('YmdHis') . '.png';
    $direcionruta = "views/assets/images/foto_visitante/".$filename;
    $result = $this->model->createFotoWebcams($data, $filename, $direcionruta);
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $subir = move_uploaded_file($_FILES['webcam']['tmp_name'],'views/assets/images/foto_visitante/'.$filename);
    print_r($result);
  }

  public function consultaVisitanteHoy(){
    $const = $this->model->consultaVisitantesHoy();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr role="row">
            <td>'.$item["visit_cedula"].'</td>
            <td>'.$item["visit_nombres"].'</td>
            <td>'.$item["visit_apellidos"].'</td>
            <td>'.$item["vis_fechaingreso"].'</td>
            <td>'.$item["area_nombre"].'</td>
            <td><div class="marcofoto"><img src="'.$item["visit_file"].'" height="42" width="50"></div></td>
            <td>
            <a id="Darlesalida" data-idsalida="'.$item["vis_id"].'" class="btn btn-primary btn-xs"><i class="fa fa-share-square-o"></i> Salida </a>
            </td>
            </tr>';
      }
    }
  }

  public function consultaVisitante(){
    $const = $this->model->consultaVisitantes();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr role="row">
            <td>'.$item["visit_cedula"].'</td>
            <td>'.$item["visit_nombres"].' '.$item["visit_apellidos"].'</td>
            <td>'.$item["vis_proveedor"].'</td>
            <td>'.$item["vis_motivo"].'</td>
            <td>'.$item["area_nombre"].'</td>
            <td>'.$item["usua_nombre1"].' '.$item["usua_nombre2"].' '.$item["usua_apellido1"].' '.$item["usua_apellido2"].'</td>
            <td>'.$item["vis_fechaingreso"].'</td>
            <td>'.$item["vis_fechasalida"].'</td>
            <td>'.$item["nombre1v"].' '.$item["nombre2v"].' '.$item["apellido1v"].' '.$item["apellido2v"].'</td>
            <td>'.$item["nombre1vi"].' '.$item["nombre2vi"].' '.$item["apellido1vi"].' '.$item["apellido2vi"].'</td>
            </tr>';
      }
    }
  }

  public function consultaVisitanteTotal(){
    $const = $this->model->consultaVisitantesTotal();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr role="row">
            <td>'.$item["visit_cedula"].'</td>
            <td>'.$item["visit_nombres"].' '.$item["visit_apellidos"].'</td>
            <td>'.$item["vis_proveedor"].'</td>
            <td>'.$item["vis_motivo"].'</td>
            <td>'.$item["area_nombre"].'</td>
            <td>'.$item["usua_nombre1"].' '.$item["usua_nombre2"].' '.$item["usua_apellido1"].' '.$item["usua_apellido2"].'</td>
            <td>'.$item["vis_fechaingreso"].'</td>
            <td>'.$item["vis_fechasalida"].'</td>
            <td>'.$item["nombre1v"].' '.$item["nombre2v"].' '.$item["apellido1v"].' '.$item["apellido2v"].'</td>
            <td>'.$item["nombre1vi"].' '.$item["nombre2vi"].' '.$item["apellido1vi"].' '.$item["apellido2vi"].'</td>
            <td>'.$item["sed_nombre"].'</td>
            </tr>';
      }
    }
  }

  public function darSalidaVisitante(){
    if (isset($_POST["lockid"])) {
      $data = array($_POST['lockid'], $_POST['fechasalida']);
      $const = $this->model->darSalidaVisitantes($data);
      print_r($const);
    }
  }



}

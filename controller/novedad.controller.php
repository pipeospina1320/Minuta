<?php
require_once 'model/novedad.model.php';

class NovedadController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new NovedadModel();
  }

  public function wiewsNovedad(){
  $title = "Reporte Minuta";
  require_once 'views/include/headar.php';
  require_once 'views/modules/mod_novedad/reportenovedades.php';
  require_once 'views/include/footer.php';
  }

  public function wiewsConstnovedad(){
    $title = "Consulta Minuta";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_novedad/consultanovedades.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsConstnovedadTotal(){
    $title = "Consulta Minuta";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_novedad/consultanovedadest.php';
    require_once 'views/include/footer.php';
  }

  //Funcion para crear Novedad
  public function createNovedad(){
    if (isset($_POST["frmnovedad"])) {
      if ($_FILES["filenovedad"]['error']==0) {
           if ($_FILES["filenovedad"]['type']=="image/png" || $_FILES["filenovedad"]['type']=="image/jpg" || $_FILES["filenovedad"]['type']=="image/jpeg") {
           	   $hoy = date("dmYgis");
               $nom_archivo = $_FILES['filenovedad']['name'];
               $new_nom_archivo = ($hoy.$nom_archivo);
               $target_path = "views/assets/images/novedad/";
               $dirc_file = ($target_path.$new_nom_archivo);
               $target_path = $target_path . basename($hoy.$_FILES['filenovedad']['name']);
               if(move_uploaded_file($_FILES['filenovedad']['tmp_name'], $target_path)){
                    $data = $_POST["frmnovedad"];
                    $novedad = array_map('strtoupper', $data);
                    $result = $this->model->createNovedades($novedad, $dirc_file, $new_nom_archivo);
                    print_r($result);
                   }else{
                      print_r("");
                   }
           }else{
             print_r("");
           }
           }else{
               $data = $_POST["frmnovedad"];
               $novedad = array_map('strtoupper', $data);
               $result = $this->model->createNovedad($novedad);
               print_r($result);
         }
       }
  }

  //Funcion para Seleccionar Cliente
  public function selectClient(){
    $const = $this->model->selectClient();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["clien_id"].'">'.$value["clien_nombre"].'</option>';
    }
  }

  //Funcion para  seleccionar los Tipos de servicios
  public function selectServicio(){
    $const = $this->model->selectServicio();
    foreach ($const as $key => $value){
      echo '<option value="'.$value["servi_id"].'">'.$value["servi_nombre"].'</option>';
    }
  }

  //Funcio para seleccionar la sede con el cliente
  public function selctSedes(){
    $const = $this->model->selectSedes();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["sed_id"].'">'.$value["sed_nombre"].'</option>';
    }
  }

  //Funcio para seleccionar la sede 2 con el cliente
  public function selctSedes2(){
    $const = $this->model->selectSedes2();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["sed_id"].'">'.$value["sed_nombre"].'</option>';
    }
  }

  //Funcion para seleccionar las sedes mediante Ajax
  public function selecTipoNovedad(){
    $data = $_POST["dato"];
    $resultSearch = $this->model->selecTipoNovedads($data);
    foreach ($resultSearch as $key => $value) {
      echo '<option value="'.$value["tn_id"].'">'.$value["tn_nombre"].'</option>';
    }
  }

  public function searchCliente(){
    $data = $_POST["dato"];
    $resultSearch = $this->model->readCliente($data);
    foreach ($resultSearch as $key => $value) {
      echo '<option value="'.$value["sed_id"].'">'.$value["sed_nombre"].'</option>';
    }
  }

  //Funcion para consultar tabla de novedades
  public function consultaNovedad(){
    $const = $this->model->consultNovedad();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr role="row">
            <td class="sorting_1">'.$item["nove_fechas"].'</td>
            <td>'.$item["tn_nombre"].'</td>
            <td>'.$item["nove_novedad"].'</td>
            <td>'.$item["sed_nombre"].'</td>
            <td>'.$item["servi_nombre"].'</td>
            <td>'.$item["nove_turno"].'</td>
            <td>'.$item["usua_nombre1"].' '.$item["usua_nombre2"].' '.$item["usua_apellido1"].' '.$item["usua_apellido2"].'</td>
            <td style="text-align:center;">'; if($item["nove_foto"] == 1){echo '<button type="button" id="FotoEvidencia" class="btn btn-info btn-sm" value='.$item["nove_id"].'>SI</button>';}else{echo '<button type="button" class="btn btn-info btn-sm">NO</button>';}echo'</td>';
            if($item["nove_estado"] == 1){echo '<td style="text-align:center;"><button type="button" id="observacionnovedades" class="btn btn-danger btn-sm" value='.$item["nove_id"].'><i class="fa fa-eye fa-lg"></i></button></td>';}elseif($item["nove_estado"] == 0){echo'<td style="text-align:center;"><button type="button" class="btn btn-default btn-sm" ><i class="fa fa-eye-slash fa-lg"></i></button></td>';}
      }
        echo '</tr>';
    }
  }

  //Funcion para consultar tabla de novedades
  public function consultaNovedadTotal(){
    $const = $this->model->consultNovedadTotal();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr role="row">
            <td class="sorting_1">'.$item["nove_fechas"].'</td>
            <td>'.$item["tn_nombre"].'</td>
            <td>'.$item["nove_novedad"].'</td>
            <td>'.$item["sed_nombre"].'</td>
            <td>'.$item["servi_nombre"].'</td>
            <td>'.$item["nove_turno"].'</td>
            <td>'.$item["usua_nombre1"].' '.$item["usua_nombre2"].' '.$item["usua_apellido1"].' '.$item["usua_apellido2"].'</td>
            <td>'.$item["nove_fechasreal"].'</td>
            <td style="text-align:center;">'; if($item["nove_foto"] == 1){echo '<button type="button" id="FotoEvidencia" class="btn btn-info btn-sm" value='.$item["nove_id"].'>SI</button>';}else{echo '<button type="button" class="btn btn-info btn-sm">NO</button>';}echo'</td>';
            if($item["nove_estado"] == 0){echo '<td style="text-align:center;"><button type="button" id="observacionnovedad" class="btn btn-warning btn-sm" value='.$item["nove_id"].'><i class="fa fa-edit fa-lg"></i></button></td>';}
              else if($item["nove_estado"] == 1){echo '<td style="text-align:center;"><button type="button" class="btn btn-danger btn-sm" id="verobservacion" value='.$item["nove_id"].'><i class="fa fa-eye fa-lg"></i></button></td>';}
            }

          echo' </tr>';

      }
    }
  // }

  public function buscarFotoEvidencia(){
    if (isset($_POST["dato"])) {
      $data = $_POST["dato"];
      $result = $this->model->buscarFotoEvidencias($data);
        if ($result != "") {
        foreach ($result as $key => $value) {
          print_r($value["nove_file"]);
        }
      }else {
        print_r("");
      }
    }
  }

  public function searchNovedad(){
    if (isset($_POST["dato"])) {
      $data = $_POST["dato"];
      $result = $this->model->searchNovedades($data);
      if ($result != "") {
        foreach ($result as $key => $value) {
          $novedad = $value[1];
          $reporta = $value[2]." ".$value[3]." ".$value[4]." ".$value[5];
          $idnovedad = $value[0];
          print_r($novedad."|".$reporta."|".$idnovedad);
        }
      }else {
        print_r("");
      }
    }
  }

  public function createObservacion(){
    if (isset($_POST["frmObservacion"])) {
      $data = $_POST["frmObservacion"];
      $novedad = array_map('strtoupper', $data);
      $result = $this->model->createObservaciones($novedad);
      print_r($result);
    }
  }

  public function searchObservacion(){
    if (isset($_POST["dato"])) {
      $data = $_POST["dato"];
      $result = $this->model->searchObservacions($data);
      if ($result != "") {
        foreach ($result as $key => $value) {
          $observacion = $value[0];
          $reporta = $value[1]." ".$value[2]." ".$value[3]." ".$value[4];
          print_r($observacion."|".$reporta);
        }
      }else {
        print_r("");
      }
    }
  }


}

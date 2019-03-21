<?php
require_once 'model/equipo.model.php';

class EquipoController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new EquipoModel();
  }
  // Funcion para
  public function wiewsEquiposRegister(){
    $title = "Reporte Equipo";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_equipo/reporteequipo.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsConstEquipos(){
    $title = "Consulta Equipo";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_equipo/consultaequipo.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsDalleteEquipo(){
    $title = "Detalle De Equipos";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_equipo/detalleequipo.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsDalleteEquipoLaptop(){
    $title = "Detalle De Equipos";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_equipo/detalleequipolaptop.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsEditarEquipo(){
    $title = "Detalle De Equipos";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_equipo/editarequipo.php';
    require_once 'views/include/footer.php';
  }

  public function selecDispositivo(){
    $const = $this->model->selecDispositivos();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["dispo_id"].'">'.$value["dispo_nombre"].'</option>';
    }
  }

  public function selecMarca(){
    $const = $this->model->selectMarca();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["marc_id"].'">'.$value["marc_nombre"].'</option>';
    }
  }

  public function frmcreateEquipo(){
    if (isset($_POST["frmcreateEquipo"])) {
      $datamin = $_POST["frmcreateEquipo"];
      $data = array_map('strtoupper', $datamin);
      $result = $this->model->frmcreateEquiposCelular($data);
      print_r($result);
    }elseif (isset($_POST["frmcreateEquipoLaptop"])) {
      $datamin = $_POST["frmcreateEquipoLaptop"];
      $data = array_map('strtoupper', $datamin);
      $result = $this->model->frmcreateEquiposLaptop($data);
      print_r($result);
    }elseif (isset($_POST["frmcreateEquipoPc"])) {
      return false;
    }else {
      return false;
    }
  }

  public function consultaEquipo(){
    $const = $this->model->consultaEquipos();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr role="row">
            <td class="sorting_1">'.$item["dispo_nombre"].'</td>
            <td>'.$item["marc_nombre"].'</td>
            <td>'.$item["equi_modelo"].'</td>
            <td>'.$item["equi_serial"].'</td>
            <td>'; if($item["equi_estado"] == 1){echo 'NUEVO';}elseif($item["equi_estado"] == 2){echo 'USADO';} echo'</td>
            <td>'.$item["equi_fechas"].'</td>
            <td>';
            if ($item["dispo_id"] == 1) {
              echo' <a href="Equipo-Detalle-'.$item["equi_id"].'" class="btn btn-primary btn-xs"><i class="fa fa-info-circle"></i> Detalle </a>
                    <a href="Equipo-Editar-'.$item["equi_id"].'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                    <a href="Equipo-Acta-'.$item["equi_id"].'" class="btn btn-warning btn-xs"><i class="fa fa-file"></i> Generar Acta </a>';
            }elseif ($item["dispo_id"] == 2) {
              echo' <a href="EquipoLaptop-Detalle-'.$item["equi_id"].'" class="btn btn-primary btn-xs"><i class="fa fa-info-circle"></i> Detalle </a>
                    <a href="EquipoLaptop-Editar-'.$item["equi_id"].'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                    <a href="EquipoLaptop-Acta-'.$item["equi_id"].'" class="btn btn-warning btn-xs"><i class="fa fa-file"></i> Generar Acta </a>';
            }
            echo '</td>
            </tr>';
      }
    }
  }

  public  function detalleEquipo(){
    if (isset($_GET["Detalle"])) {
      $data = $_GET["Detalle"];
        $const = $this->model->ConsultDetalleEquipo($data);
        if ($const == "") {
          header("location:Error500");
        }else {
          foreach ($const as $key => $value) {
            echo '     <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th colspan="2" style="text-align:center">DETALLE DE EQUIPO '.$value["dispo_nombre"].' - '.$value["equi_serial"].'</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="even pointer">
                                <td class=" ">Marca:</td>
                                <td class=" ">'.$value["marc_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Modelo:</td>
                                <td class=" ">'.$value["equi_modelo"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Serial:</td>
                                <td class=" ">'.$value["equi_serial"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">IMEI 1:</td>
                                <td class=" ">'.$value["equi_imei1"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">IMEI 2:</td>
                                <td class=" ">'.$value["equi_imei2"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Estado:</td>
                                <td class=" ">'; if($value["equi_estado"] == 1){ echo 'NUEVO';}elseif($value["equi_estado"] == 2){echo 'USADO';} echo '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Numero SimCard:</td>
                                <td class=" ">'.$value["equi_numsimcard"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Nombre Del Empleado Asignado:</td>
                                <td class=" ">'.$value["equi_asignado"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Cargo o Puesto Asignado:</td>
                                <td class=" ">'.$value["equi_puesto"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Observaciónes:</td>
                                <td class=" ">'.$value["equi_observacion"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Actas de Entrega:</td>
                                <td class=" ">

                                </td>

                              </tr>
                            </tbody>
                          </table>
                        </div>';
          }
        }
      }
  }

  public  function detalleEquipoLaptop(){
    if (isset($_GET["Detalle"])) {
      $data = $_GET["Detalle"];
        $const = $this->model->ConsultDetalleEquipoLaptop($data);
        if ($const == "") {
          header("location:Error500");
        }else {
          foreach ($const as $key => $value) {
            echo '     <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th colspan="2" style="text-align:center">DETALLE DE EQUIPO '.$value["dispo_nombre"].' - '.$value["equi_serial"].'</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="even pointer">
                                <td class=" ">Marca:</td>
                                <td class=" ">'.$value["marc_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Modelo:</td>
                                <td class=" ">'.$value["equi_modelo"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Serial:</td>
                                <td class=" ">'.$value["equi_serial"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Estado:</td>
                                <td class=" ">'; if($value["equi_estado"] == 1){ echo 'NUEVO';}elseif($value["equi_estado"] == 2){echo 'USADO';} echo '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Caracteristicas:</td>
                                <td class=" ">'.$value["equi_caracteristicas"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Nombre Del Empleado Asignado:</td>
                                <td class=" ">'.$value["equi_asignado"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Cargo o Puesto Asignado:</td>
                                <td class=" ">'.$value["equi_puesto"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Observaciónes:</td>
                                <td class=" ">'.$value["equi_observacion"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Actas de Entrega:</td>
                                <td class=" ">

                                </td>

                              </tr>
                            </tbody>
                          </table>
                        </div>';
          }
        }
      }
  }

  public function ActaEntregaEquipo(){
    if (isset($_GET["Acta"])) {
      $data = $_GET["Acta"];
      $title = "Reporte Equipo";
      require_once 'views/include/headar.php';
      require_once 'views/modules/mod_equipo/actaequipo.php';
      require_once 'views/include/footer.php';
    }
  }

  public function frmcreateActaEquipo(){
    if (isset($_POST["frmcreateActa"])) {
      $datamin = $_POST["frmcreateActa"];
      $data = array_map('strtoupper', $datamin);
      $datar= array($_POST["frmcreateActaNewEquipo"], $_POST["frmcreateActaNewSilicona"], $_POST["frmcreateActaNewVidrio"], $_POST["frmcreateActaNewCargador"],$_POST["frmcreateActaNewBateria"],
                         $_POST["frmcreateActaEntreEquipo"], $_POST["frmcreateActaEntreSilicona"], $_POST["frmcreateActaEntreVidrio"], $_POST["frmcreateActaEntreCargador"], $_POST["frmcreateActaEntreBateria"]);
      $result = $this->model->frmcreateActaEquipos($data,$datar );
      print_r($result);
    }
  }


}

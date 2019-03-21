<?php
require_once 'model/reparacionequipo.model.php';
require_once 'libs/mpdf-6.1.4/mpdf.php';


class ReparacionEquipoController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new ReparacionEquipoModel();
  }
  // Funcion para
  public function wiewsReparacionEquipo(){
    $title = "Reparación De Equipos";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_reparacionequipo/reportereparacionequipo.php';
    require_once 'views/include/footer.php';
  }

  public function consulReparacionEquipo(){
    $title = "Reparación De Equipos";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_reparacionequipo/consultareparacionequipo.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsDalleteReparacionEquipo(){
    $title = "Detalle De Equipos";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_reparacionequipo/detallereparacionequipo.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsEditarReparacionEquipo(){
    $title = "Detalle De Equipos";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_reparacionequipo/editarreparacionequipo.php';
    require_once 'views/include/footer.php';
  }

  public function selectStatus(){
    $const = $this->model->selectStatus();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["stat_id"].'">'.$value["stat_nombre"].'</option>';
    }
  }

  public function selectArea(){
    $const = $this->model->selectArea();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["area_id"].'">'.$value["area_nombre"].'</option>';
    }
  }

  public function selectDispositivo(){
    $const = $this->model->selectDispositivo();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["dispo_id"].'">'.$value["dispo_nombre"].'</option>';
    }
  }

  public function selectMarca(){
    $const = $this->model->selectMarca();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["marc_id"].'">'.$value["marc_nombre"].'</option>';
    }
  }

  public function selectProveedor(){
    $const = $this->model->selectProveedor();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["provee_id"].'">'.$value["provee_nombre"].'</option>';
    }
  }

  public function selectTecnico(){
    $const = $this->model->selectTecnicos();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["usua_id"].'">'.$value["usua_nombre1"].' '.$value["usua_nombre2"].' '.$value["usua_apellido1"].' '.$value["usua_apellido2"].'</option>';
    }
  }

  public function selectEstado(){
    $const = $this->model->selectEstado();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["estequi_id"].'">'.$value["estequi_nombre"].'</option>';
    }
  }

  public function selectAsesor(){
    $const = $this->model->selectAsesor();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["ase_id"].'">'.$value["ase_nombre"].'</option>';
    }
  }

  public function selectRepatado(){
    $const = $this->model->selectRepatado();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["rep_id"].'">'.$value["rep_nombre"].'</option>';
    }
  }

  public function searchNit(){
      if ($_POST["dato"] != ""){
      $data = $_POST["dato"];
      $const = $this->model->searchNits($data);
      foreach ($const as $key => $value) {
        print_r($value[0]."-".$value[1]);
      }
    }else {
      print_r("");
    }
  }

  public function searchCliente(){
    if ($_POST["dato"] != "") {
      $data = $_POST["dato"];
      $const = $this->model->searchClientes($data);
      if ($const != "") {
        foreach ($const as $key => $value) {
          $codigo = $value[0];
          $nombre = $value[3];
          $nit = $value[1];
          $verify = $value[2];
          $guion = "-";
          print_r($codigo."/".$nombre."/".$nit."/".$guion."/".$verify);
        }
      }else {
        print_r("");
      }
    }else {
        print_r("");
    }
  }

  public function createRepaEquipo(){
    if (isset($_POST["frmcreateRepaEquipo"])) {
      $hoy = date("dmYgis");
      $archivo = $_FILES['frmfilerepaEquipo']['tmp_name'];
      if ($archivo != "") {
      $nom_archivo = $_FILES['frmfilerepaEquipo']['name']; //nombre de archivo como lo carga desde el escritorio
      $hoy = date("dmYgis");
      $new_nom_archivo = ($hoy.$nom_archivo);
      $ext = pathinfo($new_nom_archivo);
      $ruta = "views/assets/images/equipo_reparacion/";
      $dirc_file = ($ruta.$new_nom_archivo);
      $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
      $datamin = $_POST["frmcreateRepaEquipo"];
      $data = array_map('strtoupper', $datamin);
      $result = $this->model->frmcreateRepaEquipos($data, $dirc_file, $new_nom_archivo);
    }else {
      $html ='<h1 style="text-align: center;">&nbsp;</h1>
      <h1 style="text-align: center;">&nbsp;</h1>
      <h1 style="text-align: center;">&nbsp;</h1>
      <h1 style="text-align: center;">No hay evidencias adjuntas ...</h1>';
      $mpdf = new Mpdf('c', 'A4');
      $mpdf->WriteHTML($html);
      $mpdf->Output('views/assets/images/equipo_reparacion/'.$hoy.'SinEvidencia.pdf', 'F');
      $dirc_file = 'views/assets/images/equipo_reparacion/'.$hoy.'SinEvidencia.pdf';
      $new_nom_archivo = $hoy."SinEvidencia.pdf";
      $datamin = $_POST["frmcreateRepaEquipo"];
      $data = array_map('strtoupper', $datamin);
      $result = $this->model->frmcreateRepaEquipos($data, $dirc_file, $new_nom_archivo);
    }
      print_r($result);
    }
  }

  public function ConsultReparacionEquipos(){
    $const = $this->model->ConsultReparacionEquipo();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr role="row">
            <td class="sorting_1">'.$item["dispo_nombre"].'</td>
            <td>'.$item["fechaequipo"].'</td>
            <td>'.$item["clien_nombre"].'</td>
            <td>'.$item["stat_nombre"].'</td>
            <td>'.$item["re_serial"].'</td>
            <td>'.$item["re_falla"].'</td>
            <td>
              <a href="ReEquipo-Detalle-'.$item["re_id"].'" class="btn btn-primary btn-xs"><i class="fa fa-info-circle"></i> Detalle </a>
              <a href="ReEquipo-Editar-'.$item["re_id"].'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
            </td>
            </tr>';
      }
    }
  }

  public  function detalleReparacionEquipo(){
    if (isset($_GET["Detalle"])) {
      $data = $_GET["Detalle"];
        $const = $this->model->ConsultDetalleReparacionEquipo($data);
        if ($const == "") {
          header("location:Error500");
        }else {
          foreach ($const as $key => $value) {
            echo '            <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th colspan="2" style="text-align:center">DETALLE DE EQUIPO '.$value["dispo_nombre"].' - '.$value["re_serial"].'</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="even pointer">
                                <td class=" ">Nombre Del Cliente:</td>
                                <td class=" ">'.$value["clien_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Puesto:</td>
                                <td class=" ">'.$value["re_puesto"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Status:</td>
                                <td class=" ">'.$value["stat_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Área Responsable:</td>
                                <td class=" ">'.$value["area_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Tipos De Dispositivo:</td>
                                <td class=" ">'.$value["dispo_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Marca:</td>
                                <td class=" ">'.$value["marc_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Modelo:</td>
                                <td class=" ">'.$value["re_modelo"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Serial:</td>
                                <td class=" ">'.$value["re_serial"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Garantía:</td>
                                <td class=" ">'.$value["re_garantia"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Fecha Retiro:</td>
                                <td class=" ">'.$value["re_fecharetiro"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Fecha Ingreso:</td>
                                <td class=" ">'.$value["re_fechaingreso"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Fecha Noficación al Cliente:</td>
                                <td class=" ">'.$value["re_fechanoticliente"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Fecha Envió Proveedor:</td>
                                <td class=" ">'.$value["re_fechaenvio"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Proveedor:</td>
                                <td class=" ">'.$value["provee_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Reparado por:</td>
                                <td class=" ">'.$value["rep_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Asesor:</td>
                                <td class=" ">'.$value["ase_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Tecnico Desmonte:</td>
                                <td class=" ">'.$value["nombre1_repara"].' '.$value["nombre2_repara"].' '.$value["apellido1_repara"].' '.$value["apellido2_repara"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Estado Fisico del Equipo:</td>
                                <td class=" ">'.$value["estequi_nombre"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Descripción De La Falla: :</td>
                                <td class=" ">'.$value["re_falla"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Diagnóstico:</td>
                                <td class=" ">'.$value["re_dianostico"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Observaciones:</td>
                                <td class=" ">'.$value["re_observacion"].'</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Evidencia:</td>
                                <td class=" "><a href="ReEquipo-Reader-'.$value["re_id"].'" target="_blank"><i class="fa fa-eye"></i> VER EVIDENCIA</a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>';
          }
        }
      }
  }

  public function readerArchivoReEquipo(){
    if (isset($_GET["Reader"])) {
      $data = $_GET["Reader"];
      $const = $this->model->ConsultDetalleReparacionEquipo($data);
      if ($const == "NULL") {
        header("location:Error500");
      }else {
        foreach ($const as $key => $value) {
          header('content-type: application/pdf');
          readfile($value["re_file"]);
        }
      }
    }
  }

  public function editarReparacionEquipo(){
    if (isset($_GET["Editar"])) {
      $data = $_GET["Editar"];
      $const = $this->model->ConsultDetalleReparacionEquipo($data);
      if ($const == "") {
        header("location:Error500");
      }else {
        foreach ($const as $key => $value) {
          echo '<div class="x_panel">
            <div class="x_title">
              <h2 class="titlereporteservicio">Equipo En Reparación '.$value["dispo_nombre"].' - '.$value["re_serial"].'</h2>
              <ul class="nav navbar-right panel_toolbox">
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="frmeditarRepaEquipo[]" enctype="multipart/form-data">

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Del Cliente: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editselecioncliente">
                      <option value="'.$value["clien_id"].'">'.$value["clien_nombre"].'</option>';
                      $selectcliente = new NovedadController();
                      $selectcliente -> selectClient();
                    echo'</select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Puesto: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="frmeditarRepaEquipo[]" value="'.$value['re_puesto'].'" class="form-control" id="editpuestorequipo">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editselecionastatus">
                      <option value="'.$value["stat_id"].'">'.$value["stat_nombre"].'</option>';
                      $selectstatu = new ReparacionEquipoController();
                      $selectstatu -> selectStatus();
                  echo'</select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Área Responsable: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editarearequipo">
                    <option value="'.$value["area_id"].'">'.$value["area_nombre"].'</option>';
                      $selectarea = new ReparacionEquipoController();
                      $selectarea -> selectArea();
              echo'</select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipos De Dispositivo: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editdisposotivorequipo">
                      <option value="'.$value["dispo_id"].'">'.$value["dispo_nombre"].'</option>';
                      $selectdispositivo = new ReparacionEquipoController();
                      $selectdispositivo -> selectDispositivo();
                    echo'</select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca: <span class="required">*</span></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editmarcarequipo">>
                      <option value="'.$value["marc_id"].'">'.$value["marc_nombre"].'</option>';
                      $selectmarca = new ReparacionEquipoController();
                      $selectmarca -> selectMarca();
                    echo'</select>
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">Modelo: <span class="required">*</span></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" class="form-control" name="frmeditarRepaEquipo[]" value="'.$value["re_modelo"].'" required="required" id="editmodelorequipo">
                  </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial: <span class="required">*</span></label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" name="frmeditarRepaEquipo[]" value="'.$value["re_serial"].'" required="required" id="editserialrequipo">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Tiene Garantía: <span class="required">*</span></label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="x_content">
                        <div class="radio">
                          <label>
                            Si <input type="radio" class="flat" name="frmeditarRepaEquipo[]" value="SI  "'; if ($value["re_garantia"] === 'SI') {echo 'checked';} echo '>
                          </label>
                          <label>
                            No <input type="radio" class="flat"  name="frmeditarRepaEquipo[]" value="NO"'; if ($value["re_garantia"] === 'NO') {echo 'checked';} echo '>
                          </label>
                      </div>
                    </div>
                    </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Fecha Retiro: <span class="required">*</span> </label>
                  <div class="col-sm-3">
                    <div class="form-group">
                    <div class="input-group date">
                        <input type="date" class="form-control" name="frmeditarRepaEquipo[]" required="required" value="'.$value["re_fecharetiro"].'" id="editfecharetirorequipo">
                        <span class="input-group-addon">
                           <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                    </div>
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="textarea" >Fecha Ingreso: <span class="required">*</span> </label>
                  <div class="col-sm-3">
                     <div class="form-group">
                    <div class="input-group date">
                        <input type="date" class="form-control" name="frmeditarRepaEquipo[]" required="required" value="'.$value["re_fechaingreso"].'" id="editfechaingresorequipo">
                        <span class="input-group-addon">
                           <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                  </div>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea" >Fecha Noficación al Cliente: <span class="required">*</span> </label>
                  <div class="col-sm-3">
                    <div class="form-group">
                    <div class="input-group date">
                        <input type="date" class="form-control" name="frmeditarRepaEquipo[]"  value="'.$value["re_fechanoticliente"].'" >
                        <span class="input-group-addon">
                           <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                    </div>
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="textarea" >Fecha Envió Proveedor: <span class="required">*</span> </label>
                  <div class="col-sm-3">
                     <div class="form-group">
                    <div class="input-group date">
                        <input type="date" class="form-control" name="frmeditarRepaEquipo[]" value="'.$value["re_fechaenvio"].'">
                        <span class="input-group-addon">
                           <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                  </div>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Proveedor: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editprovedorrequipo" >
                      <option value="'.$value["provee_id"].'">'.$value["provee_nombre"].'</option>';
                      $selectprovedor = new ReparacionEquipoController();
                      $selectprovedor -> selectProveedor();
              echo '</select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reparado por: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editreparadorequipo">
                      <option value="'.$value["rep_id"].'">'.$value["rep_nombre"].'</option>';
                      $selectreparado = new ReparacionEquipoController();
                      $selectreparado -> selectRepatado();
              echo '</select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Asesor: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editasesorrequipo">
                      <option value="'.$value["ase_id"].'">'.$value["ase_nombre"].'</option>';
                      $selectasesor = new ReparacionEquipoController();
                      $selectasesor -> selectAsesor();

            echo '  </select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tecnico Desmonte: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="edittecnicorequipo">
                      <option value="'.$value["usua_id"].'">'.$value["nombre1_repara"].' '.$value["nombre2_repara"].' '.$value["apellido1_repara"].' '.$value["apellido2_repara"].'</option>';
                      $selectecnico = new ReparacionEquipoController();
                      $selectecnico -> selectTecnico();
                    echo'</select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Fisico del Equipo: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editestadorequipo">
                      <option value="'.$value["estequi_id"].'">'.$value["estequi_nombre"].'</option>';
                      $selectestado = new ReparacionEquipoController();
                      $selectestado -> selectEstado();
                  echo' </select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción De La Falla: <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <textarea required="required" name="frmeditarRepaEquipo[]" class="form-control" rows="2" placeholder="Escribe una Descripción De La Falla" id="editfallarequipo">'.$value["re_falla"].'</textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Diagnóstico: <span class="required"></span>
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <textarea required="required" name="frmeditarRepaEquipo[]" class="form-control" rows="3" id="editdianosticorequipo">'.$value["re_dianostico"].'</textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones: <span class="required"></span>
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <textarea required="required" name="frmeditarRepaEquipo[]" class="form-control" rows="3" id="editobservacionrequipo">'.$value["re_observacion"].'</textarea>
                  </div>
                </div>
                <input type="hidden" name="frmeditarRepaEquipo[]" value="'.$value["re_id"].'">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Adjuntar Evidencia: </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" class="form-control" id="editfileRepaEquipo" name="editfilerepaEquipo" accept="application/msword, application/pdf">
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Enviar</button>
                  </div>
                </div>

              </form>
            </div>
          </div>';
        }
      }
    }
  }

  public function editarRepaEquipo(){
    if (isset($_POST["frmeditarRepaEquipo"])) {
      $archivo = $_FILES['editfilerepaEquipo']['tmp_name'];
      $hoy = date("dmYgis");
      if ($archivo != "") {
        $nom_archivo = $_FILES['editfilerepaEquipo']['name']; //nombre de archivo como lo carga desde el escritorio
        $new_nom_archivo = ($hoy.$nom_archivo);
        $ext = pathinfo($new_nom_archivo);
        $ruta = "views/assets/images/equipo_reparacion/";
        $dirc_file = ($ruta.$new_nom_archivo);
        $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
        $datamin = $_POST["frmeditarRepaEquipo"];
        $data = array_map('strtoupper', $datamin);
        $result = $this->model->editarRepaEquipos($data, $dirc_file, $new_nom_archivo);
      }else {
        $html ='<h1 style="text-align: center;">&nbsp;</h1>
        <h1 style="text-align: center;">&nbsp;</h1>
        <h1 style="text-align: center;">&nbsp;</h1>
        <h1 style="text-align: center;">No hay evidencias adjuntas ...</h1>';
        $mpdf = new Mpdf('c', 'A4');
        $mpdf->WriteHTML($html);
        $mpdf->Output('views/assets/images/equipo_reparacion/'.$hoy.'SinEvidencia.pdf', 'F');
        $dirc_file = 'views/assets/images/equipo_reparacion/'.$hoy.'SinEvidencia.pdf';
        $new_nom_archivo = $hoy."SinEvidencia.pdf";
        $datamin = $_POST["frmeditarRepaEquipo"];
        $data = array_map('strtoupper', $datamin);
        $result = $this->model->editarRepaEquipos($data, $dirc_file, $new_nom_archivo);
      }
      print_r($result);
    }else {
      print_r("");
    }
  }



}

<?php
require_once 'model/reparacionequipo.model.php';
require_once 'libs/mpdf-6.1.4/mpdf.php';
require_once 'libs/phpExcel/PHPExcel.php';

class ReparacionEquipoController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new ReparacionEquipoModel();
    }
    // Funcion para
    public function wiewsReparacionEquipo()
    {
        $title = "Reparación De Equipos";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_reparacionequipo/reportereparacionequipo.php';
        require_once 'views/include/footer.php';
    }

    public function consulReparacionEquipo()
    {
        $title = "Reparación De Equipos";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_reparacionequipo/consultareparacionequipo.php';
        require_once 'views/include/footer.php';
    }

    public function wiewsDalleteReparacionEquipo()
    {
        $title = "Detalle De Equipos";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_reparacionequipo/detallereparacionequipo.php';
        require_once 'views/include/footer.php';
    }

    public function wiewsEditarReparacionEquipo()
    {
        $title = "Detalle De Equipos";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_reparacionequipo/editarreparacionequipo.php';
        require_once 'views/include/footer.php';
    }

    public function selectStatus()
    {
        $const = $this->model->selectStatus();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["stat_id"] . '">' . $value["stat_nombre"] . '</option>';
        }
    }

    public function selectArea()
    {
        $const = $this->model->selectArea();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["area_id"] . '">' . $value["area_nombre"] . '</option>';
        }
    }

    public function selectDispositivo()
    {
        $const = $this->model->selectDispositivo();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["dispo_id"] . '">' . $value["dispo_nombre"] . '</option>';
        }
    }

    public function selectMarca()
    {
        $const = $this->model->selectMarca();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["marc_id"] . '">' . $value["marc_nombre"] . '</option>';
        }
    }

    public function selectProveedor()
    {
        $const = $this->model->selectProveedor();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["provee_id"] . '">' . $value["provee_nombre"] . '</option>';
        }
    }

    public function selectTecnico()
    {
        $const = $this->model->selectTecnicos();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["usua_id"] . '">' . $value["usua_nombre1"] . ' ' . $value["usua_nombre2"] . ' ' . $value["usua_apellido1"] . ' ' . $value["usua_apellido2"] . '</option>';
        }
    }

    public function selectEstado()
    {
        $const = $this->model->selectEstado();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["estequi_id"] . '">' . $value["estequi_nombre"] . '</option>';
        }
    }

    public function selectAsesor()
    {
        $const = $this->model->selectAsesor();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["ase_id"] . '">' . $value["ase_nombre"] . '</option>';
        }
    }

    public function selectRepatado()
    {
        $const = $this->model->selectRepatado();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["rep_id"] . '">' . $value["rep_nombre"] . '</option>';
        }
    }

    public function searchNit()
    {
        if ($_POST["dato"] != "") {
            $data  = $_POST["dato"];
            $const = $this->model->searchNits($data);
            foreach ($const as $key => $value) {
                print_r($value[0] . "-" . $value[1]);
            }
        } else {
            print_r("");
        }
    }

    public function searchCliente()
    {
        if ($_POST["dato"] != "") {
            $data  = $_POST["dato"];
            $const = $this->model->searchClientes($data);
            if ($const != "") {
                foreach ($const as $key => $value) {
                    $codigo = $value[0];
                    $nombre = $value[3];
                    $nit    = $value[1];
                    $verify = $value[2];
                    $guion  = "-";
                    print_r($codigo . "/" . $nombre . "/" . $nit . "/" . $guion . "/" . $verify);
                }
            } else {
                print_r("");
            }
        } else {
            print_r("");
        }
    }

    public function createRepaEquipo()
    {
        if (isset($_POST["frmcreateRepaEquipo"])) {
            $hoy     = date("dmYgis");
            $archivo = $_FILES['frmfilerepaEquipo']['tmp_name'];
            if ($archivo != "") {
                $nom_archivo     = $_FILES['frmfilerepaEquipo']['name']; //nombre de archivo como lo carga desde el escritorio
                $hoy             = date("dmYgis");
                $new_nom_archivo = ($hoy . $nom_archivo);
                $ext             = pathinfo($new_nom_archivo);
                $ruta            = "views/assets/images/equipo_reparacion/";
                $dirc_file       = ($ruta . $new_nom_archivo);
                $subir           = move_uploaded_file($archivo, $ruta . "/" . $new_nom_archivo);
                $datamin         = $_POST["frmcreateRepaEquipo"];
                $data            = array_map('strtoupper', $datamin);
                $add             = $_POST["frmcreateRepaEquipoAdd"];
                // var_dump($add);exit();
                $result = $this->model->frmcreateRepaEquipos($data, $dirc_file, $new_nom_archivo, $add);
            } else {
                $html = '<h1 style="text-align: center;">&nbsp;</h1>
      <h1 style="text-align: center;">&nbsp;</h1>
      <h1 style="text-align: center;">&nbsp;</h1>
      <h1 style="text-align: center;">No hay evidencias adjuntas ...</h1>';
                $mpdf = new Mpdf('c', 'A4');
                $mpdf->WriteHTML($html);
                $mpdf->Output('views/assets/images/equipo_reparacion/' . $hoy . 'SinEvidencia.pdf', 'F');
                $dirc_file       = 'views/assets/images/equipo_reparacion/' . $hoy . 'SinEvidencia.pdf';
                $new_nom_archivo = $hoy . "SinEvidencia.pdf";
                $datamin         = $_POST["frmcreateRepaEquipo"];
                $data            = array_map('strtoupper', $datamin);
                $add             = $_POST["frmcreateRepaEquipoAdd"];
                // var_dump($add);exit();
                $result = $this->model->frmcreateRepaEquipos($data, $dirc_file, $new_nom_archivo, $add);
            }
            print_r($result);
        }
    }

    public function consultReparacionEquipos()
    {
        if (isset($_POST["start"],
            $_POST["length"],
            $_POST["order"][0]["column"],
            $_POST["order"][0]["dir"],
            $_POST["search"]["value"],
            $_POST["draw"])) {
            // Parametro de inicio
            $start = (int) $_POST["start"];
            // Parametro Final
            $length = (int) $_POST["length"];
            // Parametro Ordenar
            $orderColumn = $_POST["order"][0]["column"];
            $orderDir    = $_POST["order"][0]["dir"];
            // Parametro de busqueda
            $search = $_POST["search"]["value"];
            //Consulta
            $const = $this->model->consultReparacionEquipo($start, $length, $search, $orderColumn, $orderDir);
            $datos = [];
            foreach ($const[0] as $row => $value) {
                $array                = [];
                $array["dispositivo"] = $value["dispo_nombre"];
                $array["fecha"]       = $value["re_fecha"];
                $array["cliente"]     = $value["clien_nombre"];
                $array["status"]      = $value["stat_nombre"];
                $array["serial"]      = $value["re_serial"];
                $array["falla"]       = $value["re_falla"];
                $array["id"]          = $value["re_id"];
                $datos[]              = $array;
            }
            $json_data = array(
                "draw"            => intval($_POST["draw"]),
                "recordsTotal"    => intval($const[1]),
                "recordsFiltered" => intval($const[2][0]),
                "data"            => $datos,
            );
            echo json_encode($json_data);
        }
    }

    public function consultReparacionEquiposPrestamo()
    {
        if (isset($_POST["start"],
            $_POST["length"],
            $_POST["order"][0]["column"],
            $_POST["order"][0]["dir"],
            $_POST["search"]["value"],
            $_POST["draw"])) {
            // Parametro de inicio
            $start = (int) $_POST["start"];
            // Parametro Final
            $length = (int) $_POST["length"];
            // Parametro Ordenar
            $orderColumn = $_POST["order"][0]["column"];
            $orderDir    = $_POST["order"][0]["dir"];
            // Parametro de busqueda
            $search = $_POST["search"]["value"];
            //Consulta
            $const = $this->model->consultReparacionEquiposPrestamos($start, $length, $search, $orderColumn, $orderDir);
            $datos = [];
            foreach ($const[0] as $row => $value) {
                $array                = [];
                $array["dispositivo"] = $value["dispo_nombre"];
                $array["fecha"]       = $value["re_fecha"];
                $array["cliente"]     = $value["clien_nombre"];
                $array["status"]      = $value["stat_nombre"];
                $array["serial"]      = $value["re_serial"];
                $array["falla"]       = $value["re_falla"];
                $array["dias"]        = $value["re_dias"];
                $array["id"]          = $value["re_id"];
                $datos[]              = $array;
            }
            $json_data = array(
                "draw"            => intval($_POST["draw"]),
                "recordsTotal"    => intval($const[1]),
                "recordsFiltered" => intval($const[2][0]),
                "data"            => $datos,
            );
            echo json_encode($json_data);
        }
    }

    public function detalleReparacionEquipo()
    {
        if (isset($_GET["Detalle"])) {
            $data  = $_GET["Detalle"];
            $const = $this->model->ConsultDetalleReparacionEquipo($data);
            if ($const == "") {
                header("location:Error500");
            } else {
                foreach ($const as $key => $value) {
                    echo '            <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th colspan="2" style="text-align:center">DETALLE DE EQUIPO ' . $value["dispo_nombre"] . ' - ' . $value["re_serial"] . '</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="even pointer">
                                <td class=" ">Nombre Del Cliente:</td>
                                <td class=" ">' . $value["clien_nombre"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Puesto:</td>
                                <td class=" ">' . $value["re_puesto"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Status:</td>
                                <td class=" ">' . $value["stat_nombre"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Costo:</td>
                                <td class=" ">' . $value["re_costo"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Área Responsable:</td>
                                <td class=" ">' . $value["area_nombre"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Tipos De Dispositivo:</td>
                                <td class=" ">' . $value["dispo_nombre"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Marca:</td>
                                <td class=" ">' . $value["marc_nombre"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Modelo:</td>
                                <td class=" ">' . $value["re_modelo"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Serial:</td>
                                <td class=" ">' . $value["re_serial"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Garantía:</td>
                                <td class=" ">' . $value["re_garantia"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Fecha Retiro:</td>
                                <td class=" ">' . $value["re_fecharetiro"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Fecha Ingreso:</td>
                                <td class=" ">' . $value["re_fechaingreso"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Fecha Noficación al Cliente:</td>
                                <td class=" ">' . $value["re_fechanoticliente"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Fecha Envió Proveedor:</td>
                                <td class=" ">' . $value["re_fechaenvio"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Proveedor:</td>
                                <td class=" ">' . $value["provee_nombre"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Reparado por:</td>
                                <td class=" ">' . $value["rep_nombre"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Asesor:</td>
                                <td class=" ">' . $value["ase_nombre"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Tecnico Desmonte:</td>
                                <td class=" ">' . $value["nombre1_repara"] . ' ' . $value["nombre2_repara"] . ' ' . $value["apellido1_repara"] . ' ' . $value["apellido2_repara"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Estado Fisico del Equipo:</td>
                                <td class=" ">' . $value["estequi_nombre"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Descripción De La Falla: :</td>
                                <td class=" ">' . $value["re_falla"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Diagnóstico:</td>
                                <td class=" ">' . $value["re_dianostico"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Observaciones:</td>
                                <td class=" ">' . $value["re_observacion"] . '</td>
                              </tr>
                              <tr class="even pointer">
                                <td class=" ">Evidencia:</td>
                                <td class=" "><a href="ReEquipo-Reader-' . $value["re_id"] . '" target="_blank"><i class="fa fa-eye"></i> VER EVIDENCIA</a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>';
                }
            }
        }
    }

    public function readerArchivoReEquipo()
    {
        if (isset($_GET["Reader"])) {
            $data  = $_GET["Reader"];
            $const = $this->model->ConsultDetalleReparacionEquipo($data);
            if ($const == "NULL") {
                header("location:Error500");
            } else {
                foreach ($const as $key => $value) {
                    header('content-type: application/pdf');
                    readfile($value["re_file"]);
                }
            }
        }
    }

    public function editarReparacionEquipo()
    {
        if (isset($_GET["Editar"])) {
            $data  = $_GET["Editar"];
            $const = $this->model->ConsultDetalleReparacionEquipo($data);
            if ($const == "") {
                header("location:Error500");
            } else {
                foreach ($const as $key => $value) {
                    echo '<div class="x_panel">
            <div class="x_title">
              <h2 class="titlereporteservicio">Equipo En Reparación ' . $value["dispo_nombre"] . ' - ' . $value["re_serial"] . '</h2>
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
                      <option value="' . $value["clien_id"] . '">' . $value["clien_nombre"] . '</option>';
                    $selectcliente = new NovedadController();
                    $selectcliente->selectClient();
                    echo '</select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Puesto: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" name="frmeditarRepaEquipo[]" value="' . $value['re_puesto'] . '" class="form-control" id="editpuestorequipo">
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status: <span class="required">*</span></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editselecionastatus">>
                      <option value="' . $value["stat_id"] . '">' . $value["stat_nombre"] . '</option>';
                    $selectstatu = new ReparacionEquipoController();
                    $selectstatu->selectStatus();
                    echo '</select>
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">Costo: <span class="required">*</span></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" class="form-control" name="frmeditarRepaEquipoAdd[]" value="' . $value["re_costo"] . '" required="required" id="editmodelorequipo">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Área Responsable: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editarearequipo">
                    <option value="' . $value["area_id"] . '">' . $value["area_nombre"] . '</option>';
                    $selectarea = new ReparacionEquipoController();
                    $selectarea->selectArea();
                    echo '</select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipos De Dispositivo: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editdisposotivorequipo">
                      <option value="' . $value["dispo_id"] . '">' . $value["dispo_nombre"] . '</option>';
                    $selectdispositivo = new ReparacionEquipoController();
                    $selectdispositivo->selectDispositivo();
                    echo '</select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca: <span class="required">*</span></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editmarcarequipo">>
                      <option value="' . $value["marc_id"] . '">' . $value["marc_nombre"] . '</option>';
                    $selectmarca = new ReparacionEquipoController();
                    $selectmarca->selectMarca();
                    echo '</select>
                  </div>
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">Modelo: <span class="required">*</span></label>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="text" class="form-control" name="frmeditarRepaEquipo[]" value="' . $value["re_modelo"] . '" required="required" id="editmodelorequipo">
                  </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial: <span class="required">*</span></label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" name="frmeditarRepaEquipo[]" value="' . $value["re_serial"] . '" required="required" id="editserialrequipo">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Tiene Garantía: <span class="required">*</span></label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="x_content">
                        <div class="radio">
                          <label>
                            Si <input type="radio" class="flat" name="frmeditarRepaEquipo[]" value="SI  "';if ($value["re_garantia"] === 'SI') {echo 'checked';}echo '>
                          </label>
                          <label>
                            No <input type="radio" class="flat"  name="frmeditarRepaEquipo[]" value="NO"';if ($value["re_garantia"] === 'NO') {echo 'checked';}echo '>
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
                        <input type="date" class="form-control" name="frmeditarRepaEquipo[]" required="required" value="' . $value["re_fecharetiro"] . '" id="editfecharetirorequipo">
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
                        <input type="date" class="form-control" name="frmeditarRepaEquipo[]" required="required" value="' . $value["re_fechaingreso"] . '" id="editfechaingresorequipo">
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
                        <input type="date" class="form-control" name="frmeditarRepaEquipo[]"  value="' . $value["re_fechanoticliente"] . '" >
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
                        <input type="date" class="form-control" name="frmeditarRepaEquipo[]" value="' . $value["re_fechaenvio"] . '">
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
                      <option value="' . $value["provee_id"] . '">' . $value["provee_nombre"] . '</option>';
                    $selectprovedor = new ReparacionEquipoController();
                    $selectprovedor->selectProveedor();
                    echo '</select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reparado por: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editreparadorequipo">
                      <option value="' . $value["rep_id"] . '">' . $value["rep_nombre"] . '</option>';
                    $selectreparado = new ReparacionEquipoController();
                    $selectreparado->selectRepatado();
                    echo '</select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Asesor: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editasesorrequipo">
                      <option value="' . $value["ase_id"] . '">' . $value["ase_nombre"] . '</option>';
                    $selectasesor = new ReparacionEquipoController();
                    $selectasesor->selectAsesor();

                    echo '  </select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tecnico Desmonte: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="edittecnicorequipo">
                      <option value="' . $value["usua_id"] . '">' . $value["nombre1_repara"] . ' ' . $value["nombre2_repara"] . ' ' . $value["apellido1_repara"] . ' ' . $value["apellido2_repara"] . '</option>';
                    $selectecnico = new ReparacionEquipoController();
                    $selectecnico->selectTecnico();
                    echo '</select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Fisico del Equipo: <span class="required">*</span></label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="frmeditarRepaEquipo[]" required="required" id="editestadorequipo">
                      <option value="' . $value["estequi_id"] . '">' . $value["estequi_nombre"] . '</option>';
                    $selectestado = new ReparacionEquipoController();
                    $selectestado->selectEstado();
                    echo ' </select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción De La Falla: <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <textarea required="required" name="frmeditarRepaEquipo[]" class="form-control" rows="2" placeholder="Escribe una Descripción De La Falla" id="editfallarequipo">' . $value["re_falla"] . '</textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Diagnóstico: <span class="required"></span>
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <textarea required="required" name="frmeditarRepaEquipo[]" class="form-control" rows="3" id="editdianosticorequipo">' . $value["re_dianostico"] . '</textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Observaciones: <span class="required"></span>
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <textarea required="required" name="frmeditarRepaEquipo[]" class="form-control" rows="3" id="editobservacionrequipo">' . $value["re_observacion"] . '</textarea>
                  </div>
                </div>
                <input type="hidden" name="frmeditarRepaEquipo[]" value="' . $value["re_id"] . '">

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

    public function editarRepaEquipo()
    {
        if (isset($_POST["frmeditarRepaEquipo"])) {
            $archivo = $_FILES['editfilerepaEquipo']['tmp_name'];
            $hoy     = date("dmYgis");
            if ($archivo != "") {
                $nom_archivo     = $_FILES['editfilerepaEquipo']['name']; //nombre de archivo como lo carga desde el escritorio
                $new_nom_archivo = ($hoy . $nom_archivo);
                $ext             = pathinfo($new_nom_archivo);
                $ruta            = "views/assets/images/equipo_reparacion/";
                $dirc_file       = ($ruta . $new_nom_archivo);
                $subir           = move_uploaded_file($archivo, $ruta . "/" . $new_nom_archivo);
                $datamin         = $_POST["frmeditarRepaEquipo"];
                $data            = array_map('strtoupper', $datamin);
                $add             = $_POST["frmeditarRepaEquipoAdd"];
                $result          = $this->model->editarRepaEquipos($data, $dirc_file, $new_nom_archivo, $add);
            } else {
                $html = '<h1 style="text-align: center;">&nbsp;</h1>
        <h1 style="text-align: center;">&nbsp;</h1>
        <h1 style="text-align: center;">&nbsp;</h1>
        <h1 style="text-align: center;">No hay evidencias adjuntas ...</h1>';
                $mpdf = new Mpdf('c', 'A4');
                $mpdf->WriteHTML($html);
                $mpdf->Output('views/assets/images/equipo_reparacion/' . $hoy . 'SinEvidencia.pdf', 'F');
                $dirc_file       = 'views/assets/images/equipo_reparacion/' . $hoy . 'SinEvidencia.pdf';
                $new_nom_archivo = $hoy . "SinEvidencia.pdf";
                $datamin         = $_POST["frmeditarRepaEquipo"];
                $data            = array_map('strtoupper', $datamin);
                $add             = $_POST["frmeditarRepaEquipoAdd"];
                $result          = $this->model->editarRepaEquipos($data, $dirc_file, $new_nom_archivo, $add);
            }
            print_r($result);
        } else {
            print_r("");
        }
    }

    public function exportarExcelRepaEquipo()
    {
        if (isset($_GET["data"])) {

            $data    = $_GET["data"];
            $data    = explode("-", $data);
            $dtstart = date("Y-m-d H:i:s", strtotime($data[0]));
            $dtend   = date("Y-m-d H:i:s", strtotime($data[1]));
            $const   = $this->model->exportarExcelRepaEquipos($dtstart, $dtend);
            //echo "<pre>"; var_dump($const);exit;
            set_time_limit(0);
            setlocale(LC_ALL, 'es_ES');
            ini_set('memory_limit', '-1');

            $objPHPExcel = new PHPExcel();
            // Agregar Encabezado
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'NOMBRE DEL CLIENTE')
                ->setCellValue('B1', 'PUESTO')
                ->setCellValue('C1', 'STATUS')
                ->setCellValue('D1', 'COSTO')
                ->setCellValue('E1', 'ÁREA RESPONSABLE')
                ->setCellValue('F1', 'TIPOS DE DISPOSITIVO')
                ->setCellValue('G1', 'MARCA')
                ->setCellValue('H1', 'MODELO')
                ->setCellValue('I1', 'SERIAL')
                ->setCellValue('J1', 'GARANTÍA')
                ->setCellValue('K1', 'FECHA RETIRO')
                ->setCellValue('L1', 'FECHA INGRESO')
                ->setCellValue('M1', 'FECHA NOFICACIÓN AL CLIENTE')
                ->setCellValue('N1', 'FECHA ENVIÓ PROVEEDOR')
                ->setCellValue('O1', 'PROVEEDOR')
                ->setCellValue('P1', 'REPARADO POR')
                ->setCellValue('Q1', 'TECNICO DESMONTE')
                ->setCellValue('R1', 'ESTADO FISICO DEL EQUIPO')
                ->setCellValue('S1', 'DESCRIPCIÓN DE LA FALLA')
                ->setCellValue('T1', 'DIAGNÓSTICO')
                ->setCellValue('U1', 'OBSERVACIÓNES')
                ->setCellValue('V1', 'FECHA REPORTE');
            // Agregar Información
            $i = 2;
            foreach ($const as $key => $value) {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $value['clien_nombre'])
                    ->setCellValue('B' . $i, $value['re_puesto'])
                    ->setCellValue('C' . $i, $value['stat_nombre'])
                    ->setCellValue('D' . $i, $value['re_costo'])
                    ->setCellValue('E' . $i, $value['area_nombre'])
                    ->setCellValue('F' . $i, $value['dispo_nombre'])
                    ->setCellValue('G' . $i, $value['marc_nombre'])
                    ->setCellValue('H' . $i, $value['re_modelo'])
                    ->setCellValue('I' . $i, $value['re_serial'])
                    ->setCellValue('J' . $i, $value['re_garantia'])
                    ->setCellValue('K' . $i, $value['re_fecharetiro'])
                    ->setCellValue('L' . $i, $value['re_fechaingreso'])
                    ->setCellValue('M' . $i, $value['re_fechanoticliente'])
                    ->setCellValue('N' . $i, $value['re_fechaenvio'])
                    ->setCellValue('O' . $i, $value['provee_nombre'])
                    ->setCellValue('P' . $i, $value['rep_nombre'])
                    ->setCellValue('Q' . $i, $value['ase_nombre'])
                    ->setCellValue('R' . $i, $value["nombre1_repara"] . ' ' . $value["nombre2_repara"] . ' ' . $value["apellido1_repara"] . ' ' . $value["apellido2_repara"])
                    ->setCellValue('S' . $i, $value['estequi_nombre'])
                    ->setCellValue('T' . $i, $value['re_falla'])
                    ->setCellValue('U' . $i, $value['re_dianostico'])
                    ->setCellValue('V' . $i, $value['re_fecha']);
                $i++;
            }
            //$nArray = count($const) + 1;
          //  $objPHPExcel->getActiveSheet()
          //      ->getStyle('D2:D' . $nArray)
            //    ->getNumberFormat()
          //      ->setFormatCode(
            //        '$#,##0.00;$(-#,##0.00)'
          //      );

            //Encabezado Negralla
          //  $objPHPExcel->getActiveSheet()->getStyle("A1:V1")->getFont()->setBold(true);
            //Filto
          //  $objPHPExcel->getActiveSheet()->setAutoFilter("A1:V1");
            // RenombrarHoja
            $objPHPExcel->getActiveSheet()->setTitle('Equipos En Reparación');
            // Establecerlahojaactiva, paraquecuandoseabraeldocumentosemuestreprimero .
            $objPHPExcel->setActiveSheetIndex(0);
            // SemodificanlosencabezadosdelHTTPparaindicarqueseenviaunarchivodeExcel .
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            ob_end_clean();
            header('Content-type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="EquiposEnReparación.xlsx"');
            $objWriter->save('php://output');
            exit;
        }
    }

    public function exportarExcelRepaEquipoPrestamo()
    {
        if (isset($_GET["dato"])) {

            $data    = $_GET["dato"];
            $data    = explode("-", $data);
            $dtstart = date("Y-m-d H:i:s", strtotime($data[0]));
            $dtend   = date("Y-m-d H:i:s", strtotime($data[1]));
            $const   = $this->model->exportarExcelRepaEquipoPrestamos($dtstart, $dtend);

            set_time_limit(0);
            setlocale(LC_ALL, 'es_ES');
            ini_set('memory_limit', '-1');

            $objPHPExcel = new PHPExcel();
            // Agregar Encabezado
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'NOMBRE DEL CLIENTE')
                ->setCellValue('B1', 'PUESTO')
                ->setCellValue('C1', 'STATUS')
                ->setCellValue('D1', 'COSTO')
                ->setCellValue('E1', 'DÍAS PRESTAMO')
                ->setCellValue('F1', 'ÁREA RESPONSABLE')
                ->setCellValue('G1', 'TIPOS DE DISPOSITIVO')
                ->setCellValue('H1', 'MARCA')
                ->setCellValue('I1', 'MODELO')
                ->setCellValue('J1', 'SERIAL')
                ->setCellValue('K1', 'GARANTÍA')
                ->setCellValue('L1', 'FECHA RETIRO')
                ->setCellValue('M1', 'FECHA INGRESO')
                ->setCellValue('N1', 'FECHA NOFICACIÓN AL CLIENTE')
                ->setCellValue('O1', 'FECHA ENVIÓ PROVEEDOR')
                ->setCellValue('P1', 'PROVEEDOR')
                ->setCellValue('Q1', 'REPARADO POR')
                ->setCellValue('R1', 'TECNICO DESMONTE')
                ->setCellValue('S1', 'ESTADO FISICO DEL EQUIPO')
                ->setCellValue('T1', 'DESCRIPCIÓN DE LA FALLA')
                ->setCellValue('U1', 'DIAGNÓSTICO')
                ->setCellValue('V1', 'OBSERVACIÓNES')
                ->setCellValue('W1', 'FECHA REPORTE');
            // Agregar Información
            $i = 2;
            foreach ($const as $key => $value) {
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $value['clien_nombre'])
                    ->setCellValue('B' . $i, $value['re_puesto'])
                    ->setCellValue('C' . $i, $value['stat_nombre'])
                    ->setCellValue('D' . $i, $value['re_costo'])
                    ->setCellValue('E' . $i, $value['re_dias'])
                    ->setCellValue('F' . $i, $value['area_nombre'])
                    ->setCellValue('G' . $i, $value['dispo_nombre'])
                    ->setCellValue('H' . $i, $value['marc_nombre'])
                    ->setCellValue('I' . $i, $value['re_modelo'])
                    ->setCellValue('J' . $i, $value['re_serial'])
                    ->setCellValue('K' . $i, $value['re_garantia'])
                    ->setCellValue('L' . $i, $value['re_fecharetiro'])
                    ->setCellValue('M' . $i, $value['re_fechaingreso'])
                    ->setCellValue('N' . $i, $value['re_fechanoticliente'])
                    ->setCellValue('O' . $i, $value['re_fechaenvio'])
                    ->setCellValue('P' . $i, $value['provee_nombre'])
                    ->setCellValue('Q' . $i, $value['rep_nombre'])
                    ->setCellValue('R' . $i, $value['ase_nombre'])
                    ->setCellValue('S' . $i, $value["nombre1_repara"] . ' ' . $value["nombre2_repara"] . ' ' . $value["apellido1_repara"] . ' ' . $value["apellido2_repara"])
                    ->setCellValue('T' . $i, $value['estequi_nombre'])
                    ->setCellValue('U' . $i, $value['re_falla'])
                    ->setCellValue('V' . $i, $value['re_dianostico'])
                    ->setCellValue('W' . $i, $value['re_fecha']);
                $i++;
            }
            //$nArray = count($const) + 1;
            //$objPHPExcel->getActiveSheet()
            //    ->getStyle('D2:D' . $nArray)
            //    ->getNumberFormat()
            //    ->setFormatCode(
            //        '$#,##0.00;$(-#,##0.00)'
          //    );

            //Encabezado Negralla
            //$objPHPExcel->getActiveSheet()->getStyle("A1:W1")->getFont()->setBold(true);
            //Filto
            //$objPHPExcel->getActiveSheet()->setAutoFilter("A1:W1");
            // RenombrarHoja
            $objPHPExcel->getActiveSheet()->setTitle('Equipos En Reparación');
            // Establecerlahojaactiva, paraquecuandoseabraeldocumentosemuestreprimero .
            $objPHPExcel->setActiveSheetIndex(0);
            // SemodificanlosencabezadosdelHTTPparaindicarqueseenviaunarchivodeExcel .
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            ob_end_clean();
            header('Content-type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="EquiposEnReparación.xlsx"');
            $objWriter->save('php://output');
            exit;
        }
    }

}

<?php
require_once 'model/instruccion.model.php';

class InstruccionController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new InstruccionModel();
    }

    // Funcion para
    public function wiewsReporInstru()
    {
        $title = "Reporte Instruccion";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_instruccion/reportinstruccion.php';
        require_once 'views/include/footer.php';
    }

    public function consultInstru()
    {
        $title = "Cosnulta Instruccion";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_instruccion/consultinstruccion.php';
        require_once 'views/include/footer.php';
    }

    public function wiewseditaInstru()
    {
        $title = "Editar Instruccion";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_instruccion/editarinstruccion.php';
        require_once 'views/include/footer.php';
    }

    public function createInstruccion()
    {
        if (isset($_POST["frminstruccion"])) {
            $hoy = date("dmYgis");
            $data = $_POST['frminstruccion'];
            $ruta = "views/assets/images/instruccion/";
            $archivo = $_FILES['fileinstruccion']['tmp_name'];
            $nom_archivo = $_FILES['fileinstruccion']['name']; //nombre de archivo como lo carga desde el escritorio
            $new_nom_archivo = ($hoy . $nom_archivo);
            $ext = pathinfo($new_nom_archivo);
            $dirc_file = ($ruta . $new_nom_archivo);
            if ($_POST['frminstruccion'][0] == 0) {
                $result = $this->model->creatNewInstruccionTodasSedes($data, $dirc_file, $new_nom_archivo);
            } else {
                $result = $this->model->creatNewInstruccion($data, $dirc_file, $new_nom_archivo);
            }
            if ($result == true) {
                $subir = move_uploaded_file($archivo, $ruta . "/" . $new_nom_archivo);
            }
            print_r($result);
        }
    }

    public function consultArchivoInstruccion()
    {
        if (isset($_POST["dato"])) {
            $data = $_POST["dato"];
            $const = $this->model->consultArchivoInstruccion($data);
            if ($const == "NULL") {
                echo '<h2 style="text-align: center">No hay instrucciones cargadas.... </h2>';
            } else {
                foreach ($const as $key => $value) {
                    echo '     <div class="col-md-55">
                          <div class="thumbnail">
                            <div class="image view view-first">
                              <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                              <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                <a href="Instruccion-Editar-' . $value["instru_id"] . '"><i class="fa fa-pencil"></i></a>
                                <a href="Instruccion-Reader-' . $value["instru_id"] . '" target="_blank"><i class="fa fa-eye"></i></a>
                                <a id="borrarArchivoInstru" data-idborrar="' . $value["instru_id"] . '"><i class="fa fa-times"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="caption">
                              <p><strong>' . $value["instru_titulo"] . '</strong>
                              </p>
                              <p>' . $value["instru_descripcion"] . '</p>
                            </div>
                          </div>
                        </div>';
                }
            }
        }
    }

    public function consultArchivoInstrucciones()
    {
        if (isset($_POST["dato"])) {
            $data = $_POST["dato"];
            $const = $this->model->consultArchivoInstruccion($data);
            if ($const == "NULL") {
                echo '<h2 style="text-align: center">No hay instrucciones cargadas.... </h2>';
            } else {
                foreach ($const as $key => $value) {
                    echo '     <div class="col-md-55">
                          <div class="thumbnail">
                            <div class="image view view-first">
                              <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                              <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                  <a href="Instruccion-Reader-' . $value["instru_id"] . '" target="_blank"><i class="fa fa-eye"></i></a>
                                  <a href="Instruccion-Download-' . $value["instru_id"] . '"><i class="fa fa-download"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="caption">
                              <p><strong>' . $value["instru_titulo"] . '</strong>
                              </p>
                              <p>' . $value["instru_descripcion"] . '</p>
                            </div>
                          </div>
                        </div>';
                }
            }
        }
    }

    public function editarInstruccion()
    {
        if (isset($_GET["Editar"])) {
            $data = $_GET["Editar"];
            $const = $this->model->editarInstruccion($data);
            if ($const == "NULL") {
                header("location:Error500");
            } else {
                foreach ($const as $key => $value) {
                    echo '   <input type="hidden" name="frmeditarinstruccion[]" value="' . $value["instru_id"] . '">
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Sede: <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-9 col-xs-12">
                           <select class="select2_single form-control" tabindex="-1" required="required"id="selecionasede" name="frmeditarinstruccion[]">
                             <option value="' . $value["sed_id"] . '">' . $value["sed_nombre"] . '</option>';

                    $selectsede = new NovedadController();
                    $selectsede->selctSedes();

                    echo '  </select>
                         </div>
                       </div>
                       <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Titulo: <span class="required">*</span></label>
                       <div class="col-md-6 col-sm-9 col-xs-12">
                         <input type="text" class="form-control" placeholder="Cambia el titulo del instruccion" required="required" id="frmeditarinstrucciontitle" name="frmeditarinstruccion[]" value="' . $value["instru_titulo"] . '">
                       </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Descripción: <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-9 col-xs-12">
                           <input type="text" class="form-control" placeholder="Cambia La descripción del instruccion" required="required" id="frmeditarinstrucciondesp" name="frmeditarinstruccion[]" value="' . $value["instru_descripcion"] . '">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Debes Cambiar El Archivo: <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-9 col-xs-12">
                           <input type="file" class="form-control" placeholder="Descripción Del instruccion" required="required" id="frmeditarinstruccionfile" name="fileinstruccion" accept="application/msword, application/pdf">
                         </div>
                       </div>
                       <div class="ln_solid"></div>
                       <div class="form-group">
                         <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                           <button type="submit" class="btn btn-success">Realizar cambios</button>
                         </div>
                       </div>
                       </form>';
                }
            }
        }
    }

    public function updateInstruccion()
    {
        if (isset($_POST["frmeditarinstruccion"])) {
            $hoy = date("dmYgis");
            $data = $_POST["frmeditarinstruccion"];
            $ruta = "views/assets/images/instruccion/";
            $archivo = $_FILES['fileinstruccion']['tmp_name'];
            $nom_archivo = $_FILES['fileinstruccion']['name'];
            $new_nom_archivo = ($hoy . $nom_archivo);
            $ext = pathinfo($new_nom_archivo);
            $dirc_file = ($ruta . $new_nom_archivo);
            $result = $this->model->updateInstruccion($data, $dirc_file, $new_nom_archivo);
            if ($result == true) {
                $subir = move_uploaded_file($archivo, $ruta . "/" . $new_nom_archivo);
            }
            print_r($result);
        }
    }

    public function readerArchivoInstru()
    {
        if (isset($_GET["Reader"])) {
            $data = $_GET["Reader"];
            $const = $this->model->consultArchivotodosInstru($data);
            if ($const == "NULL") {
                header("location:Error500");
            } else {
                foreach ($const as $key => $value) {
                    header('content-type: application/pdf');
                    readfile($value["instru_file"]);
                }
            }
        }
    }

    public function downloadedArchivoInstru()
    {
        if (isset($_GET["Downloadg"])) {
            $data = $_GET["Downloadg"];
            $const = $this->model->consultArchivotodosInstru($data);
            foreach ($const as $key => $value) {
                header('Content-Disposition: attachment; filename="' . $value["instru_nomarchivo"] . '"');
                readfile($value["instru_file"]);
            }
        } else {
            header("location:Error500");
        }
    }

    public function borrarArchivoInstru()
    {
        if (isset($_POST["Borrar"])) {
            $data = $_POST["Borrar"];
            $const = $this->model->borrarArchivoInstruccion($data);
            print_r($const);
        }
    }

    public function createInstruccionManual()
    {
        if (isset($_POST["frminstruccionmanual"])) {
            $data = $_POST["frminstruccionmanual"];
            if ($_POST["frminstruccionmanual"][0] == 0) {
                $const = $this->model->createInstruccionManualTodasSedes($data);
            } else {
                $const = $this->model->createInstruccionManual($data);
            }
            print_r($const);

        }
    }

    public function consultaInstruccion()
    {
        $const = $this->model->consultInstruccion();
        if ($const != "") {
            foreach ($const as $row => $item) {
                echo '<tr>
              <td>' . $item["instruman_fechas"] . '</td>
              <td>' . $item["sed_nombre"] . '</td>
              <td>' . $item["instruman_descripcion"] . '</td>
              <td>' . $item["usua_nombre1"] . ' ' . $item["usua_nombre2"] . ' ' . $item["usua_apellido1"] . ' ' . $item["usua_apellido2"] . '</td>
              </tr>';
            }
        }
    }


}

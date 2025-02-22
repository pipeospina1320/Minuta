<?php
require_once 'model/novedad.model.php';
require_once 'libs/mpdf-6.1.4/mpdf.php';
require_once 'libs/phpExcel/PHPExcel.php';

class NovedadController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new NovedadModel();
    }

    public function wiewsNovedad()
    {
        $title = "Reporte Minuta";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_novedad/reportenovedades.php';
        require_once 'views/include/footer.php';
    }

    public function wiewsConstnovedad()
    {
        $title = "Consulta Minuta";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_novedad/consultanovedades.php';
        require_once 'views/include/footer.php';
    }

    public function wiewsConstnovedadTotal()
    {
        $title = "Consulta Minuta";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_novedad/consultanovedadest.php';
        require_once 'views/include/footer.php';
    }

    //Funcion para crear Novedad
    public function createNovedad()
    {
        if (isset($_POST["frmnovedad"])) {
            if ($_FILES["filenovedad"]['error'][0] == 0) {
                $limite = count($_FILES["filenovedad"]['error']);
                $array_nom_archivos = [];
                $dirc_file = [];
                $file_almacenado = false;
                for ($i = 0; $i < $limite; $i++) {
                    if ($_FILES["filenovedad"]['error'][$i] == 0) {
                        if ($_FILES["filenovedad"]['type'][$i] == "image/png" || $_FILES["filenovedad"]['type'][$i] == "image/jpg" || $_FILES["filenovedad"]['type'][$i] == "image/jpeg") {
                            $hoy = date("dmYgis");
                            $nom_archivo = $_FILES['filenovedad']['name'][$i];
                            $new_nom_archivo = ($hoy . $nom_archivo);
                            $target_path = "views/assets/images/novedad/";
                            $dirc_file[] = ($target_path . $new_nom_archivo);
                            $target_path = $target_path . basename($hoy . $_FILES['filenovedad']['name'][$i]);
                            $array_nom_archivos[] = $new_nom_archivo;
                            if (move_uploaded_file($_FILES['filenovedad']['tmp_name'][$i], $target_path)) {
                                $file_almacenado = true;
                            } else {
                                print_r("");
                                $file_almacenado = false;
                            }
                        } else {
                            print_r("");
                        }
                    }
                }
                if ($file_almacenado) {
                    $data = $_POST["frmnovedad"];
                    $novedad = array_map('strtoupper', $data);
                    $strNombreArchivos = implode(",", $array_nom_archivos);
                    $dirc_firma1 = $this->uploadImgBase64($_POST['filenovedadFirma'][0], 1);
                    $dirc_firma2 = $this->uploadImgBase64($_POST['filenovedadFirma'][1], 2);
                    $strDirectorioArchivos = implode(",", $dirc_file);
                    $result = $this->model->createNovedades($novedad, $strDirectorioArchivos, $strNombreArchivos, $dirc_firma1, $dirc_firma2);
                    print_r($result);
                } else {
                    print_r("");
                }
            } else {
                $data = $_POST["frmnovedad"];
                // llamamos a la funcion uploadImgBase64( img_base64, nombre_fina.png)
                $dirc_firma1 = $this->uploadImgBase64($_POST['filenovedadFirma'][0], 1);
                $dirc_firma2 = $this->uploadImgBase64($_POST['filenovedadFirma'][1], 2);
                $novedad = array_map('strtoupper', $data);
                $result = $this->model->createNovedad($novedad, $dirc_firma1, $dirc_firma2);
                print_r($result);
            }
        }
    }

    //Funcion para Seleccionar Cliente
    public function selectClient()
    {
        $const = $this->model->selectClient();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["clien_id"] . '">' . $value["clien_nombre"] . '</option>';
        }
    }

    //Funcion para  seleccionar los Tipos de servicios
    public function selectServicio()
    {
        $const = $this->model->selectServicio();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["servi_id"] . '">' . $value["servi_nombre"] . '</option>';
        }
    }

    //Funcio para seleccionar la sede con el cliente
    public function selctSedes()
    {
        $const = $this->model->selectSedes();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["sed_id"] . '">' . $value["sed_nombre"] . '</option>';
        }
    }

    //Funcio para seleccionar la sede 2 con el cliente
    public function selctSedes2()
    {
        $const = $this->model->selectSedes2();
        foreach ($const as $key => $value) {
            echo '<option value="' . $value["sed_id"] . '">' . $value["sed_nombre"] . '</option>';
        }
    }

    //Funcion para seleccionar las sedes mediante Ajax
    public function selecTipoNovedad()
    {
        $data = $_POST["dato"];
        $resultSearch = $this->model->selecTipoNovedads($data);
        foreach ($resultSearch as $key => $value) {
            echo '<option value="' . $value["tn_id"] . '">' . $value["tn_nombre"] . '</option>';
        }
    }

    public function searchCliente()
    {
        $data = $_POST["dato"];
        $resultSearch = $this->model->readCliente($data);
        foreach ($resultSearch as $key => $value) {
            echo '<option value="' . $value["sed_id"] . '">' . $value["sed_nombre"] . '</option>';
        }
    }

    //Funcion para consultar tabla de novedades
    public function consultaNovedad()
    {
        $const = $this->model->consultNovedad();
        if ($const != "") {
            foreach ($const as $row => $item) {
                echo '<tr role="row">
            <td class="sorting_1">' . $item["nove_fechas"] . '</td>
            <td>' . $item["tn_nombre"] . '</td>
            <td>' . $item["nove_novedad"] . '</td>
            <td>' . $item["sed_nombre"] . '</td>
            <td>' . $item["servi_nombre"] . '</td>
            <td>' . $item["nove_turno"] . '</td>
            <td>' . $item["usua_nombre1"] . ' ' . $item["usua_nombre2"] . ' ' . $item["usua_apellido1"] . ' ' . $item["usua_apellido2"] . '</td>
            <td style="text-align:center;">';
                if ($item["nove_foto"] == 1) {
                    echo '<button type="button" id="FotoEvidencia" class="btn btn-info btn-sm" value=' . $item["nove_id"] . '>SI</button>';
                } else {
                    echo '<button type="button" class="btn btn-info btn-sm">NO</button>';
                }
                echo '</td>';
                if ($item["nove_estado"] == 1) {
                    echo '<td style="text-align:center;"><button type="button" id="observacionnovedades" class="btn btn-danger btn-sm" value=' . $item["nove_id"] . '><i class="fa fa-eye fa-lg"></i></button></td>';
                } elseif ($item["nove_estado"] == 0) {
                    echo '<td style="text-align:center;"><button type="button" class="btn btn-default btn-sm" ><i class="fa fa-eye-slash fa-lg"></i></button></td>';
                }
            }
            echo '</tr>';
        }
    }

    public function pdfFiltroNovedad()
    {

        $fechaInicio = "";
        $fechaFin = "";
        $tipoNovedad = "";
        $sede = "";
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION)) {
            $fechaInicio = $_SESSION['fechaInicio'];
            $fechaFin = $_SESSION['fechaFin'];
            $sede = $_SESSION['sede'];
            $tipoNovedad = $_SESSION['tipoNovedad'];
        }
        $const = $this->model->consultFiltroNovedad($fechaInicio, $fechaFin, $tipoNovedad, $sede);
        $html = '
            <div align="right" id="logo" style="margin: auto;width: 650px;height: 100px">
                <img align="right" src="views/assets/images/logo_image.png" alt="logo" width="225px" height="80px">
            </div>
          <table border=1 style="border-collapse: collapse;height:auto;">
            <thead>
                    <tr>
                        <th style="width:40px">Dia</th>
                        <th style="width:40px">Mes</th>
                        <th style="width:60px">Año</th>
                        <th style="width:100px">Hora</th>
                        <th style="width:100px">Puesto</th>
                        <th style="width:150px">Asunto</th>
                        <th style="width:300px">Anotaciones</th>       
                    </tr>
            </thead>
            <tbody>';
        foreach ($const as $row => $minuta) {
            $id_acta = $minuta['Acta'];
            $nombreUsuario = $minuta['usua_nombre1'] . " " . $minuta['usua_nombre2'] . " " . $minuta['usua_apellido1'] . " " . $minuta['usua_apellido2'];
            $tNovedad = $minuta['tn_nombre'];
            $desNovedad = $minuta['nove_novedad'];
            $fechaNovedad = $minuta['nove_fechas'];
            $puesto = $minuta['sed_nombre'];
            $fechaNovedad = preg_split("/[\s.-]+/", $fechaNovedad);
            $html .= '
            <tr role="row">
                <td style="width:40px">' . $fechaNovedad[2] . '</td>
                <td style="width:40px">' . $fechaNovedad[1] . '</td>
                <td style="width:60px">' . $fechaNovedad[0] . '</td>
                <td style="width:100px">' . $fechaNovedad[3] . '</td>
                <td style="width:100px">' . $puesto . '</td>
                <td style="width:150px">' . $tNovedad . '</td>
                <td style="width:300px">' . $desNovedad . '<br><br><b>' . $nombreUsuario . '</b></td>
            </tr>
        ';
        }
        $html .= '
        </tbody>
    </table>';

        $mpdf = new Mpdf('c', 'A4', 12, '', 15, 10, 5, 10, 40);
        $css = file_get_contents('views/assets/datatables.net-bs/css/dataTables.bootstrap.min.css');
        $mpdf->writeHTML($css, 1);
        $mpdf->WriteHTML($html);

        $mpdf->Output('ResumenNovedades.pdf', 'D');
        return true;

    }

    //Funcion para consultar tabla de novedades
    public function consultaFiltroNovedad()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $rol = $_SESSION["cargo"];
        $fechaInicio = "";
        $fechaFin = "";
        $tipoNovedad = "";
        $sede = "";
        if (isset($_POST['frmFiltroNovedad'])) {

            if (!isset($_SESSION)) {
                session_start();
            }
//            if (!isset($_SESSION['fechaDesde'])) {
            $fechaInicio = $_POST['frmFiltroNovedad'][0] != "" ? $_POST['frmFiltroNovedad'][0] . " 00:00:00" : "";
            $_SESSION['fechaInicio'] = $fechaInicio;
//            }

//            if (!isset($_SESSION['fechaHasta'])) {
            $fechaFin = $_POST['frmFiltroNovedad'][2] != "" ? $_POST['frmFiltroNovedad'][2] . " 23:59:00" : "";
            $_SESSION['fechaFin'] = $fechaFin;
//            }

//            if (!isset($_SESSION['sede'])) {
            $sede = $_POST['frmFiltroNovedad'][3];
            $_SESSION['sede'] = $sede;
//            }

//            if (!isset($_SESSION['tipoNovedad'])) {
            $tipoNovedad = $_POST['frmFiltroNovedad'][1];
            $_SESSION['tipoNovedad'] = $tipoNovedad;
//            }

        }
        $const = $this->model->consultFiltroNovedad($fechaInicio, $fechaFin, $tipoNovedad, $sede);
        if ($const != "") {
            foreach ($const as $row => $item) {
                echo '<tr role="row">
            <td class="sorting_1">' . $item["nove_fechas"] . '</td>
            <td>' . $item["tn_nombre"] . '</td>
            <td>' . $item["nove_novedad"] . '</td>
            <td>' . $item["sed_nombre"] . '</td>
            <td>' . $item["servi_nombre"] . '</td>
            <td>' . $item["nove_turno"] . '</td>
            <td>' . $item["usua_nombre1"] . ' ' . $item["usua_nombre2"] . ' ' . $item["usua_apellido1"] . ' ' . $item["usua_apellido2"] . '</td>
            <td>' . $item["nove_fechasreal"] . '</td>
            <td style="text-align:center;">';
                if ($item["nove_foto"] == 1) {
                    echo '<button type="button" id="FotoEvidencia" class="btn btn-info btn-sm" value=' . $item["nove_id"] . '>SI</button>';
                } else {
                    echo '<button type="button" class="btn btn-info btn-sm">NO</button>';
                }
                echo '</td>';

                if ($rol == 2 || $rol == 3 || $rol == 4 || $rol == 9) {
                    if ($item["nove_estado"] == 0) {
                        echo '<td style="text-align:center;"><button type="button" id="observacionnovedad" class="btn btn-warning btn-sm" value=' . $item["nove_id"] . '><i class="fa fa-edit fa-lg"></i></button></td>';
                    } else if ($item["nove_estado"] == 1) {
                        echo '<td style="text-align:center;"><button type="button" class="btn btn-danger btn-sm" id="verobservacion" value=' . $item["nove_id"] . '><i class="fa fa-eye fa-lg"></i></button></td>';
                    }
                    echo '<td>
                        <a target="_blank" href="Novedad-Acta-' . $item["nove_id"] . '" class="btn btn-warning btn-xs"><i class="fa fa-file"></i> Generar Acta </a>
                       </td>';
                } else {
                    if ($item["nove_estado"] == 1) {
                        echo '<td style="text-align:center;"><button type="button" id="verobservacion" class="btn btn-danger btn-sm" value=' . $item["nove_id"] . '><i class="fa fa-eye fa-lg"></i></button></td>';
                    } elseif ($item["nove_estado"] == 0) {
                        echo '<td style="text-align:center;"><button type="button" class="btn btn-default btn-sm" ><i class="fa fa-eye-slash fa-lg"></i></button></td>';
                    }
                }
//                echo '<td>
//                        <a target="_blank" href="Novedad-Acta-' . $item["nove_id"] . '" class="btn btn-warning btn-xs"><i class="fa fa-file"></i> Generar Acta </a>
//                       </td>';
            }
            echo '</tr>';
        }
    }

    //Funcion para consultar tabla de novedades
    public function consultaNovedadTotal()
    {
        $const = $this->model->consultNovedadTotal();
        if ($const != "") {
            foreach ($const as $row => $item) {
                echo '<tr role="row">
            <td class="sorting_1">' . $item["nove_fechas"] . '</td>
            <td>' . $item["tn_nombre"] . '</td>
            <td>' . $item["nove_novedad"] . '</td>
            <td>' . $item["sed_nombre"] . '</td>
            <td>' . $item["servi_nombre"] . '</td>
            <td>' . $item["nove_turno"] . '</td>
            <td>' . $item["usua_nombre1"] . ' ' . $item["usua_nombre2"] . ' ' . $item["usua_apellido1"] . ' ' . $item["usua_apellido2"] . '</td>
            <td>' . $item["nove_fechasreal"] . '</td>
            <td style="text-align:center;">';
                if ($item["nove_foto"] == 1) {
                    echo '<button type="button" id="FotoEvidencia" class="btn btn-info btn-sm" value=' . $item["nove_id"] . '>SI</button>';
                } else {
                    echo '<button type="button" class="btn btn-info btn-sm">NO</button>';
                }
                echo '</td>';
                if ($item["nove_estado"] == 0) {
                    echo '<td style="text-align:center;"><button type="button" id="observacionnovedad" class="btn btn-warning btn-sm" value=' . $item["nove_id"] . '><i class="fa fa-edit fa-lg"></i></button></td>';
                } else if ($item["nove_estado"] == 1) {
                    echo '<td style="text-align:center;"><button type="button" class="btn btn-danger btn-sm" id="verobservacion" value=' . $item["nove_id"] . '><i class="fa fa-eye fa-lg"></i></button></td>';
                }
            }

            echo ' </tr>';

        }
    }

    // }

    public function buscarFotoEvidencia()
    {
        if (isset($_POST["dato"])) {
            $data = $_POST["dato"];
            $result = $this->model->buscarFotoEvidencias($data);
            if ($result != "") {
                foreach ($result as $key => $value) {
                    print_r("<img id='fotoevidencia' src='{$value}' style='width:360px; height:480px;'><br>");
                }
            } else {
                print_r("");
            }
        }
    }

    public function searchNovedad()
    {
        if (isset($_POST["dato"])) {
            $data = $_POST["dato"];
            $result = $this->model->searchNovedades($data);
            if ($result != "") {
                foreach ($result as $key => $value) {
                    $novedad = $value[1];
                    $reporta = $value[2] . " " . $value[3] . " " . $value[4] . " " . $value[5];
                    $idnovedad = $value[0];
                    print_r($novedad . "|" . $reporta . "|" . $idnovedad);
                }
            } else {
                print_r("");
            }
        }
    }

    public function createObservacion()
    {
        if (isset($_POST["frmObservacion"])) {
            $data = $_POST["frmObservacion"];
            $novedad = array_map('strtoupper', $data);
            $result = $this->model->createObservaciones($novedad);
            print_r($result);
        }
    }

    public function searchObservacion()
    {
        if (isset($_POST["dato"])) {
            $data = $_POST["dato"];
            $result = $this->model->searchObservacions($data);
            if ($result != "") {
                foreach ($result as $key => $value) {
                    $observacion = $value[0];
                    $reporta = $value[1] . " " . $value[2] . " " . $value[3] . " " . $value[4];
                    print_r($observacion . "|" . $reporta);
                }
            } else {
                print_r("");
            }
        }
    }

    private function uploadImgBase64($base64, $img)
    {
        $datosBase64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));

        $path = "views/assets/images/novedad/" . date("dmYgis") . 'firma' . $img . '.png';
        if (!file_put_contents($path, $datosBase64)) {
            return false;
        } else {
            return $path;
        }
    }

    public function actaMinuta()
    {
        set_time_limit(0);
        setlocale(LC_ALL, 'es_ES');
        ini_set('memory_limit', '-1');
        $id_acta = $_REQUEST['Acta'];
        $novedad = $this->model->consultaNovedad($id_acta);
        $nombreUsuario = $novedad[0]['usua_nombre1'] . " " . $novedad[0]['usua_nombre2'] . " " . $novedad[0]['usua_apellido1'] . " " . $novedad[0]['usua_apellido2'];
        $cliente = $novedad[0]['clien_nombre'];
        $rutaFirma = $novedad[0]['firma1_file'];
        $rutaFirma2 = $novedad[0]['firma2_file'];
        $strRutaArchivos = $novedad[0]['nove_file'];
        $arrRutaArchivos = explode(",", $strRutaArchivos);

        $cargo = $novedad[0]['carg_nombre'];
        $sede = $novedad[0]['sed_nombre'];
        $servicio = $novedad[0]['servi_nombre'];
        $desNovedad = $novedad[0]['nove_novedad'];
        $fechaActual = new DateTime('now');
        $dia = $fechaActual->format('d');
        $mes = $this->convertirMesLetras($fechaActual->format('m'));
        $anio = $fechaActual->format('Y');

        $fechaNovedad = $novedad[0]['nove_fecha'];
        $fechaNovedad = preg_split("/[\s.-]+/", $fechaNovedad);

        $html = '
        <div id="contenedor">
            <div align="right" id="logo" style="margin: auto;width: 650px;height: 100px">
            <img align="right" src="views/assets/images/logo_image.png" alt="logo" width="225px" height="80px">
            </div>

            <div id="fecha" style="width: 650px;height: 100px">
            <p>Medellin, ' . $dia . ' de ' . $mes . ' del ' . $anio . '</p>
            </div>

            <div id="destinatario" style="width: 650px;height: 100px">
            <p>Señores<br>
            <b>' . $cliente . '</b><br>
            ' . $sede . '</p>
            </div>

            <div id="asunto" style="width: 650px;height: 100px">
           <p align="center"><b>ACTA EVENTO MINUTA</b><br>
            <b>' . $fechaNovedad[2] . ' ' . $this->convertirMesLetras($fechaNovedad[1]) . ' ' . $fechaNovedad[0] . ' ' . $fechaNovedad[3] . '</b>
            </div>

            <div id="cuerpo" style="width: 600px;height: 400px">
            <p>' . $servicio . '</p>
            <p></p>
            <p align="justify">' . ucfirst(strtolower($desNovedad)) . '</p>
            </div>

            ';


        $html .= '

            <div id="firma" style="width: 650px;height: 100px">';

        if (!$rutaFirma && !$rutaFirma2) {
            $html .= '
            <br>
            <table>
                <tr role="row">
                    <td style="width: 380px;"><b>__________________________________________</b></td>
                    <td style="width: 320px;"><b>____________________________________</b></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;"><b>' . $nombreUsuario . '</b></td>
                    <td style="width: 320px;"><b>RESPONSABLE</b></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;">' . $cargo . '</td>
                    <td style="width: 320px;"></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;">COVITEC LTDA</td>
                    <td style="width: 320px;"></td>
                </tr>
            </table>';

        } elseif ($rutaFirma && !$rutaFirma2) {
            $html .= '
            <table>
            <tr role="row">
                    <td style="width: 380px;"><img src="' . $rutaFirma . '" alt="sin firma" width="250px" height="80px"></td>
                    <td style="width: 320px;"></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;"><b>__________________________________________</b></td>
                    <td style="width: 320px;"><b>____________________________________</b></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;"><b>' . $nombreUsuario . '</b></td>
                    <td style="width: 320px;"><b>RESPONSABLE</b></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;">' . $cargo . '</td>
                    <td style="width: 320px;"></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;">COVITEC LTDA</td>
                    <td style="width: 320px;"></td>
                </tr>
            </table>
            ';

        } elseif (!$rutaFirma && $rutaFirma2) {
            $html .= '
            <table>
            <tr role="row">
                    <td style="width: 380px;"></td>
                    <td style="width: 320px;"><img src="' . $rutaFirma2 . '" alt="sin firma" width="250px" height="80px"></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;"><b>__________________________________________</b></td>
                    <td style="width: 320px;"><b>____________________________________</b></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;"><b>' . $nombreUsuario . '</b></td>
                    <td style="width: 320px;"><b>RESPONSABLE</b></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;">' . $cargo . '</td>
                    <td style="width: 320px;"></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;">COVITEC LTDA</td>
                    <td style="width: 320px;"></td>
                </tr>
            </table>';
        } else {
            $html .= '
            <table>
            <tr role="row">
                    <td style="width: 380px;"><img src="' . $rutaFirma . '" alt="sin firma" width="250px" height="80px"></td>
                    <td style="width: 320px;"><img src="' . $rutaFirma2 . '" alt="sin firma" width="250px" height="80px"></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;"><b>__________________________________________</b></td>
                    <td style="width: 320px;"><b>____________________________________</b></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;"><b>' . $nombreUsuario . '</b></td>
                    <td style="width: 320px;"><b>RESPONSABLE</b></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;">' . $cargo . '</td>
                    <td style="width: 320px;"></td>
                </tr>
                <tr role="row">
                    <td style="width: 380px;">COVITEC LTDA</td>
                    <td style="width: 320px;"></td>
                </tr>
            </table>';
        }
        $html .= '</div>
            <div id="evidencia" style="width: 650px;height: 100px">';
        foreach ($arrRutaArchivos as $rutaArchivo) {
            if (!$rutaArchivo) {
                $html .= '';
            } else {
                $html .= '<img src="' . $rutaArchivo . '" alt="logo" width="600px" height="400px"><br><br>';
            }
        };

        $html .= '</div>
        </div>
        ';
        $mpdf = new Mpdf('c', 'A4', 12, '', 15, 10, 5, 10, 40);
        $mpdf->WriteHTML($html);
//        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->Output('actaMinuta.pdf', 'D');

        exit;


    }

    public function excelFiltroNovedad()
    {

        set_time_limit(0);
        setlocale(LC_ALL, 'es_ES');
        ini_set('memory_limit', '-1');

        $objPHPExcel = new PHPExcel();

        // Establecer propiedades
//        $objPHPExcel->getProperties()
//            ->setCreator("Cattivo")
//            ->setLastModifiedBy("Cattivo")
//            ->setTitle("Documento Excel de Prueba")
//            ->setSubject("Documento Excel de Prueba")
//            ->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")
//            ->setKeywords("Excel Office 2007 openxml php")
//            ->setCategory("Pruebas de Excel");

        $fechaInicio = "";
        $fechaFin = "";
        $tipoNovedad = "";
        $sede = "";
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION)) {
            $fechaInicio = $_SESSION['fechaInicio'];
            $fechaFin = $_SESSION['fechaFin'];
            $sede = $_SESSION['sede'];
            $tipoNovedad = $_SESSION['tipoNovedad'];
        }
        $novedades = $this->model->consultFiltroNovedad($fechaInicio, $fechaFin, $tipoNovedad, $sede);

        // Agregar Informacion
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'Fecha Novedad')
            ->setCellValue('C1', 'Tipo de novedad')
            ->setCellValue('D1', 'Novedad')
            ->setCellValue('E1', 'Nombre sede')
            ->setCellValue('F1', 'Servicio')
            ->setCellValue('G1', 'Turno')
            ->setCellValue('H1', 'Reporte novedad');


        $i = 2;
        foreach ($novedades as $row => $minuta) {
            // Agregar Informacion
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $minuta['nove_id'])
                ->setCellValue('B' . $i, $minuta["nove_fechas"])
                ->setCellValue('C' . $i, $minuta["tn_nombre"])
                ->setCellValue('D' . $i, $minuta["nove_novedad"])
                ->setCellValue('E' . $i, $minuta["sed_nombre"])
                ->setCellValue('F' . $i, $minuta["servi_nombre"])
                ->setCellValue('G' . $i, $minuta["nove_turno"])
                ->setCellValue('H' . $i, $minuta["usua_nombre1"] . ' ' . $minuta["usua_nombre2"] . ' ' . $minuta["usua_apellido1"] . ' ' . $minuta["usua_apellido2"]);

            $i++;
        }

//        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Resumen');
//      Establecer la hoja activa, para que cuando se abra el documento se muestre primero .
        $objPHPExcel->setActiveSheetIndex(0);

// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="resumen.xlsx"');
        $objWriter->save('php://output');
        exit;
    }


    private function convertirMesLetras($mes)
    {
        $mesLetras = "";
        switch ($mes) {

            case "01":
                $mesLetras = "Enero";
                break;

            case "02":
                $mesLetras = "Febrero";
                break;

            case "03":
                $mesLetras = "Marzo";
                break;

            case "04":
                $mesLetras = "Abril";
                break;

            case "05":
                $mesLetras = "Mayo";
                break;

            case "06":
                $mesLetras = "Junio";
                break;

            case "07":
                $mesLetras = "Julio";
                break;

            case "08":
                $mesLetras = "Agosto";
                break;

            case "09":
                $mesLetras = "Septiembre";
                break;

            case "10":
                $mesLetras = "Octubre";
                break;

            case "11":
                $mesLetras = "Noviembre";
                break;

            case "12":
                $mesLetras = "Diciembre";
                break;

        }
        return $mesLetras;
    }

}

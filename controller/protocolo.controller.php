<?php
require_once 'model/protocolo.model.php';

class ProtocoloController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new ProtocoloModel();
  }
  // Funcion para
  public function wiewsReporProto(){
    $title = "Reporte Protocolos";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_protocolo/reportprotocolo.php';
    require_once 'views/include/footer.php';
  }

  public function consultProto(){
    $title = "Cosnulta Protocolos";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_protocolo/consultprotocolo.php';
    require_once 'views/include/footer.php';
  }

  public function wiewseditaProto(){
    $title = "Editar Protocolo";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_protocolo/editarprotocolo.php';
    require_once 'views/include/footer.php';
  }

  public function createProtocolo(){
    if (isset($_POST["frmprotocolo"]) ) {
      $hoy = date("dmYgis");
      $data = $_POST['frmprotocolo'];
      $ruta = "views/assets/images/protocolo/";
      $archivo = $_FILES['fileprotocolo']['tmp_name'];
      $nom_archivo = $_FILES['fileprotocolo']['name']; //nombre de archivo como lo carga desde el escritorio
      $new_nom_archivo = ($hoy.$nom_archivo);
      $ext = pathinfo($new_nom_archivo);
      $dirc_file = ($ruta.$new_nom_archivo);
      $result = $this->model->creatNewProtocolo($data, $dirc_file, $new_nom_archivo);
      if ($result == true) {
        $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
      }
      print_r($result);
    }
  }

  public function consultArchivoProtocolo(){
    if (isset( $_POST["dato"])) {
      $data = $_POST["dato"];
      $const = $this->model->consultArchivoProtocolo($data);
      if ($const == "NULL") {
        echo '<h2 style="text-align: center">No hay protocolos cargadas.... </h2>';
      }else {
          foreach ($const as $key => $value) {
            echo '     <div class="col-md-55">
                          <div class="thumbnail">
                            <div class="image view view-first">
                              <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                              <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                <a href="Protocolo-Editar-'.$value["proto_id"].'"><i class="fa fa-pencil"></i></a>
                                <a href="Protocolo-Reader-'.$value["proto_id"].'"><i class="fa fa-eye"></i></a>
                                <a id="borrarArchivoProto" data-idborrar="'.$value["proto_id"].'"><i class="fa fa-times"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="caption">
                              <p><strong>PROTOCOLO '.$value["proto_titulo"].'</strong>
                              </p>
                              <p>'.$value["proto_descripcion"].'</p>
                            </div>
                          </div>
                        </div>';
        }
      }
    }
  }

  public function consultArchivoProtocolos(){
    if (isset( $_POST["dato"])) {
      $data = $_POST["dato"];
      $const = $this->model->consultArchivoProtocolo($data);
      if ($const == "NULL") {
        echo '<h2 style="text-align: center">No hay protocolos cargadas.... </h2>';
      }else {
          foreach ($const as $key => $value) {
            echo '     <div class="col-md-55">
                          <div class="thumbnail">
                            <div class="image view view-first">
                              <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                              <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                <a href="Protocolo-Reader-'.$value["proto_id"].'"><i class="fa fa-eye"></i></a>
                                <a href="Protocolo-Download-'.$value["proto_id"].'"><i class="fa fa-download"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="caption">
                              <p><strong>PROTOCOLO '.$value["proto_titulo"].'</strong>
                              </p>
                              <p>'.$value["proto_descripcion"].'</p>
                            </div>
                          </div>
                        </div>';
        }
      }
    }
  }

 public function editarProtocolo(){
   if (isset($_GET["Editar"])) {
     $data = $_GET["Editar"];
       $const = $this->model->editarProtocolo($data);
       if ($const == "NULL") {
         header("location:Error500");
       }else {
           foreach ($const as $key => $value) {
           echo '   <input type="hidden" name="frmeditarprotocolo[]" value="'.$value["proto_id"].'">
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Sede: <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-9 col-xs-12">
                           <select class="select2_single form-control" tabindex="-1" required="required" id="selecionacateprotoedit" name="frmeditarprotocolo[]">
                             <option value="'.$value["proto_titulo"].'">Protocolo '.$value["proto_titulo"].'</option>
                             <option value="A">Protocolo A</option>
                             <option value="B">Protocolo B</option>
                             <option value="C">Protocolo C</option>
                             <option value="D">Protocolo D</option>
                             <option value="E">Protocolo E</option>
                             <option value="F">Protocolo F</option>
                             <option value="G">Protocolo G</option>
                             <option value="H">Protocolo H</option>
                             <option value="I">Protocolo I</option>
                             <option value="J">Protocolo J</option>
                             <option value="K">Protocolo K</option>
                             <option value="L">Protocolo L</option>
                             <option value="M">Protocolo M</option>
                             <option value="N">Protocolo N</option>
                             <option value="Ñ">Protocolo Ñ</option>
                             <option value="O">Protocolo O</option>
                             <option value="P">Protocolo P</option>
                             <option value="Q">Protocolo Q</option>
                             <option value="R">Protocolo R</option>
                             <option value="S">Protocolo S</option>
                             <option value="T">Protocolo T</option>
                             <option value="U">Protocolo U</option>
                             <option value="V">Protocolo V</option>
                             <option value="W">Protocolo W</option>
                             <option value="X">Protocolo X</option>
                             <option value="A-Z">Protocolo A-Z</option>
                          </select>
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Descripción: <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-9 col-xs-12">
                           <input type="text" class="form-control" placeholder="Cambia La descripción del protocolo" required="required" id="frmprotocolodescripedit" name="frmeditarprotocolo[]" value="'.$value["proto_descripcion"].'">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Debes Cambiar El Archivo: <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-9 col-xs-12">
                           <input type="file" class="form-control" placeholder="Descripción Del protocolo" required="required" id="frmprotocolofileedit" name="fileprotocolo" accept="application/msword, application/pdf">
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

 public function updateProtocolo(){
     if (isset($_POST["frmeditarprotocolo"])) {
       $hoy = date("dmYgis");
       $data = $_POST["frmeditarprotocolo"];
       $ruta = "views/assets/images/protocolo/";
       $archivo = $_FILES['fileprotocolo']['tmp_name'];
       $nom_archivo = $_FILES['fileprotocolo']['name'];
       $new_nom_archivo = ($hoy.$nom_archivo);
       $ext = pathinfo($new_nom_archivo);
       $dirc_file = ($ruta.$new_nom_archivo);
       $result = $this->model->updateProtocolo($data, $dirc_file, $new_nom_archivo);
       if ($result == true) {
         $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
       }
       print_r($result);
   }
  }

  public function readerArchivoProto(){
    if (isset($_GET["Reader"])) {
      $data = $_GET["Reader"];
      $const = $this->model->consultArchivotodosproto($data);
      if ($const == "NULL") {
        header("location:Error500");
      }else {
        foreach ($const as $key => $value) {
          header('content-type: application/pdf');
          readfile($value["proto_file"]);
        }
      }
    }
  }

public function downloadedArchivoProto(){
  if (isset($_GET["Downloadg"])) {
    $data = $_GET["Downloadg"];
    $const = $this->model->consultArchivotodosproto($data);
      foreach ($const as $key => $value) {
        header('Content-Disposition: attachment; filename="'.$value["proto_nomarchivo"].'"');
        readfile($value["proto_file"]);
    }
  }else {
      header("location:Error500");
  }
}

public function borrarArchivoProto(){
  if (isset($_POST["borrar"])) {
    $data = $_POST["borrar"];
    $const = $this->model->borrarArchivoParti($data);
    print_r($const);
    }
  }




}

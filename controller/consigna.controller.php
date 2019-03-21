<?php
require_once 'model/consigna.model.php';

class ConsignaController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new ConsignaModel();
  }

  //Funcion para llamar la vista Consigna
  public function resporteConsig(){
    $title = "Reporte Consignas";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_consigna/reporteconsigna.php';
    require_once 'views/include/footer.php';
  }

  //Funcion para llamar la vista editar consigna general
  public function wiewseditarConsg(){
    $title = "Editar consigna";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_consigna/editarconsig.php';
    require_once 'views/include/footer.php';
  }

  //Funcion para llamar la vista editar consigna particular
  public function wiewseditarConsgPart(){
    $title = "Editar consigna partircular";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_consigna/editarconsigp.php';
    require_once 'views/include/footer.php';
  }

  public function consulConsig()  {
    $title = "Consulta consigna";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_consigna/consultarconsigna.php';
    require_once 'views/include/footer.php';
  }

  //funcion para subir archivos PDF y crear una consigna general
  public function createConsigGene(){
    if (isset($_POST["frmconsigene"]) ) {
      $hoy = date("dmYgis");
      $data = $_POST['frmconsigene'];
      $ruta = "views/assets/images/consignas_general/";
      $archivo = $_FILES['fileconsigna']['tmp_name'];
      $nom_archivo = $_FILES['fileconsigna']['name']; //nombre de archivo como lo carga desde el escritorio
      $new_nom_archivo = ($hoy.$nom_archivo);
      $ext = pathinfo($new_nom_archivo);
      $dirc_file = ($ruta.$new_nom_archivo);
      $result = $this->model->creatNewConsigGeneral($data, $dirc_file, $new_nom_archivo);
      if ($result == true) {
        $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
      }
      print_r($result);
    }
  }

  // funcion para ver todos los archicos creados
  public function consultArchivos(){
    $const = $this->model->consultArchivo();
    if ($const == "NULL") {
      echo '<h2 style="text-align: center">No hay consignas generales cargadas.... </h2>';
    }else {
      foreach ($const as $key => $value) {
        echo '      <div class="col-md-55">
                      <div class="thumbnail">
                        <div class="image view view-first">
                          <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                          <div class="mask no-caption">
                            <div class="tools tools-bottom">
                              <a href="Consigna-Editar-'.$value["consig_id"].'"><i class="fa fa-pencil"></i></a>
                              <a href="Consigna-Reader-'.$value["consig_id"].'" target="_blank"><i class="fa fa-eye"></i></a>
                              <a id="borrarArchivo" data-idborrar="'.$value["consig_id"].'"><i class="fa fa-times"></i></a>
                            </div>
                          </div>
                        </div>
                          <div class="caption">
                            <p><strong>'.$value["consig_titulo"].'</strong>
                            </p>
                            <p>'.$value["consig_descripcion"].'</p>
                          </div>
                      </div>
                    </div>';
      }
    }
  }

  public function consultArchivosModConsulta(){
    $const = $this->model->consultArchivo();
    if ($const == "NULL") {
      echo '<h2 style="text-align: center">No hay consignas generales cargadas.... </h2>';
    }else {
      foreach ($const as $key => $value) {
        echo '      <div class="col-md-55">
                      <div class="thumbnail">
                        <div class="image view view-first">
                          <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                          <div class="mask no-caption">
                            <div class="tools tools-bottom">
                              <a href="Consigna-Reader-'.$value["consig_id"].'" target="_blank"><i class="fa fa-eye"></i></a>
                              <a href="Consigna-Download-'.$value["consig_id"].'"><i class="fa fa-download"></i></a>
                            </div>
                          </div>
                        </div>
                          <div class="caption">
                            <p><strong>'.$value["consig_titulo"].'</strong>
                            </p>
                            <p>'.$value["consig_descripcion"].'</p>
                          </div>
                      </div>
                    </div>';
      }
    }
  }

  public function editarConsg() {
    if (isset($_GET["consig_id"])) {
      $data = $_GET["consig_id"];
      $const = $this->model->editarConsg($data);
      if ($const == "NULL") {
        header("location:Error500");
      }else {
        foreach ($const as $key => $value) {
        echo '   <input type="hidden" name="frmeditarconsigene[]" value="'.$value["consig_id"].'">
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Titulo: <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="Cambia el titulo de la consigna" required="required" id="frmeditarconsigenetitle" name="frmeditarconsigene[]" value="'.$value["consig_titulo"].'">
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Descripción: <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Cambia La descripción de la consigna" required="required" id="frmeditarconsigenedesp" name="frmeditarconsigene[]" value="'.$value["consig_descripcion"].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Archivo: <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                        <input type="file" class="form-control" placeholder="Descripción De la Consigna" required="required" name="fileconsigna" id="frmeditarconsigenefile" accept="application/msword, application/pdf">
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

  //Funcion para actualizar datos consignas generales
  public function updateConsigGene(){
    if (isset($_POST["frmeditarconsigene"]) ) {
      $hoy = date("dmYgis");
      $data = $_POST['frmeditarconsigene'];
      $ruta = "views/assets/images/consignas_general/";
      $archivo = $_FILES['fileconsigna']['tmp_name'];
      $nom_archivo = $_FILES['fileconsigna']['name'];
      $new_nom_archivo = ($hoy.$nom_archivo);
      $ext = pathinfo($new_nom_archivo);
      $dirc_file = ($ruta.$new_nom_archivo);
      $result = $this->model->updateConsigGeneral($data, $dirc_file, $new_nom_archivo);
      if ($result == true) {
        $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
      }
      print_r($result);
    }
  }

  //funcion para Consultar o Visualizar el archivo PDF de de las consignas generales
  public function readerArchivo(){
    if (isset($_GET["Reader"])) {
      $data = $_GET["Reader"];
      $const = $this->model->consultArchivoReader($data);
      foreach ($const as $key => $value) {
        header('content-type: application/pdf');
        readfile($value["consig_file"]);
        }
    }else {
    header("location:Error500");
    }
  }

  public function downloadedArchivo(){
    if (isset($_GET["Downloadg"])) {
      $data = $_GET["Downloadg"];
      $const = $this->model->consultArchivoReader($data);
        foreach ($const as $key => $value) {
          header('Content-Disposition: attachment; filename="'.$value["consig_nomarchivo"].'"');
          readfile($value["consig_file"]);
      }
    }else {
        header("location:Error500");
    }
  }

  //funcion para borrar una archico (consigna general) de la DB
  public function borrarArchivo(){
    if (isset($_POST["Borrar"])) {
      $data = $_POST["Borrar"];
      $result = $this->model->borrarArchivo($data);
      print_r($result);
    }
  }


  public function createConsigPart(){
    if (isset($_POST["frmconsipart"]) ) {
      $hoy = date("dmYgis");
      $data = $_POST['frmconsipart'];
      $ruta = "views/assets/images/consignas_particular/";
      $archivo = $_FILES['fileconsignas']['tmp_name'];
      $nom_archivo = $_FILES['fileconsignas']['name'];
      $nom_archivo = $_FILES['fileconsignas']['name'];
      $new_nom_archivo = ($hoy.$nom_archivo);
      $ext = pathinfo($new_nom_archivo);
      $dirc_file = ($ruta.$new_nom_archivo);
      $result = $this->model->creatNewConsigParticular($data, $dirc_file, $new_nom_archivo);
      if ($result == true) {
        $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
      }
      print_r($result);
    }
  }

  public function consultArchivoParti(){
      $data = $_POST["dato"];
      if ($data) {
        $const = $this->model->consultArchivoParti($data);
        if ($const == "NULL") {
          echo '<h2 style="text-align: center">No hay consignas particulares cargadas asociadas a esta sede. </h2>';
        }else {
          foreach ($const as $key => $value) {
            echo '     <div class="col-md-55">
                          <div class="thumbnail">
                            <div class="image view view-first">
                              <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                              <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                <a href="Consigna-EditarP-'.$value["consigp_id"].'"><i class="fa fa-pencil"></i></a>
                                <a href="Consigna-ReaderP-'.$value["consigp_id"].'" target="_blank"><i class="fa fa-eye"></i></a>
                                <a id="borrarArchivoParti" data-idborrar="'.$value["consigp_id"].'"><i class="fa fa-times"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="caption">
                              <p><strong>'.$value["consigp_titulo"].'</strong>
                              </p>
                              <p>'.$value["consigp_descripcion"].'</p>
                            </div>
                          </div>
                        </div>';
        }
      }
    }else {
      echo '<h2 style="text-align: center">Selecione Una sede.</h2>';
    }
  }

  public function consultArchivoPartiModConsulta(){
      $data = $_POST["dato"];
      if ($data) {
        $const = $this->model->consultArchivoParti($data);
        if ($const == "NULL") {
          echo '<h2 style="text-align: center">No hay consignas particulares cargadas asociadas a esta sede </h2>';
        }else {
          foreach ($const as $key => $value) {
            echo '     <div class="col-md-55">
                          <div class="thumbnail">
                            <div class="image view view-first">
                              <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                              <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                <a href="Consigna-ReaderP-'.$value["consigp_id"].'" target="_blank"><i class="fa fa-eye"></i></a>
                                <a href="Consigna-DownloadP-'.$value["consigp_id"].'"><i class="fa fa-download"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="caption">
                              <p><strong>'.$value["consigp_titulo"].'</strong>
                              </p>
                              <p>'.$value["consigp_descripcion"].'</p>
                            </div>
                          </div>
                        </div>';
        }
      }
    }else {
      echo '<h2 style="text-align: center">Selecione Una sede.</h2>';
    }
  }


  public function editarConsgPart(){
    if (isset($_GET["Editar"])) {
      $data = $_GET["Editar"];
      $const = $this->model->consultArchivoPartitodo($data);
      if ($const == "NULL") {
        header("location:Error500");
      }else {
        foreach ($const as $key => $value) {
        echo '   <input type="hidden" name="frmeditarconsiparti[]" value="'.$value["consigp_id"].'">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Sede: <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                        <select class="select2_single form-control" tabindex="-1" required="required"id="selecionasede" name="frmeditarconsiparti[]">
                          <option value="'.$value["sed_id"].'">'.$value["sed_nombre"].'</option>';

                          $selectsede = new NovedadController();
                          $selectsede -> selctSedes();

                echo '  </select>
                      </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Titulo: <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="Cambia el titulo de la consigna" required="required" id="frmeditarconsipartititle" name="frmeditarconsiparti[]" value="'.$value["consigp_titulo"].'">
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Descripción: <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Cambia La descripción de la consigna" required="required" id="frmeditarconsipartidesp" name="frmeditarconsiparti[]" value="'.$value["consigp_descripcion"].'">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Archivo: <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-9 col-xs-12">
                        <input type="file" class="form-control" placeholder="Descripción De la Consigna" required="required" name="fileconsignap" id="frmeditarconsipartifile" accept="application/msword, application/pdf">
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

  public function updateConsgPart(){
    if (isset($_POST["frmeditarconsiparti"])) {
      $hoy = date("dmYgis");
      $data = $_POST["frmeditarconsiparti"];
      $ruta = "views/assets/images/consignas_particular/";
      $archivo = $_FILES['fileconsignap']['tmp_name'];
      $nom_archivo = $_FILES['fileconsignap']['name'];
      $new_nom_archivo = ($hoy.$nom_archivo);
      $ext = pathinfo($new_nom_archivo);
      $dirc_file = ($ruta.$new_nom_archivo);
      $result = $this->model->updateConsgPart($data, $dirc_file, $new_nom_archivo);
      if ($result == true) {
        $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
      }
      print_r($result);
    }
  }

  public function readerArchivoParti(){
    if (isset($_GET["consigp_id"])) {
      $data = $_GET["consigp_id"];
      $const = $this->model->consultArchivoPartitodo($data);
      if ($const == "NULL") {
        header("location:Error500");
      }else {
        foreach ($const as $key => $value) {
          header('content-type: application/pdf');
          readfile($value["consigp_file"]);
        }
      }
    }
  }

  public function downloadedArchivoPart(){
    if (isset($_GET["Downloadg"])) {
      $data = $_GET["Downloadg"];
      $const = $this->model->consultArchivoPartitodo($data);
        foreach ($const as $key => $value) {
          header('Content-Disposition: attachment; filename="'.$value["consigp_nomarchivo"].'"');
          readfile($value["consigp_file"]);
      }
    }else {
        header("location:Error500");
    }
  }

  public function borrarArchivoParti(){
    if (isset($_POST["Borrar"])) {
      $data = $_POST["Borrar"];
      $const = $this->model->borrarArchivoParti($data);
      print_r($const);
      }
    }

}

<?php
require_once 'model/circular.model.php';

class CircularController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new CircularModel();
  }
  // Funcion para
  public function wiewsReporCircu(){
    $title = "Reporte Circular";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_circular/reportcircular.php';
    require_once 'views/include/footer.php';
  }

  public function consultCircu(){
    $title = "Cosnulta Circular";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_circular/consultcircular.php';
    require_once 'views/include/footer.php';
  }

  public function wiewseditaCircu(){
    $title = "Editar Circular";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_circular/editarcircular.php';
    require_once 'views/include/footer.php';
  }

  public function createCircular(){
    if (isset($_POST["frmcircular"]) ) {
      $hoy = date("dmYgis");
      $data = $_POST['frmcircular'];
      $ruta = "views/assets/images/circular/";
      $archivo = $_FILES['filecircular']['tmp_name'];
      $nom_archivo = $_FILES['filecircular']['name']; //nombre de archivo como lo carga desde el escritorio
      $new_nom_archivo = ($hoy.$nom_archivo);
      $ext = pathinfo($new_nom_archivo);
      $dirc_file = ($ruta.$new_nom_archivo);
      $result = $this->model->creatNewCircular($data, $dirc_file, $new_nom_archivo);
      if ($result == true) {
        $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
      }
      print_r($result);
    }
  }

  public function consultArchivoCircular(){
    if (isset( $_POST["dato"])) {
      $data = $_POST["dato"];
      if($data){
        $const = $this->model->consultArchivoCircular($data);
        if ($const == "NULL") {
          echo '<h2 style="text-align: center">No hay circulares cargadas a esta sede. </h2>';
        }else {
            foreach ($const as $key => $value) {
              echo '     <div class="col-md-55">
                            <div class="thumbnail">
                              <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                                <div class="mask no-caption">
                                  <div class="tools tools-bottom">
                                  <a href="Circular-Editar-'.$value["circu_id"].'"><i class="fa fa-pencil"></i></a>
                                  <a href="Circular-Reader-'.$value["circu_id"].'" target="_blank"><i class="fa fa-eye"></i></a>
                                  <a id="borrarArchivoCircu" data-idborrar="'.$value["circu_id"].'"><i class="fa fa-times"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div class="caption">
                                <p><strong>'.$value["circu_titulo"].'</strong>
                                </p>
                                <p>'.$value["circu_descripcion"].'</p>
                              </div>
                            </div>
                          </div>';
          }
        }
      }else {
        echo '<h2 style="text-align: center">Selecione Una sede.</h2>';
    }
  }
  }
  public function consultArchivoCirculares(){
    if (isset( $_POST["dato"])) {
      $data = $_POST["dato"];
      if($data){
        $const = $this->model->consultArchivoCircular($data);
        if ($const == "NULL") {
          echo '<h2 style="text-align: center">No hay circulares cargadas a esta sede. </h2>';
        }else {
            foreach ($const as $key => $value) {
              echo '     <div class="col-md-55">
                            <div class="thumbnail">
                              <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="views/assets/images/media.jpg" alt="image" />
                                <div class="mask no-caption">
                                  <div class="tools tools-bottom">
                                  <a href="Circular-Reader-'.$value["circu_id"].'" target="_blank"><i class="fa fa-eye"></i></a>
                                    <a href="Circular-Download-'.$value["circu_id"].'"><i class="fa fa-download"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div class="caption">
                                <p><strong>'.$value["circu_titulo"].'</strong>
                                </p>
                                <p>'.$value["circu_descripcion"].'</p>
                              </div>
                            </div>
                          </div>';
          }
        }
    }else {
      echo '<h2 style="text-align: center">Selecione Una sede.</h2>';
    }
  }
}

 public function editarCircular(){
   if (isset($_GET["Editar"])) {
     $data = $_GET["Editar"];
       $const = $this->model->editarCircular($data);
       if ($const == "NULL") {
         header("location:Error500");
       }else {
           foreach ($const as $key => $value) {
           echo '   <input type="hidden" name="frmeditarcircular[]" value="'.$value["circu_id"].'">
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Sede: <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-9 col-xs-12">
                           <select class="select2_single form-control" tabindex="-1" required="required"id="selecionasede" name="frmeditarcircular[]" >
                             <option value="'.$value["sed_id"].'">'.$value["sed_nombre"].'</option>';

                             $selectsede = new NovedadController();
                             $selectsede -> selctSedes();

                   echo '  </select>
                         </div>
                       </div>
                       <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Titulo: <span class="required">*</span></label>
                       <div class="col-md-6 col-sm-9 col-xs-12">
                         <input type="text" class="form-control" placeholder="Cambia el titulo del circular" required="required" id="frmeditarcirculartitle" name="frmeditarcircular[]" value="'.$value["circu_titulo"].'">
                       </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Cambiar Descripción: <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-9 col-xs-12">
                           <input type="text" class="form-control" placeholder="Cambia La descripción del circular" required="required" id="frmeditarcirculardesp" name="frmeditarcircular[]" value="'.$value["circu_descripcion"].'">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Debes Cambiar El Archivo: <span class="required">*</span></label>
                         <div class="col-md-6 col-sm-9 col-xs-12">
                           <input type="file" class="form-control" placeholder="Descripción Del circular" required="required" id="frmeditarcircularfile" name="filecircular" accept="application/msword, application/pdf">
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

 public function updateCircular(){
     if (isset($_POST["frmeditarcircular"])) {
       $hoy = date("dmYgis");
       $data = $_POST["frmeditarcircular"];
       $ruta = "views/assets/images/circular/";
       $archivo = $_FILES['filecircular']['tmp_name'];
       $nom_archivo = $_FILES['filecircular']['name'];
       $new_nom_archivo = ($hoy.$nom_archivo);
       $ext = pathinfo($new_nom_archivo);
       $dirc_file = ($ruta.$new_nom_archivo);
       $result = $this->model->updateCircular($data, $dirc_file, $new_nom_archivo);
       if ($result == true) {
         $subir = move_uploaded_file($archivo,$ruta."/".$new_nom_archivo);
       }
       print_r($result);
   }
  }

  public function readerArchivoCircu(){
    if (isset($_GET["Reader"])) {
      $data = $_GET["Reader"];
      $const = $this->model->consultArchivotodoscircu($data);
      if ($const == "NULL") {
        header("location:Error500");
      }else {
        foreach ($const as $key => $value) {
          header('content-type: application/pdf');
          readfile($value["circu_file"]);
        }
      }
    }
  }

public function downloadedArchivoCircu(){
  if (isset($_GET["Downloadg"])) {
    $data = $_GET["Downloadg"];
    $const = $this->model->consultArchivotodoscircu($data);
      foreach ($const as $key => $value) {
        header('Content-Disposition: attachment; filename="'.$value["circu_nomarchivo"].'"');
        readfile($value["circu_file"]);
    }
  }else {
      header("location:Error500");
  }
}

public function borrarArchivoCircu(){
  if (isset($_POST["Borrar"])) {
    $data = $_POST["Borrar"];
    $const = $this->model->borrarArchivoCircular($data);
    print_r($const);
    }
  }




}

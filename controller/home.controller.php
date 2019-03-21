<?php
require_once 'model/home.model.php';

class HomeController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new HomeModel();
  }

  public function index(){
  require_once 'views/modules/mod_user/login.php';
  }

  public function wiewsCreateuser(){
    $title = "Crear Usuario";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_user/crearusuario.php';
    require_once 'views/include/footer.php';
  }

  public function error403(){
    $title = "Error 403 :(";
    require_once 'views/include/headarerror.php';
    require_once 'views/modules/mod_user/error403.php';
    require_once 'views/include/footererror.php';
  }

  public function error404(){
    $title = "Error 404 :(";
    require_once 'views/include/headarerror.php';
    require_once 'views/modules/mod_user/error404.php';
    require_once 'views/include/footererror.php';
  }

  public function error500(){
    $title = "Error 500 :(";
    require_once 'views/include/headarerror.php';
    require_once 'views/modules/mod_user/error500.php';
    require_once 'views/include/footererror.php';
  }

  public function wiewsClienteSede(){
    $title = "Ver Cliente o Sede";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_user/clientsede.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsUser(){
    $title = "Ver Usuario";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_user/verusers.php';
    require_once 'views/include/footer.php';
  }
  public function wiewsUserNormal(){
    $title = "Ver Usuario";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_user/verusersnormal.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsEditarUser(){
    $title = "Editar Usuario";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_user/editaruser.php';
    require_once 'views/include/footer.php';
  }

  public function wiewsProfile(){
  $title = "Mi Perfil";
  require_once 'views/include/headar.php';
  require_once 'views/modules/mod_user/profile.php';
  require_once 'views/include/footer.php';
}

public function wiewsCharge(){
$title = "Cargos";
require_once 'views/include/headar.php';
require_once 'views/modules/mod_user/cargo.php';
require_once 'views/include/footer.php';
}

public function selctSedesCovitec(){
  $const = $this->model->selectSedesCovitec();
  foreach ($const as $key => $value) {
    echo '<option value="'.$value["sed_id"].'">'.$value["sed_nombre"].'</option>';
  }
}

public function selctAreaCovitec(){
  $const = $this->model->selectAreaCovitec();
  foreach ($const as $key => $value) {
    echo '<option value="'.$value["area_id"].'">'.$value["area_nombre"].'</option>';
  }
}

  // Funcion para crear un usuario nuevo
  public function createUser(){
    if (isset($_POST["frmregister"])) {
      $datamap = $_POST["frmregister"];
      $data = array_map('strtoupper', $datamap);
      $result = $this->model->createUsers($data);
      print_r($result);
    }

  }

  //Funcion para Login (iniciar seccion)
  public function loginUser(){
    if (isset($_POST["do_login"])) {
      $data = array($_POST["user"], $_POST["password"]);
      $result = $this->model->loginUsers($data);
      print_r($result);
    }

  }

  public function passwordNew(){
    if (isset($_POST["frmpassword"])) {
      $data = $_POST["frmpassword"];
      $result = $this->model->passwordNews($data);
      print_r($result);
    }
  }

  //Funcion para crear Cliente
  public function createClient(){
    if (isset($_POST["frmcliente"])) {
      $data = $_POST["frmcliente"];
      $cliente = array_map('strtoupper', $data);
      $result = $this->model->createCliente($cliente);
      print_r($result);
    }
  }

  //Funcion para crear Sede
  public function createSed(){
    if (isset($_POST["frmsede"])) {
      $data = $_POST["frmsede"];
      $sede = array_map('strtoupper', $data);
      $result = $this->model->createSede($sede);
      print_r($result);
    }
  }

  //Funcion para Buscar mediante un intup SELECT los vargos
  public function selectCarg(){
    $const = $this->model->selectCargo();
    foreach ($const as $key => $value) {
      echo '<option value="'.$value["carg_id"].'">'.$value["carg_nombre"].'</option>';
    }
  }

  //fucion para ver todos los usuario creados usuario solo por el administrador
  public function verUserAdmin(){
    $const = $this->model->verUserAdmin();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr>
            <td>'.$item["usua_nombre1"].' '.$item["usua_nombre2"].'</td>
            <td>'.$item["usua_apellido1"].' '.$item["usua_apellido2"].'</td>
            <td>'.$item["usua_cedula"].'</td>
            <td>'.$item["carg_nombre"].'</td>
            <td>'.$item["clien_nombre"].'</td>
            <td>'; if($item["usua_estado"] === "1"){echo 'ACTIVO';}elseif($item["usua_estado"] === "0"){echo 'DESACTIVO';}else {header("location:Error500");}echo'</td>
            <td>
            <a href="Usuario-Editar-'.$item["usua_id"].'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
            <a id="userRestPassAdmin" data-idrestablecer="'.$item["usua_id"].'" class="btn btn-warning btn-xs"><i class="fa fa-unlock-alt"></i> Restaurar </a>
            </td>
            </tr>';
      }
    }
  }

  public function verUserNormal(){
    $const = $this->model->verUserNormal();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr>
            <td>'.$item["usua_nombre1"].' '.$item["usua_nombre2"].'</td>
            <td>'.$item["usua_apellido1"].' '.$item["usua_apellido2"].'</td>
            <td>'.$item["usua_cedula"].'</td>
            <td>'.$item["carg_nombre"].'</td>
            <td>'.$item["clien_nombre"].'</td>
            <td>'; if($item["usua_estado"] === "1"){echo 'ACTIVO';}elseif($item["usua_estado"] === "0"){echo 'DESACTIVO';}else {header("location:Error500");}echo'</td>
            <td>
            <a href="Usuario-Editar-'.$item["usua_id"].'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
            <a id="userRestPass" data-idrestablecer="'.$item["usua_id"].'" class="btn btn-warning btn-xs"><i class="fa fa-unlock-alt"></i> Restaurar </a>
            </td>
            </tr>';
      }
    }
  }

  public function editUser(){
    if (isset($_GET["id"])) {
      $dato = $_GET["id"];
      $const = $this->model->editUser($dato);
      if ($const == "NULL") {
          header("location:Error500");
      }else {
        foreach ($const as $key => $value) {
          echo '<input type="hidden" name="frmeditar[]" value="'.$value["usua_id"].'">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numero de Identificación: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="frmeditar[]" value="'.$value["usua_cedula"].'" required="required" id="frmeditarnumber" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Primer Nombre: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="frmeditar[]" value="'.$value["usua_nombre1"].'" required="required" id="frmeditaruser1" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Segundo Nombre: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="frmeditar[]" value="'.$value["usua_nombre2"].'" id="" id="frmeditaruser1" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Primer Apellido: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="frmeditar[]" value="'.$value["usua_apellido1"].'" required="required" id="frmeditarlast1" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Segundo Apellido: <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="frmeditar[]" value="'.$value["usua_apellido2"].'" required="required" id="frmeditarlast2" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo: <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control"  name="frmeditar[]" required="required" id="frmeditarcargo">
                    <option value="'.$value["carg_id"].'">'.$value["carg_nombre"].'</option>';
                    $selectsede = new HomeController();
                    $selectsede -> selectCarg();
            echo '</select>
                </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente: <span class="required">*</span> </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control"  name="frmeditar[]" id="frmeditarcliente">
                    <option value="'.$value["clien_id"].'">'.$value["clien_nombre"].'</option>';
                    $selectclient = new NovedadController();
                    $selectclient -> selectClient();
            echo '</select>
                </div>
                </div>
                <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado: </label>
                   <div class="radio">
                     <label>
                       ACTIVO <input type="radio" class="flat" name="frmeditar[]" value="1"'; if ($value["usua_estado"] === "1") {echo 'checked';}echo'> DESACTIVO
                       <input type="radio" class="flat" name="frmeditar[]" value="0"'; if ($value["usua_estado"] === "0") {echo 'checked';} echo'>
                     </label>
                   </div>
                 </div>

                 <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Sede de Covitec: <span class="required">*</span> </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <select class="form-control"  name="frmeditar[]" id="frmeditatsede">
                     <option value="'.$value["sed_id"].'">'.$value["sed_nombre"].'</option>';
                     $selectsede = new HomeController();
                     $selectsede -> selctSedesCovitec();
                echo'</select>
                 </div>
                 </div>

                 <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Area: <span class="required">*</span> </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                   <select class="form-control"  name="frmeditar[]" id="frmeditararea">
                     <option value="'.$value["area_id"].'">'.$value["area_nombre"].'</option>';
                     $selectsede = new HomeController();
                     $selectsede -> selctAreaCovitec();
                echo' </select>
                 </div>
                 </div>';
        }
      }
    }
  }

  public function userRestPassAdmin(){
    if (isset($_POST["lockid"])) {
      $data = $_POST['lockid'];
      $const = $this->model->userRestPass($data);
      print_r($const);
    }
  }

  public function userRestPass(){
    if (isset($_POST["lockid"])) {
      $data = $_POST['lockid'];
      $const = $this->model->userRestPass($data);
      print_r($const);
    }
  }

  public function updateUser(){
    if (isset($_POST["frmeditar"])) {
      $data = $_POST['frmeditar'];
      $const = $this->model->updateUsers($data);
      print_r($const);

    }
  }

  public function createCarg(){
    if (isset($_POST["frmcargo"])) {
      $data = $_POST["frmcargo"];
      $result = $this->model->createCargo($data);
      print_r($result);
    }
  }

  public function verCargo(){
    $const = $this->model->verCargos();
    if ($const != "") {
      foreach ($const as $row => $item) {
      echo '<tr>
            <td>'.$item["carg_nombre"].'</td>
            <td>'.$item["usua_nombre1"].' '.$item["usua_nombre2"].' '.$item["usua_apellido1"].' '.$item["usua_apellido2"].'</td>
            </tr>';
      }
    }
  }



}

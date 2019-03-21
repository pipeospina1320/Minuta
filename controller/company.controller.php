<?php
require_once 'model/company.model.php';

class CompanyController{
  private $model;

  public function __CONSTRUCT(){
    $this->model = new CompanyModel();
  }
  //Funcion para
  public function viewMisionVision(){
    $title = "Misión Y Visión";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_empresa/misionyvision.php';
    require_once 'views/include/footer.php';
  }

  public function viewValores(){
    $title = "Valores";
    require_once 'views/include/headar.php';
    require_once 'views/modules/mod_empresa/valores.php';
    require_once 'views/include/footer.php';
  }

}

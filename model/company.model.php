  <?php
require_once 'model/conn.model.php';

class CompanyModel{
   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }

   // Funcion para
   public function ConsultNovedad(){
     try {

     } catch (\Exception $e) {
       die($e->getMessage());
     }


   }


   }

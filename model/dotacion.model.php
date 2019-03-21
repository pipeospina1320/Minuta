  <?php
require_once 'model/conn.model.php';

class DotacionModel{
   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }

   //Funcion para cosnultar los elementos
   public function selectElements(){
     try {
       $sql = "SELECT * FROM elemento ORDER BY elemento.elem_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   //Funcion para cosnultar los elementos
   public function selectAspectos(){
     try {
       $sql = "SELECT * FROM aspecto ";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function createDotacion($dotacion){
     try {
       session_start();
       $idsession = $_SESSION["idusuario"];
       $idcliente = $_SESSION["idcliente"];
       $conver_fecha = date("Y-m-d H:i:s", strtotime($dotacion[4])); //Configuro el formato de hora
       $conver_fechareal = date("Y-m-d H:i:s", strtotime($dotacion[5])); //Configuro el formato de hora
       $sql = "INSERT INTO dotacion (dot_id, clien_id, dot_serie, dot_observacion, elem_id, asp_id, dot_fecha, dot_fechareal, usua_id) VALUES (?,?,?,?,?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array('', $idcliente, $dotacion[1], $dotacion[3], $dotacion[0], $dotacion[2], $conver_fecha, $conver_fechareal, $idsession));
        // var_dump($save);
        if ($save == true) {
         return true;
         }else {
          return false;
         }
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function consultaDotacion(){
     try {
       $idcliente = $_SESSION["idcliente"];
       $idusuario = $_SESSION["idusuario"];
       $sql= "SELECT e.elem_nombre, d.dot_serie, a.asp_nombre, d.dot_observacion, d.dot_fecha, d.dot_fechareal, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2 FROM dotacion AS d
              INNER JOIN elemento AS e, aspecto AS a, usuario AS u, cliente AS c
              WHERE d.elem_id = e.elem_id
              AND d.asp_id = a.asp_id
              AND d.usua_id = u.usua_id
              AND d.clien_id = c.clien_id
              AND d.clien_id = ?
              AND d.usua_id = ?";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute(array($idcliente, $idusuario));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
         return "";
       }else {
          return $result    ;
       }

     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function consultaDotacionTotal(){
     try {
       $idcliente = $_SESSION["idcliente"];
       $sql= "SELECT e.elem_nombre, d.dot_serie, a.asp_nombre, d.dot_observacion, d.dot_fecha, d.dot_fechareal, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2 FROM dotacion AS d
              INNER JOIN elemento AS e, aspecto AS a, usuario AS u, cliente AS c
              WHERE d.elem_id = e.elem_id
              AND d.asp_id = a.asp_id
              AND d.usua_id = u.usua_id
              AND d.clien_id = c.clien_id
              AND d.clien_id = ?";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute(array($idcliente));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
         return "";
       }else {
          return $result    ;
       }

     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }


}

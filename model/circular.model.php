  <?php
require_once 'model/conn.model.php';

class CircularModel{
   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }

   // Funcion para
   public function creatNewCircular($data, $dirc_file, $new_nom_archivo){
     try {
       session_start();
       $idsession = $_SESSION["idusuario"];
       $idcliente = $_SESSION["idcliente"];
       date_default_timezone_set('America/Bogota');
       $fechayhora = date("Y-m-d H:i:s");
       $sql = "INSERT INTO circular (circu_id, circu_titulo, circu_descripcion, circu_file, circu_nomarchivo, clien_id, sed_id, usua_id, circu_fecha) VALUES (?,?,?,?,?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array('',$data[1], $data[2], $dirc_file, $new_nom_archivo, $idcliente, $data[0], $idsession, $fechayhora));
       $id = $this->pdo->lastInsertId();
       if ($save == true) {
          $sql= 'SELECT usua_id FROM usuario WHERE clien_id = ?';
          $query = $this->pdo->prepare($sql);
          $const= $query->execute(array($idcliente));
          $result= $query->fetchALL(PDO::FETCH_BOTH);
          if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
            return "";
          }else {
            foreach ($result as $key => $value) {
               $sql1= "INSERT INTO notificacioncir (noticir_notificacion, noticir_usuario, clien_id) VALUES (?,?,?)";// voy aqui
               $query1 = $this->pdo->prepare($sql1);
               $save1 = $query1->execute(array($id, $value["usua_id"], $idcliente));
            }
            if ($save == true && $save1 == true) {
              return true;
            }else {
              return false;
            }
          }
       }else {
         return false;
       }
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function consultArchivoCircular($data){
     try {
       session_start();
       $idcliente = $_SESSION["idcliente"];
       $sql = "SELECT circular.circu_id, circular.circu_titulo,circular.circu_descripcion, circular.circu_file, circular.circu_nomarchivo, cliente.clien_nombre, sede.sed_nombre FROM circular , cliente, sede WHERE circular.clien_id = cliente.clien_id AND circular.sed_id = sede.sed_id AND circular.sed_id = ? AND circular.clien_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data, $idcliente));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
         return "NULL";
       }else {
         return $result;
       }
      } catch (\Exception $e) {
        die($e->getMessage());
     }
   }

   public function editarCircular($data){
     try {
       $sql = "SELECT * FROM circular, sede WHERE circu_id = ? AND circular.sed_id = sede.sed_id";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data));
       $result = $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) {
         return "NULL";
       }else{
         return $result;
       }
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function updateCircular($data, $dirc_file, $new_nom_archivo){
     try {
       $sql = "SELECT circu_file FROM circular WHERE circu_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data[0]));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
         return false;
       }else {
         foreach ($result as $key => $value) {
           unlink($value[0]);
         }
         session_start();
         $idcliente = $_SESSION["idcliente"];
         $idusuario = $_SESSION["idusuario"];
         $sql1 = "UPDATE circular SET circu_titulo=?, circu_descripcion=?, circu_file=?, clien_id=?, sed_id=?, usua_id=?, circu_nomarchivo=? WHERE circu_id = ?";
         $query1 = $this->pdo->prepare($sql1);
         $save1 = $query1->execute(array($data[2], $data[3], $dirc_file, $idcliente, $data[1], $idusuario, $new_nom_archivo, $data[0]));
         if ($save1 == true) {
           return true;
         }else {
           return false;
         }
       }
     } catch (\Exception $e) {
       die ($e->getMessage());
     }
   }

   public function consultArchivotodoscircu($data){
     try {
       $sql = "SELECT * FROM circular WHERE circu_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
        if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
          return "NULL";
        }else {
          return $result;
          }
     } catch (\Exception $e) {
        die ($e->getMessage());
     }
   }

   public function borrarArchivoCircular($data){
     try {
       $sql = "SELECT circu_file FROM circular WHERE circu_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
         return false;
       }else {
         foreach ($result as $key => $value) {
           unlink($value[0]);
         }
          $sql1 = "DELETE FROM circular WHERE  circu_id = ?";
          $query1 = $this->pdo->prepare($sql1);
          $save1 = $query1->execute(array($data));
          if ($save1 == true) {
            return true;
          }else {
            return false;
          }
       }
     } catch (\Exception $e) {
       die ($e->getMessage());
     }

   }


   }

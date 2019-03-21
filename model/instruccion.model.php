  <?php
require_once 'model/conn.model.php';

class InstruccionModel{
   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }

   // Funcion para
   public function creatNewInstruccion($data, $dirc_file, $new_nom_archivo){
     try {
       session_start();
       $idsession = $_SESSION["idusuario"];
       $idcliente = $_SESSION["idcliente"];
       date_default_timezone_set('America/Bogota');
       $fechayhora = date("Y-m-d H:i:s");
       $sql = "INSERT INTO instruccion (instru_id, instru_titulo, instru_descripcion, instru_file, instru_nomarchivo, clien_id, sed_id, usua_id, instru_fecha) VALUES (?,?,?,?,?,?,?,?,?)";
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
               $sql1= "INSERT INTO notificacionins (notins_notificacion, notins_usuario, clien_id) VALUES (?,?,?)";// voy aqui
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

   public function consultArchivoInstruccion($data){
     try {
       session_start();
       $idcliente = $_SESSION["idcliente"];
       $sql = "SELECT instruccion.instru_id, instruccion.instru_titulo,instruccion.instru_descripcion, instruccion.instru_file, instruccion.instru_nomarchivo, cliente.clien_nombre, sede.sed_nombre FROM instruccion , cliente, sede WHERE instruccion.clien_id = cliente.clien_id AND instruccion.sed_id = sede.sed_id AND instruccion.sed_id = ? AND instruccion.clien_id = ?";
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

   public function editarInstruccion($data){
     try {
       $sql = "SELECT * FROM instruccion, sede WHERE instru_id = ? AND instruccion.sed_id = sede.sed_id";
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

   public function updateInstruccion($data, $dirc_file, $new_nom_archivo){
     try {
       $sql = "SELECT instru_file FROM instruccion WHERE instru_id = ?";
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
         $sql1 = "UPDATE instruccion SET instru_titulo=?, instru_descripcion=?, instru_file=?, clien_id=?, sed_id=?, usua_id=?, instru_nomarchivo=? WHERE instru_id = ?";
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

   public function consultArchivotodosInstru($data){
     try {
       $sql = "SELECT * FROM instruccion WHERE instru_id = ?";
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

   public function borrarArchivoInstruccion($data){
     try {
       $sql = "SELECT instru_file FROM instruccion WHERE instru_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
         return false;
       }else {
         foreach ($result as $key => $value) {
           unlink($value[0]);
         }
          $sql1 = "DELETE FROM instruccion WHERE  instruccion.instru_id = ?";
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

   public function createInstruccionManual($data){
     try {
       session_start();
       $idcliente = $_SESSION["idcliente"];
       $idusuario = $_SESSION["idusuario"];
       $conver_fecha = date("Y-m-d H:i:s", strtotime($data[2])); //Configuro el formato de hora
       $sql = "INSERT INTO instruccionmanual (instruman_id, instruman_descripcion, instruman_fecha, clien_id, sed_id, usua_id) VALUES (?,?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array('', $data[1], $conver_fecha, $idcliente, $data[0], $idusuario));
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
               $sql1= "INSERT INTO notificacioninsm (notinsm_notificacion, notinsm_usuario, clien_id) VALUES (?,?,?)";// voy aqui
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

   public function consultInstruccion(){
     try {
       $idcliente = $_SESSION["idcliente"];
       $sql= "SELECT i.instruman_descripcion, DATE_FORMAT(i.instruman_fecha, '%d-%m-%Y %h:%i %p') AS instruman_fechas, c.clien_nombre, s.sed_nombre, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2
              FROM instruccionmanual AS i, sede AS s, cliente AS c, usuario AS u
              WHERE i.sed_id = s.sed_id
              AND i.clien_id = c.clien_id
              AND i.usua_id = u.usua_id
              AND c.clien_id = ?
              ORDER BY i.instruman_fecha DESC";
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

  <?php
require_once 'model/conn.model.php';

class ProtocoloModel{
   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }

   // Funcion para
   public function creatNewProtocolo($data, $dirc_file, $new_nom_archivo){
     try {
       if ($data[0] == "A-Z") {
         session_start();
         $idsession = $_SESSION["idusuario"];
         $idcliente = $_SESSION["idcliente"];
         ini_set('date.timezone','America/Bogota');
         $fechayhora = date("Y-m-d H:i:s");
         $sql = "INSERT INTO protocolo (proto_id, proto_titulo, proto_descripcion, proto_file, proto_nomarchivo, clien_id, usua_id, proto_fecha) VALUES (?,?,?,?,?,?,?,?)";
         $query = $this->pdo->prepare($sql);
         $save = $query->execute(array('', $data[0], $data[1], $dirc_file, $new_nom_archivo, $idcliente, $idsession, $fechayhora));
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
                 $sql1= "INSERT INTO notificacionp (notip_notificacion, notip_usuario, clien_id) VALUES (?,?,?)";
                 $query1 = $this->pdo->prepare($sql1);
                 $save1 = $query1->execute(array($id, $value["usua_id"], $idcliente));
              }
              if ($save == true && $save1 == true) {
                return true;
              }else {
                return false;
              }
            }
         }else if ($save == false){
           return false;
         }
       }else {
         session_start();
         $idsession = $_SESSION["idusuario"];
         $idcliente = $_SESSION["idcliente"];
         ini_set('date.timezone','America/Bogota');
         $fechayhora = date("Y-m-d H:i:s");
         $sql = "INSERT INTO protocolo (proto_id, proto_titulo, proto_descripcion, proto_file, proto_nomarchivo, clien_id, usua_id, proto_fecha) VALUES (?,?,?,?,?,?,?,?)";
         $query = $this->pdo->prepare($sql);
         $save = $query->execute(array('', $data[0], $data[1], $dirc_file, $new_nom_archivo, $idcliente, $idsession,$fechayhora));
         $id = $this->pdo->lastInsertId();
         if ($save == true) {
            $sql= 'SELECT usua_id FROM usuario WHERE clien_id = ?';
            $query = $this->pdo->prepare($sql);
            $const= $query->execute(array($idcliente));
            $result= $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
              return false;
            }else {
              foreach ($result as $key => $value) {
                 $sql1= "INSERT INTO notificacionp (notip_notificacion, notip_usuario, clien_id) VALUES (?,?,?)";
                 $query1 = $this->pdo->prepare($sql1);
                 $save1 = $query1->execute(array($id, $value["usua_id"], $idcliente));
              }
              if ($save == true && $save1 == true) {
                return true;
              }else {
                return false;
              }
            }
         }else{
           return false;
         }
       }

     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function consultArchivoProtocolo($data){
     try {
       session_start();
       if ($data == "A-Z") {
         $idcliente = $_SESSION["idcliente"];
         $sql = "SELECT p.proto_id, p.proto_titulo, p.proto_descripcion, p.proto_file, p.proto_nomarchivo, c.clien_nombre, p.usua_id
                  FROM protocolo AS p
                  INNER JOIN cliente AS c, usuario AS u
                  WHERE p.clien_id = c.clien_id
                  AND p.clien_id = ?
                  AND p.usua_id = u.usua_id
                  ORDER BY p.proto_titulo ASC";
         $query = $this->pdo->prepare($sql);
         $const = $query->execute(array($idcliente));
         $result= $query->fetchALL(PDO::FETCH_BOTH);
         if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
           return "NULL";
         }else {
           return $result;
         }
       }else{
         $idcliente = $_SESSION["idcliente"];
         $sql = "SELECT p.proto_id, p.proto_titulo, p.proto_descripcion, p.proto_file, p.proto_nomarchivo, c.clien_nombre, p.usua_id
                  FROM protocolo AS p, cliente AS c, usuario AS u
                  WHERE p.clien_id = c.clien_id
                  AND p.usua_id = u.usua_id
                  AND p.clien_id = ?
                  HAVING p.proto_titulo = ?";
         $query = $this->pdo->prepare($sql);
         $const = $query->execute(array($idcliente, $data));
         $result= $query->fetchALL(PDO::FETCH_BOTH);
         if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
           return "NULL";
         }else {
           return $result;
         }
     }
      } catch (\Exception $e) {
        die($e->getMessage());
     }
   }

   public function editarProtocolo($data){
     try {
       $sql = "SELECT * FROM protocolo WHERE proto_id = ?";
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

   public function updateProtocolo($data, $dirc_file, $new_nom_archivo){
     try {
       $sql = "SELECT proto_file FROM protocolo WHERE proto_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data[0]));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
         echo "error";
       }else {
         foreach ($result as $key => $value) {
           unlink($value[0]);
         }
         if ($data[1] == "A-Z") {
             session_start();
             $idcliente = $_SESSION["idcliente"];
             $idusuario = $_SESSION["idusuario"];
             $sql1 = "UPDATE protocolo SET proto_titulo=?, proto_descripcion=?, proto_file=?, clien_id=?, usua_id=?, proto_nomarchivo=? WHERE proto_id = ?";
             $query1 = $this->pdo->prepare($sql1);
             $save1 = $query1->execute(array($data[1], $data[3], $dirc_file, $idcliente, $idusuario, $new_nom_archivo, $data[0]));
             if ($save1 == true) {
               return true;
             }else {
               return false;
             }
          }else {
            session_start();
            $idcliente = $_SESSION["idcliente"];
            $idusuario = $_SESSION["idusuario"];
            $sql1 = "UPDATE protocolo SET proto_titulo=?, proto_descripcion=?, proto_file=?, clien_id=?, usua_id=?, proto_nomarchivo=? WHERE proto_id = ?";
            $query1 = $this->pdo->prepare($sql1);
            $save1 = $query1->execute(array($data[1], $data[2], $dirc_file, $idcliente, $idusuario, $new_nom_archivo, $data[0]));
            if ($save1 == true) {
              return true;
            }else {
              return false;
            }
          }
       }
     } catch (\Exception $e) {
       die ($e->getMessage());
     }
   }

   public function consultArchivotodosproto($data){
     try {
       $sql = "SELECT * FROM protocolo WHERE proto_id = ?";
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

   public function borrarArchivoParti($data){
     try {
       $sql = "SELECT proto_file FROM protocolo WHERE proto_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
         return false;
       }else {
         foreach ($result as $key => $value) {
           unlink($value[0]);
         }
          $sql1 = "DELETE FROM protocolo WHERE  proto_id = ?";
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

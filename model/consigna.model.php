  <?php
require_once 'model/conn.model.php';

class ConsignaModel{
   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }

   //funcion para crear una nueva consigna general
   public function creatNewConsigGeneral($data, $dirc_file, $new_nom_archivo){
     try {
       session_start();
       $idsession = $_SESSION["idusuario"];
       date_default_timezone_set('America/Bogota');
       $fechayhora = date("Y-m-d H:i:s");
       $sql = "INSERT INTO consignageneral (consig_id, consig_titulo, consig_descripcion, consig_file, usua_id, consig_nomarchivo, consig_fecha) VALUES (?,?,?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array('', $data[0], $data[1], $dirc_file, $idsession, $new_nom_archivo, $fechayhora));
       $id = $this->pdo->lastInsertId();
       // echo ($save);
       if ($save == true) {
          $sql= 'SELECT usua_id FROM usuario WHERE clien_id = ?';
          $query = $this->pdo->prepare($sql);
          $const= $query->execute(array($idcliente));
          $result= $query->fetchALL(PDO::FETCH_BOTH);
          if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
            return "";
          }else {
            foreach ($result as $key => $value) {
               $sql1= "INSERT INTO notificacioncg (noticg_notificacion, noticg_usuario, clien_id) VALUES (?,?,?)";// voy aqui
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

   //funcion para consultar las consignas general
   public function consultArchivo(){
     try {
       $sql = "SELECT consig_id, consig_titulo, consig_descripcion, consig_file FROM consignageneral";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
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

   public function consultArchivoReader($data){
     try {
       $sql = "SELECT consig_id, consig_titulo, consig_descripcion, consig_file, consig_nomarchivo FROM consignageneral WHERE consig_id = ?";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute(array($data));
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

   public function editarConsg($data){
     try {
       $sql = "SELECT * FROM consignageneral WHERE consig_id = ?";
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

   public function updateConsigGeneral($data, $dirc_file, $new_nom_archivo){
     try {
       $sql = "SELECT consig_file FROM consignageneral WHERE consig_id = ?";
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
       $idsession = $_SESSION["idusuario"];
       $sql1 = "UPDATE consignageneral SET consig_titulo = ?,  consig_descripcion = ?,  consig_file = ?,  usua_id = ?, consig_nomarchivo = ? WHERE consig_id = ?";
       $query1 = $this->pdo->prepare($sql1);
       $save1= $query1->execute(array($data[1], $data[2], $dirc_file, $idsession, $new_nom_archivo, $data[0]));
       if ($save1 == true) {
         return true;
       }else {
         return false;
       }
      }
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   //funcion para borrar una consigna general
   public function borrarArchivo($data){
     try {
       $sql = "SELECT consig_file FROM consignageneral WHERE consig_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
         return false;
       }else {
         foreach ($result as $key => $value) {
           unlink($value[0]);
         }
       $sql1 = "DELETE FROM consignageneral WHERE consig_id = ?";
       $query1 = $this->pdo->prepare($sql1);
       $save1 = $query1->execute(array($data));
       if ($save1 == true) {
         return true;
       }else {
         return false;
       }
      }
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   //funcion para crear una consigna particular
   public function creatNewConsigParticular($data, $dirc_file, $new_nom_archivo){
     try {
       session_start();
       $idsession = $_SESSION["idusuario"];
       $idcliente = $_SESSION["idcliente"];
       date_default_timezone_set('America/Bogota');
       $fechayhora = date("Y-m-d H:i:s");
       $sql = "INSERT INTO consignaparticular (consigp_id, consigp_titulo, consigp_descripcion, consigp_file, clien_id, sed_id, usua_id, consigp_nomarchivo, consigp_fecha) VALUES (?,?,?,?,?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array('', $data[1], $data[2], $dirc_file, $idcliente, $data[0], $idsession, $new_nom_archivo, $fechayhora));
       $id = $this->pdo->lastInsertId();
       // echo ($save);
       if ($save == true) {
         $sql= 'SELECT usua_id FROM usuario WHERE clien_id = ?';
         $query = $this->pdo->prepare($sql);
         $const= $query->execute(array($idcliente));
         $result= $query->fetchALL(PDO::FETCH_BOTH);
         if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
           return "";
         }else {
           foreach ($result as $key => $value) {
              $sql1= "INSERT INTO notificacioncp (noticp_notificacion, noticp_usuario, clien_id) VALUES (?,?,?)";// voy aqui
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

   //funcion para consultar las consignas particulares
   public function consultArchivoParti($data){
     try {
       session_start();
       $idcliente = $_SESSION["idcliente"];
       $sql = "SELECT consignaparticular.consigp_id, consignaparticular.consigp_titulo, consignaparticular.consigp_descripcion, consignaparticular.consigp_file, consignaparticular.usua_id FROM consignaparticular WHERE consignaparticular.clien_id= ? AND consignaparticular.sed_id= ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($idcliente, $data));
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

   public function consultArchivoPartitodo($data){
     try {
       $sql = "SELECT * FROM consignaparticular, sede WHERE consigp_id = ? AND consignaparticular.sed_id = sede.sed_id";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
        if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
          return "NULL";
        }else {
          return $result;
          }
     }catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function updateConsgPart($data, $dirc_file, $new_nom_archivo){
     try {
       $sql = "SELECT consigp_file FROM consignaparticular WHERE consigp_id = ?";
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
       $sql1 = "UPDATE consignaparticular SET consigp_titulo=?, consigp_descripcion=?, consigp_file=?, clien_id=?, sed_id=?, usua_id=?, consigp_nomarchivo=? WHERE consigp_id = ?";
       $query1 = $this->pdo->prepare($sql1);
       $save1 = $query1->execute(array($data[2], $data[3], $dirc_file, $idcliente, $data[1], $idusuario, $new_nom_archivo, $data[0]));
       if ($save1 == true) {
         return true;
       }else {
         return false;
       }
      }
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function borrarArchivoParti($data){
    try {
      $sql = "SELECT consigp_file FROM consignaparticular WHERE consigp_id = ?";
      $query = $this->pdo->prepare($sql);
      $const = $query->execute(array($data));
      $result= $query->fetchALL(PDO::FETCH_BOTH);
      if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
        return false;
      }else {
        foreach ($result as $key => $value) {
          unlink($value[0]);
        }
         $sql1 = "DELETE FROM consignaparticular WHERE  consigp_id = ?";
         $query1 = $this->pdo->prepare($sql1);
         $save1 = $query1->execute(array($data));
         if ($save1 == true) {
           return true;
         }else {
           return false;
         }
      }
    } catch (\Exception $e) {
      die($e->getMessage());
    }
   }


   }

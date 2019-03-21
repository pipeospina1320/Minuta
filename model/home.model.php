<?php
require_once 'model/conn.model.php';

class HomeModel{

   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }
   // Funcion para crear un usuario nuevo
   public function createUsers($data) {
     try {
       $sql = "SELECT usua_cedula FROM usuario WHERE usua_cedula = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data[0]));
       $const= $query->fetch();
       if ($const[0] == $data[0]) {
         return "existe";
       }else {
       $pass_encrypted = password_hash(123456, PASSWORD_DEFAULT);
       $sql1 = "INSERT INTO usuario (usua_id, usua_nombre1, usua_nombre2, usua_apellido1, usua_apellido2, usua_cedula, carg_id, usua_contrasena, clien_id, usua_estado, sed_id, area_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
       $query1 = $this->pdo->prepare($sql1);
       $save = $query1->execute(array('', $data[1], $data[2], $data[3], $data[4], $data[0], $data[5], $pass_encrypted, $data[6], $data[7], $data[8], $data[9]));
       if ($save == true) {
         return true;
       }else {
         return false;
       }
      }
     } catch (Exception $e) {
        $save = $e->getMessage();;
     }
   }

   // Funcion para login para haceder a la plataforma
   public function loginUsers($data) {
     try {
      $sql = "SELECT usua_cedula, usua_contrasena FROM usuario WHERE usua_cedula = ?";
      $query = $this->pdo->prepare($sql);
      $valid = $query->execute(array($data[0]));
      $valid= $query->fetch();

      if (password_verify($data[1], $valid[1])) { // Condicional para validar contrasena si es igual
        $sql1 = "SELECT u.usua_id, CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, u.usua_nombre2, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1, u.usua_apellido2, u.usua_cedula, u.carg_id,
                u.usua_contrasena, u.clien_id, u.usua_estado, u.usua_modifica, u.usua_ingreso, u.sed_id, u.area_id
                FROM usuario AS u
                WHERE usua_cedula = ? ";
        $query = $this->pdo->prepare($sql1);
        $const= $query->execute(array($data[0]));
        $const= $query->fetch();

       if ($const[9] === "1" && $const[11] === "1") {
        session_start(); // Variables para iniciar session
        $_SESSION["validar"] = true;
        $_SESSION["nombre"] = $const[1];
        $_SESSION["apellido"] = $const[3];
        $_SESSION["idusuario"] = $const[0];
        $_SESSION["cargo"] = $const[6];
        $_SESSION["idcliente"] = $const[8];
        $_SESSION["sede"] = $const[12];
        return true;
      }else if ($const[11] === "0" && $const[9] === "1"){
        session_start(); // Variables para iniciar session
        $_SESSION["cedula"] = $const[5];
        return "successpassword";
      }
    }else {
      return "authentication";
    }

     } catch (Exception $e) {
         die($e->getMessage());
     }

   }

   public function passwordNews($data){
     try {
     session_start();
      $usuario = $_SESSION["cedula"];
      $ingreso = 1;
      $pass_new = password_hash($data[0], PASSWORD_DEFAULT);
      $sql = "UPDATE usuario SET usua_contrasena = ?, usua_ingreso = ? WHERE usua_cedula = ?";
      $query = $this->pdo->prepare($sql);
      $result = $query->execute(array($pass_new, $ingreso, $usuario));
      if ($result == true) {
        $sql1 = "SELECT * FROM usuario WHERE usua_cedula = ? ";
        $query = $this->pdo->prepare($sql1);
        $const= $query->execute(array($usuario));
        $const= $query->fetch();
          if ($const[9] === "1" && $const[11] === "1") {
          $_SESSION["validar"] = true;
          $_SESSION["nombre"] = $const[1];
          $_SESSION["apellido"] = $const[3];
          $_SESSION["idusuario"] = $const[0];
          $_SESSION["cargo"] = $const[6];
          $_SESSION["idcliente"] = $const[8];
          $_SESSION["sede"] = $const[12];
          return true;
        }else {
          return false;
        }
      }else {
        return false;
      }
    } catch (\Exception $e) {
      die($e->getMessage());
    }
   }

   //funcion para crear Clientes
   public function createCliente($cliente){
     try {
       $sql = "INSERT INTO cliente (clien_id, clien_nit, clien_codverif, clien_nombre) VALUES (?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $result = $query->execute(array('', $cliente[0], $cliente[1], $cliente[2]));
       if ($result == true) {
         return true;
       }else {
         return false;
       }
     } catch (\Exception $e) {
       die($e->getMessage());
     }

   }

   //Funcion para Crear Sedes
   public function createSede($sede){
     try {
       $sql = "INSERT INTO sede (sed_id, clien_id, sed_nombre) VALUES (?,?,?)";
       $query = $this->pdo->prepare($sql);
       $result = $query->execute(array('', $sede[0], $sede[1]));
       if ($result == true) {
         return true;
       }else {
         return false;
       }
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function selectCargo(){
     try {
       $sql = "SELECT * FROM cargo WHERE carg_id > 1 ORDER BY cargo.carg_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute();
       $const = $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   function selectSedesCovitec(){
     try {
       $sql = "SELECT * FROM sede WHERE clien_id = 1 ORDER BY sed_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute(array($idcliente));
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   function selectAreaCovitec(){
     try {
       $sql = "SELECT * FROM area ORDER BY area_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute(array($idcliente));
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function verUserAdmin(){
     try {
       $sql = "SELECT usuario.usua_id, usuario.usua_nombre1, usuario.usua_nombre2, usuario.usua_apellido1, usuario.usua_apellido2, usuario.usua_cedula, usuario.usua_estado, cargo.carg_nombre,  cliente.clien_nombre FROM usuario, cargo, cliente WHERE usuario.carg_id = cargo.carg_id AND usuario.clien_id = cliente.clien_id ORDER BY usuario.usua_nombre1 ASC";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute();
       $result = $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
         return "";
       }else {
         return $result;
       }
     } catch (\Exception $e) {
       die($e->getMessage());
      }
    }

    public function verUserNormal(){
      try {
        $sql = "SELECT u.usua_id, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2, u.usua_cedula, u.usua_estado, c.carg_nombre,  e.clien_nombre FROM usuario AS u, cargo AS c, cliente AS e WHERE u.carg_id = c.carg_id AND u.clien_id = e.clien_id AND c.carg_id > 1 ORDER BY u.usua_nombre1 ASC";
        $query = $this->pdo->prepare($sql);
        $const = $query->execute();
        $result = $query->fetchALL(PDO::FETCH_BOTH);
        if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
          return "";
        }else {
          return $result;
        }
      } catch (\Exception $e) {
        die($e->getMessage());
       }
     }


    public function editUser($dato){
      try {
        $sql = "SELECT u.usua_id, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2, u.usua_cedula, u.usua_estado, u.sed_id, u.area_id, u.carg_id, u.clien_id, c.carg_nombre, cc.clien_nombre, s.sed_nombre, a.area_nombre
                FROM usuario AS u, cargo AS c, cliente AS cc, sede AS s, area AS a
                WHERE u.carg_id = c.carg_id
                AND u.clien_id = cc.clien_id
                AND u.sed_id = s.sed_id
                AND u.area_id = a.area_id
                AND u.usua_id = ?";
        $query = $this->pdo->prepare($sql);
        $const = $query->execute(array($dato));
        $result = $query->fetchALL(PDO::FETCH_BOTH);
        if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
          return "NULL";
        }else {
          return $result;
        }
      } catch (\Exception $e) {
        die($e->getMessage());
       }
     }

     public function userRestPass($data){
       try {
         $pass_encrypted = password_hash(123456, PASSWORD_DEFAULT);
         $ingreso = 0;
         $sql = "UPDATE usuario SET  usua_contrasena = ?, usua_ingreso = ? WHERE usua_id = ?";
         $query = $this->pdo->prepare($sql);
         $save = $query->execute(array($pass_encrypted, $ingreso, $data));
         if ($save == true) {
           return true;
         }else {
           return false;
         }
       } catch (\Exception $e) {
         die($e->getMessage());
       }
     }

     public function updateUsers($data){
       try {
         session_start();
         $idsession = $_SESSION["idusuario"];
         $sql = "UPDATE usuario SET usua_nombre1=?, usua_nombre2=?, usua_apellido1=?, usua_apellido2=?, usua_cedula=?, carg_id=?, clien_id=?, usua_estado=?, usua_modifica=?, sed_id=?, area_id=? WHERE usua_id = ?";
         $query = $this->pdo->prepare($sql);
         $save = $query->execute(array($data[2], $data[3], $data[4], $data[5], $data[1], $data[6], $data[7], $data[8], $idsession, $data[9], $data[10], $data[0]));
         if ($save == true) {
           return true;
         }else {
           return false;
         }
       } catch (\Exception $e) {
         die($e->getMessage());
       }
     }

     public function createCargo($data){
       try {
         session_start();
         $idsession = $_SESSION["idusuario"];
         $sql = "INSERT INTO cargo (carg_id, carg_nombre, usua_id) VALUES (?,?,?)";
         $query = $this->pdo->prepare($sql);
         $save = $query->execute(array('', $data[0], $idsession));
         if ($save == true) {
           return true;
         }else {
           return false;
         }
       } catch (\Exception $e) {
         die($e->getMessage());
       }

     }

     public function verCargos(){
       try {
         $sql = " SELECT c.carg_nombre, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2
                  FROM cargo AS c, usuario AS u
                  WHERE c.usua_id = u.usua_id
                  AND c.carg_id > 1";
         $query = $this->pdo->prepare($sql);
         $const = $query->execute();
         $result = $query->fetchALL(PDO::FETCH_BOTH);
         if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
           return "";
         }else {
           return $result;
         }
       } catch (\Exception $e) {
         die($e->getMessage());
        }
      }

   }

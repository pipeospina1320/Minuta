<?php
require_once 'model/conn.model.php';

class VisitanteModel{
 private $pdo;
 public function __CONSTRUCT(){
   try{
     $this->pdo = DataBase::connect();
   }catch(Exception $e){
     die($e->getMessage());
   }
 }

 public function consultVisitantes($data){
   try{
     $sql = "SELECT visit_cedula, visit_id FROM visitante WHERE visit_cedula = ?";
     $query = $this->pdo->prepare($sql);
     $const = $query->execute(array($data));
     $const = $query->fetch();
     if ($const[0] == $data) {
       $sql = " SELECT v.visit_nombres, v.visit_apellidos, a.area_id, a.area_nombre, u.usua_id, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2, vt.vis_motivo, vt.vis_proveedor, v.visit_file
                FROM visitante AS v, visita AS vt, area AS a, usuario AS u
                WHERE vt.visit_id = v.visit_id
                AND vt.area_id = a.area_id
                AND vt.vis_usuario = u.usua_id
                AND vt.visit_id = ?
                ORDER BY vis_id DESC
                LIMIT 1";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($const[1]));
       $result = $query ->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
         return "";
       }else {
         return $result;
       }
     }else {
       return "";
     }

   } catch (\Exception $e){
     die($e->getMessage());
   }
 }

 public function selectAreaVisitar(){
   try {
     $sql = "SELECT * FROM area WHERE area_id != 16 ORDER BY area_nombre ASC";
     $query = $this->pdo->prepare($sql);
     $const= $query->execute();
     $const= $query->fetchALL(PDO::FETCH_BOTH);
     return $const;
   } catch (\Exception $e) {
     die($e->getMessage());
   }
 }

 public function searchAreaResponsable($data){
   try {
     $sql = " SELECT u.usua_id, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2, u.area_id
              FROM usuario AS u
              WHERE u.area_id = ?
              AND u.usua_estado = 1
              ORDER BY u.usua_nombre1 ASC";
     $query = $this->pdo->prepare($sql);
     $const= $query->execute(array($data));
     $const= $query->fetchALL(PDO::FETCH_BOTH);
     return $const;
   } catch (\Exception $e) {
     die($e->getMessage());
   }
 }

 public function createVisitas($visita){
   try {
     $sql = "SELECT visit_cedula, visit_id FROM visitante WHERE visit_cedula = ?";
     $query = $this->pdo->prepare($sql);
     $const = $query->execute(array($visita[0]));
     $const = $query->fetch();
     if ($const[0] == $visita[0]) {
       $sql1 = "SELECT vis_fechasalida FROM visita WHERE visit_id = ? ORDER BY vis_id DESC";
       $query1 = $this->pdo->prepare($sql1);
       $const1 = $query1->execute(array($const[1]));
       $const1 = $query1->fetch();
       if ($const1[0] != "0000-00-00 00:00:00") {
         session_start();
         $idusuario = $_SESSION["idusuario"];
         $sede = $_SESSION["sede"];
         $conver_fecha = date("Y-m-d H:i:s", strtotime($visita[6])); //Configuro el formato de hora
         $sql2 = "INSERT INTO visita (vis_id, visit_id, vis_motivo, vis_proveedor, area_id, vis_usuario, vis_fechaingreso, vis_usuaingreso, vis_sede) VALUES (?,?,?,?,?,?,?,?,?)";
         $query2 = $this->pdo->prepare($sql2);
         $save = $query2->execute(array('', $const[1], $visita[5], $visita[7], $visita[3], $visita[4], $conver_fecha, $idusuario, $sede));
         if ($save == true) {
           $sql6 = "SELECT visit_foto FROM visitante WHERE visit_id = ?";
           $query6 = $this->pdo->prepare($sql6);
           $const6 = $query6->execute(array($const[1]));
           $const6 = $query6->fetch();
           if ($const6[0] == "0") {
             return $const[1];
           }else if ($const6[0] == "1"){
             return "ingreso";
           }else {
             return "errores";
           }
         }else {
           return "errores";
         }
       }else {
          return "successingreso";
       }
     }else {
        $fichero = 'views/assets/images/user_250x187.png';
        $hoy = date("dmYgis");
        $nombrefile = 'user_250x187'.$hoy.'.png';
        $nuevo_fichero = 'views/assets/images/foto_visitante/'.$nombrefile.'';
        if (!copy($fichero, $nuevo_fichero)) {
            // echo "Error al copiar $fichero...\n";
        }
       session_start();
       $idusuario = $_SESSION["idusuario"];
       $conver_fecha = date("Y-m-d H:i:s", strtotime($visita[6])); //Configuro el formato de hora
       $sql2 = "INSERT INTO visitante (visit_id, visit_nombres, visit_apellidos, visit_cedula, usua_id, visit_file, visit_nomarchivo) VALUES (?,?,?,?,?,?,?)";
       $query2 = $this->pdo->prepare($sql2);
       $save2 = $query2->execute(array('', $visita[1], $visita[2], $visita[0], $idusuario, $nuevo_fichero, $nombrefile));
       $id = $this->pdo->lastInsertId();
       if ($save2 == true) {
         $sede = $_SESSION["sede"];
         $conver_fecha = date("Y-m-d H:i:s", strtotime($visita[6])); //Configuro el formato de hora
         $sql4 = "INSERT INTO visita (vis_id, visit_id, vis_motivo, vis_proveedor, area_id, vis_usuario, vis_fechaingreso, vis_usuaingreso, vis_sede) VALUES (?,?,?,?,?,?,?,?,?)";
         $query4 = $this->pdo->prepare($sql4);
         $save4 = $query4->execute(array('', $id, $visita[5], $visita[7], $visita[3], $visita[4], $conver_fecha, $idusuario, $sede));
         if ($save4 == true) {
           $sql7 = "SELECT visit_foto FROM visitante WHERE visit_id = ?";
           $query7 = $this->pdo->prepare($sql7);
           $const7 = $query7->execute(array($id));
           $const7 = $query7->fetch();
           if ($const7[0] == "0") {
             return $id;
           }else if ($const7[0] == "1"){
             return "ingreso";
           }else {
             return "errores";
           }
         }else {
           return "errores";
         }
       }else {
         return "errores";
       }
     }
   } catch (\Exception $e) {
     die($e->getMessage());
   }
 }

 public function createFotoWebcams($data, $filename, $direcionruta){
   try {
     $sql = "SELECT visit_file FROM visitante WHERE visit_id = ?";
     $query = $this->pdo->prepare($sql);
     $const = $query->execute(array($data));
     $result= $query->fetchALL(PDO::FETCH_BOTH);
     if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
       return false;
     }else {
       foreach ($result as $key => $value) {
         unlink($value[0]);
       }
       $estado = 1;
       session_start();
       $idusuario = $_SESSION["idusuario"];
       $sql1 = "UPDATE visitante SET visit_file=?, visit_nomarchivo=?, visit_foto=?, visit_tomafoto=? WHERE visit_id = ?";
       $query1 = $this->pdo->prepare($sql1);
       $save1 = $query1->execute(array($direcionruta, $filename, $estado, $idusuario, $data));
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

 public function consultaVisitantesHoy(){
   try {
     $data = $_SESSION["sede"];
     $sql= 'SELECT v.visit_cedula, v.visit_nombres, v.visit_apellidos, vs.vis_id, a.area_nombre, vs.vis_motivo, vs.vis_fechaingreso, vs.vis_fechasalida, vs.vis_sede, v.visit_file
              FROM visitante AS v, visita AS vs, area AS a
              WHERE v.visit_id = vs.visit_id
              AND vs.area_id = a.area_id
              AND vs.vis_fechasalida = "0000-00-00 00:00:00"
              AND vs.vis_sede = ?';
     $query = $this->pdo->prepare($sql);
     $const= $query->execute(array($data));
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

 public function consultaVisitantes(){
   try {
     $data = $_SESSION["sede"];
     $sql= 'SELECT v.visit_cedula, v.visit_nombres, v.visit_apellidos, a.area_nombre, vs.vis_motivo, vs.vis_proveedor, vs.vis_fechaingreso, vs.vis_fechasalida, s.sed_nombre, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2,
            uu.usua_nombre1 AS nombre1v, uu.usua_nombre2 AS nombre2v, uu.usua_apellido1 AS apellido1v, uu.usua_apellido2 AS apellido2v, uuu.usua_nombre1 AS nombre1vi, uuu.usua_nombre2 AS nombre2vi, uuu.usua_apellido1 AS apellido1vi, uuu.usua_apellido2 AS apellido2vi
            FROM visitante AS v, visita AS vs, area AS a, usuario AS u, sede AS s, usuario AS uu, usuario AS uuu
            WHERE v.visit_id = vs.visit_id
            AND vs.area_id = a.area_id
            AND vs.vis_sede = s.sed_id
            AND vs.vis_usuaingreso = uu.usua_id
            AND vs.vis_usuaegreso = uuu.usua_id
            AND vs.vis_usuario = u.usua_id
            AND vs.vis_sede = ?
            LIMIT 2000';
     $query = $this->pdo->prepare($sql);
     $const= $query->execute(array($data));
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

 public function consultaVisitantesTotal(){
   try {
     $sql= 'SELECT v.visit_cedula, v.visit_nombres, v.visit_apellidos, a.area_nombre, vs.vis_motivo, vs.vis_proveedor, vs.vis_fechaingreso, vs.vis_fechasalida, s.sed_nombre, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2,
            uu.usua_nombre1 AS nombre1v, uu.usua_nombre2 AS nombre2v, uu.usua_apellido1 AS apellido1v, uu.usua_apellido2 AS apellido2v,
            uuu.usua_nombre1 AS nombre1vi, uuu.usua_nombre2 AS nombre2vi, uuu.usua_apellido1 AS apellido1vi, uuu.usua_apellido2 AS apellido2vi
            FROM visitante AS v, visita AS vs, area AS a, usuario AS u, sede AS s, usuario AS uu, usuario AS uuu
            WHERE v.visit_id = vs.visit_id
            AND vs.area_id = a.area_id
            AND vs.vis_sede = s.sed_id
            AND vs.vis_usuaingreso = uu.usua_id
            AND vs.vis_usuaegreso = uuu.usua_id
            AND vs.vis_usuario = u.usua_id
            LIMIT 2000';
     $query = $this->pdo->prepare($sql);
     $const= $query->execute(array());
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

 public function darSalidaVisitantes($data){
   try {
     // print_r($data);
     session_start();
     $idusuario = $_SESSION["idusuario"];
     $fecha = date("Y-m-d H:i:s", strtotime($data[1])); //Configuro el formato de hora
     $sql = "UPDATE visita SET vis_fechasalida = ?, vis_usuaegreso = ? WHERE vis_id= ?";
     $query = $this->pdo->prepare($sql);
     $save = $query->execute(array($fecha, $idusuario, $data[0]));
     if ($save == true) {
       return true;
     }else {
       return false;
     }
   } catch (\Exception $e) {
     die($e->getMessage());
   }

 }

}

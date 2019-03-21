  <?php
require_once 'model/conn.model.php';

class EquipoModel{
   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }

   public function selecDispositivos(){
     try {
       $sql = "SELECT * FROM dispositivo WHERE dispo_id = 1 OR dispo_id = 2 OR dispo_id = 3";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function selectMarca(){
     try {
       $sql = "SELECT * FROM marca ORDER BY marc_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function frmcreateEquiposCelular($data){
     try {
       session_start();
       $idsession = $_SESSION["idusuario"];
       $conver_fecha = date("Y-m-d H:i:s", strtotime($data[11])); //Configuro el formato de hora
       $sql = "INSERT INTO equipo (equi_id, dispo_id, marc_id, equi_modelo, equi_serial, equi_imei1, equi_imei2, equi_estado, equi_numsimcard, equi_asignado, equi_puesto, equi_observacion, equi_fecha, usua_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array('', $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $conver_fecha, $idsession));
        // var_dump($save);
        if ($save == 1) {
         return true;
         }else {
          return false;
         }
     } catch (\Exception $e) {
        die($e->getMessage());
     }
   }

   public function frmcreateEquiposLaptop($data){
     try {
       session_start();
       $idsession = $_SESSION["idusuario"];
       $conver_fecha = date("Y-m-d H:i:s", strtotime($data[9])); //Configuro el formato de hora
       $sql = "INSERT INTO equipo (equi_id, dispo_id, marc_id, equi_modelo, equi_serial, equi_estado, equi_asignado, equi_puesto, equi_caracteristicas, equi_observacion, equi_fecha, usua_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array('', $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $conver_fecha, $idsession));
        // var_dump($save);
        if ($save == 1) {
         return true;
         }else {
          return false;
         }
     } catch (\Exception $e) {
        die($e->getMessage());
     }
   }

   public function consultaEquipos(){
     try {
       $idcliente = $_SESSION["idcliente"];
       $sql= "SELECT e.equi_id, e.dispo_id, d.dispo_nombre,  m.marc_nombre, e.equi_modelo,  e.equi_serial,  e.equi_estado,  DATE_FORMAT(e.equi_fecha, '%Y-%m-%d %H:%i') AS equi_fechas
              FROM equipo AS e
              INNER JOIN dispositivo AS d, marca AS m
              WHERE e.dispo_id = d.dispo_id
              AND e.marc_id = m.marc_id
              LIMIT 2000";
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

   public function ConsultDetalleEquipo($data){
     try {
       $sql= "SELECT e.equi_id, d.dispo_nombre,  m.marc_nombre, e.equi_modelo,  e.equi_serial, e.equi_imei1, e.equi_imei2, e.equi_estado, e.equi_numsimcard, e.equi_asignado, e.equi_puesto, e.equi_observacion, DATE_FORMAT(e.equi_fecha, '%Y-%m-%d %H:%i') AS equi_fechas
              FROM equipo AS e, dispositivo AS d, marca AS m
              WHERE e.dispo_id = d.dispo_id
              AND e.marc_id = m.marc_id
              AND e.equi_id = ?";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute(array($data));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
         return "";
       }else {
          return $result    ;
       }
     } catch (\Exception $e) {
       die($e->getMesagge());
     }
   }

   public function ConsultDetalleEquipoLaptop($data){
     try {
       $sql= "SELECT e.equi_id, d.dispo_nombre,  m.marc_nombre, e.equi_modelo,  e.equi_serial, e.equi_estado, e.equi_asignado, e.equi_puesto, e.equi_caracteristicas, e.equi_observacion, DATE_FORMAT(e.equi_fecha, '%Y-%m-%d %H:%i') AS equi_fechas
              FROM equipo AS e, dispositivo AS d, marca AS m
              WHERE e.dispo_id = d.dispo_id
              AND e.marc_id = m.marc_id
              AND e.equi_id = ?";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute(array($data));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
         return "";
       }else {
          return $result    ;
       }
     } catch (\Exception $e) {
       die($e->getMesagge());
     }
   }


   }

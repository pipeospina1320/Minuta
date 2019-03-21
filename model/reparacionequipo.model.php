  <?php
require_once 'model/conn.model.php';

class ReparacionEquipoModel{
   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }

   // Funcion para
   public function selectStatus(){
     try {
       $sql = "SELECT * FROM statu ORDER BY stat_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function selectArea(){
     try {
       $sql = "SELECT * FROM area ORDER BY area_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function selectDispositivo(){
     try {
       $sql = "SELECT * FROM dispositivo ORDER BY dispo_nombre ASC";
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

   public function selectProveedor(){
     try {
       $sql = "SELECT * FROM proveedor ORDER BY provee_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function selectTecnicos(){
     try {
       $sql = "SELECT u.usua_id, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2
                FROM usuario AS u
                WHERE u.carg_id = 8
                OR u.carg_id = 9
                ORDER BY u.usua_nombre1 ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function selectEstado(){
     try {
       $sql = "SELECT * FROM estadoequipo ORDER BY estequi_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function selectAsesor(){
     try {
       $sql = "SELECT * FROM asesor ORDER BY ase_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function selectRepatado(){
     try {
       $sql = "SELECT * FROM reparado ORDER BY rep_nombre ASC";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
       $const= $query->fetchALL(PDO::FETCH_BOTH);
       return $const;
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function searchNits($data){
     try {
       $sql = "SELECT clien_nit, clien_codverif FROM cliente WHERE clien_id = ?";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute(array($data));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
         return "";
       }else {
         return $result;
       }
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function searchClientes($data){
     try {
       $porciones = explode('-', $data);
       $sql = "SELECT * FROM cliente  WHERE clien_nit = ?";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute(array($porciones[0]));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
         return "";
       }else {
         return $result;
       }
     } catch (\Exception $e) {
       die($e->getMessage());
     }
   }

   public function frmcreateRepaEquipos($data, $dirc_file, $new_nom_archivo){
     try {
       session_start();
       $idsession = $_SESSION["idusuario"];
       $fechaequipo = date("Y-m-d H:i:s", strtotime($data[21]));
       $sql = "INSERT INTO reparacionequipo (re_id, re_puesto, re_modelo, re_serial, re_garantia, re_fecharetiro, re_fechaingreso, re_fechanoticliente, re_fechaenvio, rep_id, ase_id, re_falla, re_dianostico, re_observacion, clien_id, stat_id, area_id, dispo_id, marc_id, provee_id, usua_idrepara, estequi_id, usua_id, re_fecha, re_file, re_nomarchivo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array('', $data[1], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[14], $data[15], $data[18], $data[19], $data[20], $data[0], $data[2], $data[3], $data[4], $data[5], $data[13], $data[16], $data[17], $idsession, $fechaequipo, $dirc_file, $new_nom_archivo));
        if ($save == true) {
         return true;
         }else {
          return false;
         }
     } catch (\Exception $e) {
       die($e->getMesagge());
     }
   }

   public function ConsultReparacionEquipo(){
     try {
       $sql= "SELECT r.re_id, r.re_modelo, r.re_serial, r.re_garantia, r.re_fecharetiro, r.re_fechaingreso, r.re_fechanoticliente, r.re_fechaenvio, x.rep_nombre, w.ase_nombre, r.re_falla, r.re_dianostico, r.re_observacion, c.clien_nombre, s.stat_nombre, r.re_puesto,
              a.area_nombre, DATE_FORMAT(r.re_fecha , '%Y-%m-%d %H:%i ') AS fechaequipo, d.dispo_nombre, m.marc_nombre, p.provee_nombre, u1.usua_nombre1 AS nombre1_repara, u1.usua_nombre2 AS nombre2_repara, u1.usua_apellido1 AS apellido1_repara,
              u1.usua_apellido2 AS apellido2_repara, e.estequi_nombre, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2
              FROM reparacionequipo AS r
              INNER JOIN cliente AS c, statu AS s, area AS a, dispositivo AS d, marca AS m, proveedor AS p, usuario AS u1, estadoequipo AS e, usuario AS u, reparado AS x, asesor AS w
              WHERE r.clien_id = c.clien_id
              AND r.stat_id = s.stat_id
              AND r.area_id = a.area_id
              AND r.dispo_id = d.dispo_id
              AND r.marc_id = m.marc_id
              AND r.provee_id = p.provee_id
              AND r.usua_idrepara = u1.usua_id
              AND r.estequi_id = e.estequi_id
              AND r.rep_id = x.rep_id
              AND r.ase_id = w.ase_id
              AND r.usua_id = u.usua_id";
       $query = $this->pdo->prepare($sql);
       $const= $query->execute();
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

   public function ConsultDetalleReparacionEquipo($data){
     try {
       $sql= "SELECT r.*, c.clien_nombre, s.stat_nombre, a.area_nombre, d.dispo_nombre, m.marc_nombre, p.provee_nombre, x.rep_nombre, w.ase_nombre, u1.usua_nombre1 AS nombre1_repara, u1.usua_nombre2 AS nombre2_repara, u1.usua_apellido1 AS apellido1_repara,
              u1.usua_apellido2 AS apellido2_repara, e.estequi_nombre, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2
              FROM reparacionequipo AS r
              INNER JOIN cliente AS c, statu AS s, area AS a, dispositivo AS d, marca AS m, proveedor AS p, usuario AS u1, estadoequipo AS e, usuario AS u, reparado AS x, asesor AS w
              WHERE r.clien_id = c.clien_id
              AND r.stat_id = s.stat_id
              AND r.area_id = a.area_id
              AND r.dispo_id = d.dispo_id
              AND r.marc_id = m.marc_id
              AND r.provee_id = p.provee_id
              AND r.usua_idrepara = u1.usua_id
              AND r.estequi_id = e.estequi_id
              AND r.usua_id = u.usua_id
              AND r.rep_id = x.rep_id
              AND r.ase_id = w.ase_id
              AND r.re_id = ?";
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

   public function editarRepaEquipos($data, $dirc_file, $new_nom_archivo){
     try {
       $sql = "SELECT re_file FROM reparacionequipo WHERE re_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data[21]));
       $result= $query->fetchALL(PDO::FETCH_BOTH);
       foreach ($result as $key => $value) {
         unlink($value[0]);
       }

       session_start();
       $idsession = $_SESSION["idusuario"];
       $sql = "UPDATE reparacionequipo SET re_puesto=?, re_modelo=?, re_serial=?, re_garantia=?, re_fecharetiro=?, re_fechaingreso=?, re_fechanoticliente=?, re_fechaenvio=?, rep_id=?, ase_id=?, re_falla=?, re_dianostico=?, re_observacion=?, clien_id=?, stat_id=?, area_id=?, dispo_id=?, marc_id=?, provee_id=?, usua_idrepara=?, estequi_id=?, re_modifica=?, re_file=?, re_nomarchivo=? WHERE re_id=?";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array($data[1], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[14], $data[15], $data[18], $data[19], $data[20], $data[0], $data[2], $data[3], $data[4], $data[5], $data[13], $data[16], $data[17], $idsession, $dirc_file, $new_nom_archivo, $data[21]));
        // var_dump($save);
        if ($save == true) {
         return true;
         }else {
          return false;
         }
     } catch (\Exception $e) {
       die($e->getMesagge());
     }
    }





   }

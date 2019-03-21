  <?php
require_once 'model/conn.model.php';

class ServicioModel{
   private $pdo;
   public function __CONSTRUCT(){
     try{
       $this->pdo = DataBase::connect();
     }catch(Exception $e){
       die($e->getMessage());
     }
   }

   // Funcion para
   public function searchDataClients($data){
     try {
       $sql = "SELECT * FROM cliente WHERE clien_id = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($data));
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

   public function searchClientesSer($data){
     try {
       $porciones = explode('-', $data);
       $sql = "SELECT * FROM cliente  WHERE clien_nit = ?";
       $query = $this->pdo->prepare($sql);
       $const = $query->execute(array($porciones[0]));
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

   public function createServicioTecnico($data){
     try {
       session_start();
       $idsession = $_SESSION["idusuario"];
       $sql = "INSERT INTO serviciotecnico (ser_id, client_id, ser_direccion, ser_telefono, ser_fechareporte, ser_abonado, ser_personareporta, ser_sintomareporta, dispo_id, ser_fechaejecu, ser_horaentrada, ser_horasalida, ser_tipo, ser_descripcion, ser_terminado, ser_danofalla, ser_seguimiento, ser_facturar, usua_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $save = $query->execute(array('', $data[0][0], $data[0][1], $data[0][2], $data[0][4], $data[0][3], $data[0][5], $data[0][6], $data[0][7], $data[0][8], $data[0][9], $data[0][10], $data[1][0], $data[0][11], $data[2][0], $data[3][0], $data[0][12], $data[4][0], $idsession));
       $id = $this->pdo->lastInsertId();
        $icheck = $data[5];
        foreach ($icheck as $key) {
           $sql1= "INSERT INTO serviciotecnico_x_tiposervicio (ts_id, ser_id) VALUES (?,?)";
           $query1 = $this->pdo->prepare($sql1);
           $save1 = $query1->execute(array($key, $id));
        }
        if ($save == true && $save1 == true) {
          return true;
        }else {
          return false;
        }
     } catch (\Exception $e) {
       die($e->Message());
     }

   }


   }

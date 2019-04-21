<?php
require_once 'model/conn.model.php';


class NotificacionModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = DataBase::connect();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Funcion para
    public function notificationsProtocoloNumbers()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT COUNT(notip_leido) AS notip_leido FROM notificacionp WHERE notip_leido = 0 AND notip_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsConsignagNumbers()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT COUNT(noticg_leido) AS noticg_leido FROM notificacioncg WHERE noticg_leido = 0 AND noticg_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsConsignapNumbers()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT COUNT(noticp_leido) AS noticp_leido FROM notificacioncp WHERE noticp_leido = 0 AND noticp_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsCircularNumbers()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT COUNT(noticir_leido) AS noticir_leido FROM notificacioncir WHERE noticir_leido = 0 AND noticir_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsInstrucionNumbers()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT COUNT(notins_leido) AS notins_leido FROM notificacionins WHERE notins_leido = 0 AND notins_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsInstrucionManualNumbers()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT COUNT(notinsm_leido) AS notinsm_leido FROM notificacioninsm WHERE notinsm_leido = 0 AND notinsm_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }


    public function notificationsProtocoloIds()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT notip_notificacion FROM notificacionp WHERE notip_leido = 0 AND notip_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsConsignagIds()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT noticg_notificacion FROM notificacioncg WHERE noticg_leido = 0 AND noticg_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsConsignapIds()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT noticp_notificacion FROM notificacioncp WHERE noticp_leido = 0 AND noticp_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsCircularIds()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT noticir_notificacion FROM notificacioncir WHERE noticir_leido = 0 AND noticir_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsInstrucionIds()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT notins_notificacion FROM notificacionins WHERE notins_leido = 0 AND notins_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsInstrucionManualIds()
    {
        try {
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT notinsm_notificacion FROM notificacioninsm WHERE notinsm_leido = 0 AND notinsm_usuario = ? AND clien_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idsession, $idcliente));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $result;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsProtocolos($data)
    {
        try {
            $response = [];
            foreach ($data[0] as $key => $value) {
                $sql = 'SELECT p.proto_id, p.proto_titulo, p.proto_descripcion, p.proto_file, p.proto_nomarchivo, p.proto_fecha,
             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
             FROM protocolo AS p, usuario AS u
             WHERE p.proto_id = ?
             AND p.usua_id = u.usua_id';
                $query = $this->pdo->prepare($sql);
                $const = $query->execute(array($value[0]));
                $response[] = $query->fetchALL(PDO::FETCH_BOTH);
            }

            if (count($response) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $response;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsConsignasg($data)
    {
        try {
            $response = [];
            foreach ($data[0] as $key => $value) {
                $sql = 'SELECT c.consig_id, c.consig_titulo, c.consig_descripcion, c.consig_file, c.consig_nomarchivo, c.consig_fecha,
             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
             FROM consignageneral AS c, usuario AS u
             WHERE c.consig_id = ?
             AND c.usua_id = u.usua_id';
                $query = $this->pdo->prepare($sql);
                $const = $query->execute(array($value[0]));
                $response[] = $query->fetchALL(PDO::FETCH_BOTH);
            }

            if (count($response) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $response;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsConsignasp($data)
    {
        try {
            $response = [];
            foreach ($data[0] as $key => $value) {
                $sql = 'SELECT c.consigp_id, c.consigp_titulo, c.consigp_descripcion, c.consigp_file, c.consigp_nomarchivo, c.consigp_fecha,
             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
             FROM consignaparticular AS c, usuario AS u
             WHERE c.consigp_id = ?
             AND c.usua_id = u.usua_id';
                $query = $this->pdo->prepare($sql);
                $const = $query->execute(array($value[0]));
                $response[] = $query->fetchALL(PDO::FETCH_BOTH);
            }

            if (count($response) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $response;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsCirculares($data)
    {
        try {
            $response = [];
            foreach ($data[0] as $key => $value) {
                $sql = 'SELECT c.circu_id, c.circu_titulo, c.circu_descripcion, c.circu_file, c.circu_nomarchivo, c.circu_fecha,
             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
             FROM circular AS c, usuario AS u
             WHERE c.circu_id = ?
             AND c.usua_id = u.usua_id';
                $query = $this->pdo->prepare($sql);
                $const = $query->execute(array($value[0]));
                $response[] = $query->fetchALL(PDO::FETCH_BOTH);
            }

            if (count($response) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $response;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsInstruciones($data)
    {
        try {
            $response = [];
            foreach ($data[0] as $key => $value) {
                $sql = 'SELECT i.instru_id, i.instru_titulo, i.instru_descripcion, i.instru_file, i.instru_nomarchivo, i.instru_fecha,
             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
             FROM instruccion AS i, usuario AS u
             WHERE i.instru_id = ?
             AND i.usua_id = u.usua_id';
                $query = $this->pdo->prepare($sql);
                $const = $query->execute(array($value[0]));
                $response[] = $query->fetchALL(PDO::FETCH_BOTH);
            }

            if (count($response) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $response;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function notificationsInstruccionManuales($data)
    {
        try {
            $response = [];
            foreach ($data[0] as $key => $value) {
                $sql = 'SELECT i.instruman_id, i.instruman_descripcion, i.instruman_fecha, i.clien_id,
             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
             FROM instruccionmanual AS i, usuario AS u
             WHERE i.instruman_id = ?
             AND i.usua_id = u.usua_id';
                $query = $this->pdo->prepare($sql);
                $const = $query->execute(array($value[0]));
                $response[] = $query->fetchALL(PDO::FETCH_BOTH);
            }

            if (count($response) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $response;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrarNotiProtoLeidos($data)
    {
        try {
            session_start();
            $idsession = $_SESSION["idusuario"];
            $sql = 'UPDATE notificacionp SET notip_leido= 1 WHERE notip_notificacion = ? AND notip_usuario = ?';
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data, $idsession));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return true;
            } else {
                return false;
            }

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrarNotiCosnigLeidos($data)
    {
        try {
            session_start();
            $idsession = $_SESSION["idusuario"];
            $sql = 'UPDATE notificacioncg SET noticg_leido = 1 WHERE noticg_notificacion = ? AND noticg_usuario = ?';
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data, $idsession));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return true;
            } else {
                return false;
            }

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrarNotiCosnipLeidos($data)
    {
        try {
            session_start();
            $idsession = $_SESSION["idusuario"];
            $sql = 'UPDATE notificacioncp SET noticp_leido = 1 WHERE noticp_notificacion = ? AND noticp_usuario = ?';
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data, $idsession));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return true;
            } else {
                return false;
            }

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrarNotiCircuLeidos($data)
    {
        try {
            session_start();
            $idsession = $_SESSION["idusuario"];
            $sql = 'UPDATE notificacioncir SET noticir_leido = 1 WHERE noticir_notificacion = ? AND noticir_usuario = ?';
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data, $idsession));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return true;
            } else {
                return false;
            }

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrarNotiInstruLeidos($data)
    {
        try {
            session_start();
            $idsession = $_SESSION["idusuario"];
            $sql = 'UPDATE notificacionins SET notins_leido = 1 WHERE notins_notificacion = ? AND notins_usuario = ?';
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data, $idsession));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return true;
            } else {
                return false;
            }

        } catch (\Exception $e) {
            die - ($e->getMessage());
        }
    }

    public function searchNotificacionInstruManuales($data)
    {
        try {
            $sql = "SELECT i.instruman_id, i.instruman_descripcion, i.instruman_fecha, i.clien_id,
                CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
                FROM instruccionmanual AS i, usuario AS u
                WHERE i.instruman_id = ?
                AND i.usua_id = u.usua_id";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) { //Sin no arrojó resultados && se ejecutó
                $datos[] = array("res" => "error", "msn" => "");
                return json_encode($datos);
            } else {
                $datos[] = array("res" => "success", "msn" => $result);
                return json_encode($datos);
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function borrarNotiInstruManuLeidos($data)
    {
        try {
            session_start();
            $idsession = $_SESSION["idusuario"];
            $sql = 'UPDATE notificacioninsm SET notinsm_leido = 1 WHERE notinsm_notificacion = ? AND notinsm_usuario = ?';
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data, $idsession));
            $result = $query->fetchALL(PDO::FETCH_BOTH);
            if (count($result) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return true;
            } else {
                return false;
            }

        } catch (\Exception $e) {
            die - ($e->getMessage());
        }
    }


    public function consultaNotificacion()
    {
        try {
            $sqlp = 'SELECT p.proto_id, p.proto_titulo, p.proto_descripcion, p.proto_file, p.proto_nomarchivo, p.proto_fecha,
             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
             FROM notificacionp ntp JOIN protocolo AS p ON ntp.notip_notificacion = p.proto_id, usuario AS u
             WHERE ntp.notip_id > 0
             AND p.usua_id = u.usua_id';
            $query = $this->pdo->prepare($sqlp);
            $const = $query->execute();
            $response[] = $query->fetchALL(PDO::FETCH_BOTH);
//
//
//            $sql = 'SELECT c.consig_id, c.consig_titulo, c.consig_descripcion, c.consig_file, c.consig_nomarchivo, c.consig_fecha,
//             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
//             FROM consignageneral AS c, usuario AS u
//             WHERE c.consig_id = ?
//             AND c.usua_id = u.usua_id';
//
//
//            $sql = 'SELECT c.consigp_id, c.consigp_titulo, c.consigp_descripcion, c.consigp_file, c.consigp_nomarchivo, c.consigp_fecha,
//             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
//             FROM consignaparticular AS c, usuario AS u
//             WHERE c.consigp_id = ?
//             AND c.usua_id = u.usua_id';
//
//
//            $sql = 'SELECT c.circu_id, c.circu_titulo, c.circu_descripcion, c.circu_file, c.circu_nomarchivo, c.circu_fecha,
//             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
//             FROM circular AS c, usuario AS u
//             WHERE c.circu_id = ?
//             AND c.usua_id = u.usua_id';
//
//            $sql = 'SELECT i.instru_id, i.instru_titulo, i.instru_descripcion, i.instru_file, i.instru_nomarchivo, i.instru_fecha,
//             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
//             FROM instruccion AS i, usuario AS u
//             WHERE i.instru_id = ?
//             AND i.usua_id = u.usua_id';
//
//
//            $sql = 'SELECT i.instruman_id, i.instruman_descripcion, i.instruman_fecha, i.clien_id,
//             CONCAT(UPPER(LEFT(u.usua_nombre1, 1)), LOWER(SUBSTRING(u.usua_nombre1,2))) AS usua_nombre1, CONCAT(UPPER(LEFT(u.usua_apellido1, 1)), LOWER(SUBSTRING(u.usua_apellido1,2))) AS usua_apellido1
//             FROM instruccionmanual AS i, usuario AS u
//             WHERE i.instruman_id = ?
//             AND i.usua_id = u.usua_id';
//

            if (count($response) == 0 && $const == 1) {//Sin no arrojó resultados && se ejecutó
                return "";
            } else {
                return $response;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

}

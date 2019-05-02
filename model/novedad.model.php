<?php
require_once 'model/conn.model.php';

class NovedadModel
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

    // Funcion para crear una novedad
    public function createNovedades($novedad, $dirc_file, $new_nom_archivo, $dirc_firma1, $dirc_firma2)
    {
        try {
            session_start();
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $conver_fecha = date("Y-m-d H:i:s", strtotime($novedad[5])); //Configuro el formato de hora
            $conver_fechareal = date("Y-m-d H:i:s", strtotime($novedad[6])); //Configuro el formato de hora
            $foto = 1;
            $sql = "INSERT INTO novedad (clien_id, sed_id, servi_id, nove_turno , nove_novedad, nove_fecha, nove_fechareal, usua_id, tn_id, nove_file, nove_nomarchivo, nove_foto,firma1_file,firma2_file) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $this->pdo->prepare($sql);
            $save = $query->execute(array($idcliente, $novedad[0], $novedad[1], $novedad[2], $novedad[4], $conver_fecha, $conver_fechareal, $idsession, $novedad[3], $dirc_file, $new_nom_archivo, $foto, $dirc_firma1, $dirc_firma2));
            $error = $query->errorInfo();
            if ($save == 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }


    // Funcion para crear una novedad
    public function createNovedad($novedad, $dirc_firma1, $dirc_firma2)
    {
        try {
            session_start();
            $idsession = $_SESSION["idusuario"];
            $idcliente = $_SESSION["idcliente"];
            $conver_fecha = date("Y-m-d H:i:s", strtotime($novedad[5])); //Configuro el formato de hora
            $conver_fechareal = date("Y-m-d H:i:s", strtotime($novedad[6])); //Configuro el formato de hora
            $sql = "INSERT INTO novedad (clien_id, sed_id, servi_id, nove_turno , nove_novedad, nove_fecha, nove_fechareal, usua_id, tn_id,firma1_file,firma2_file) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $query = $this->pdo->prepare($sql);
            $save = $query->execute(array($idcliente, $novedad[0], $novedad[1], $novedad[2], $novedad[4], $conver_fecha, $conver_fechareal, $idsession, $novedad[3], $dirc_firma1, $dirc_firma2));
            // var_dump($save);
            if ($save == 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //Funcion para consultar cliente en orden asendente
    public function selectClient()
    {
        try {
            $sql = "SELECT * FROM cliente ORDER BY cliente.clien_nombre ASC";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute();
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    //funcion para seleccionar Sedes
    function selectSedes()
    {
        try {
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT * FROM sede WHERE sed_id <> 4 AND sed_id <> 17 AND sed_id <> 8 AND sed_id <> 15 AND clien_id = ? ORDER BY sed_nombre ASC";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idcliente));
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //funcion para seleccionar Sedes 2
    function selectSedes2()
    {
        try {
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT * FROM sede WHERE clien_id = ? ORDER BY sed_nombre ASC";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idcliente));
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

    //Funcion para cosnultar los tipos de servicios
    public function selectServicio()
    {
        try {
            $sql = "SELECT * FROM servicio ORDER BY servicio.servi_nombre ASC";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute();
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function selecTipoNovedads()
    {
        try {
            $sql = "SELECT * FROM tiponovedad ORDER BY tiponovedad.tn_nombre ASC";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute();
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    //funcio para consultar las sedes
    public function readCliente($dato)
    {
        try {
            $sql = "SELECT sede.sed_id, sede.sed_nombre FROM sede WHERE sede.clien_id = ? ORDER BY sede.sed_nombre ASC";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($dato));
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    // Funcion para consultar todas las novedades
    public function consultNovedad()
    {
        try {
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT c.clien_nombre,  s.sed_nombre, e.servi_nombre,  n.nove_turno, t.tn_nombre, n.nove_novedad,  DATE_FORMAT(n.nove_fecha, '%Y-%m-%d %H:%i') AS nove_fechas, DATE_FORMAT(n.nove_fechareal, '%Y-%m-%d %H:%i') AS nove_fechasreal,  u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2,
              n.nove_foto, n.nove_id, n.nove_estado
              FROM novedad AS n
              INNER JOIN usuario AS u, cliente AS c, sede AS s, servicio AS e, tiponovedad AS t
              WHERE n.usua_id = u.usua_id
              AND n.clien_id = c.clien_id
              AND n.sed_id = s.sed_id
              AND n.servi_id = e.servi_id
			        AND n.tn_id = t.tn_id
              AND c.clien_id = ?
              ORDER BY n.nove_fecha DESC
              LIMIT 1000";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idcliente));
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

    // Funcion para consultar todas las novedades
    public function consultFiltroNovedad($fechaInicio = "", $fechaFin = "", $tn_novedad = "", $sede)
    {
        try {
            if (!isset($_SESSION)) {
                session_start();
            }
            $parametros[] = $_SESSION["idcliente"];
            $sql = "SELECT c.clien_nombre,  s.sed_nombre, e.servi_nombre,  n.nove_turno, t.tn_nombre, n.nove_novedad,  DATE_FORMAT(n.nove_fecha, '%Y-%m-%d %H:%i') AS nove_fechas, DATE_FORMAT(n.nove_fechareal, '%Y-%m-%d %H:%i') AS nove_fechasreal,  u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2,
              n.nove_foto, n.nove_id, n.nove_estado, n.nove_file
              FROM novedad AS n
              INNER JOIN usuario AS u, cliente AS c, sede AS s, servicio AS e, tiponovedad AS t
              WHERE n.usua_id = u.usua_id
              AND n.clien_id = c.clien_id
              AND n.sed_id = s.sed_id
              AND n.servi_id = e.servi_id
			  AND n.tn_id = t.tn_id
			  AND c.clien_id = ?";
            if ($fechaInicio != "") {
                $parametros[] = $fechaInicio;
                $sql .= " AND n.nove_fecha >= ?";
            }
            if ($fechaFin != "") {
                $parametros[] = $fechaFin;
                $sql .= " AND n.nove_fecha <= ?";
            }
            if ($tn_novedad != "") {
                $parametros[] = $tn_novedad;
                $sql .= " AND n.tn_id = ?";
            }
            if ($sede != "") {
                $parametros[] = $sede;
                $sql .= " AND n.sed_id = ?";
            }
            $sql .= " ORDER BY n.nove_fecha DESC LIMIT 1000";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute($parametros);
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

    public function consultNovedadTotal()
    {
        try {
            $idcliente = $_SESSION["idcliente"];
            $sql = "SELECT c.clien_nombre,  s.sed_nombre, e.servi_nombre,  n.nove_turno, t.tn_nombre, n.nove_novedad,  DATE_FORMAT(n.nove_fecha, '%Y-%m-%d %H:%i') AS nove_fechas, DATE_FORMAT(n.nove_fechareal, '%Y-%m-%d %H:%i') AS nove_fechasreal,  u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2,
              n.nove_foto, n.nove_id, n.nove_estado
              FROM novedad AS n
              INNER JOIN usuario AS u, cliente AS c, sede AS s, servicio AS e, tiponovedad AS t
              WHERE n.usua_id = u.usua_id
              AND n.clien_id = c.clien_id
              AND n.sed_id = s.sed_id
              AND n.servi_id = e.servi_id
              AND n.tn_id = t.tn_id
              AND c.clien_id = ?
              ORDER BY n.nove_fecha DESC
              LIMIT 1000000";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($idcliente));
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

    public function buscarFotoEvidencias($data)
    {
        try {
            $sql = "SELECT n.nove_file FROM novedad AS n WHERE nove_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data));
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            $const = explode(",", $const[0][0]);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function searchNovedades($data)
    {
        try {
            $sql = "SELECT n.nove_id, n.nove_novedad, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2
                FROM novedad AS n , usuario AS u
                WHERE u.usua_id = n.usua_id
                AND n.nove_id =  ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data));
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function consultaNovedad($data)
    {
        try {
            $sql = "SELECT n.* , c.*, s.*, se.*, u.*, car.*
                FROM novedad AS n 
                JOIN cliente c ON n.clien_id = c.clien_id
                JOIN sede s ON n.sed_id = s.sed_id
                JOIN servicio se ON n.servi_id = se.servi_id
                JOIN usuario u ON n.usua_id = u.usua_id
                JOIN cargo car ON u.carg_id = car.carg_id
                AND n.nove_id =  ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data));
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    // Funcion para crear una observación
    public function createObservaciones($novedad)
    {
        try {
            session_start();
            $idsession = $_SESSION["idusuario"];
            $conver_fecha = date("Y-m-d H:i:s", strtotime($novedad[1])); //Configuro el formato de hora
            $estado = 1;
            $sql = "UPDATE novedad SET nove_estado=?, nove_observacion=?, nove_fechaobser=?, nove_userobser=?  WHERE nove_id=?";
            $query = $this->pdo->prepare($sql);
            $result = $query->execute(array($estado, $novedad[2], $conver_fecha, $idsession, $novedad[0]));
            // var_dump($save);
            if ($result == 1) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public function searchObservacions($data)
    {
        try {
            $sql = "SELECT n.nove_observacion, u.usua_nombre1, u.usua_nombre2, u.usua_apellido1, u.usua_apellido2
                FROM novedad AS n , usuario AS u
                WHERE u.usua_id = n.nove_userobser
                AND n.nove_id = ?";
            $query = $this->pdo->prepare($sql);
            $const = $query->execute(array($data));
            $const = $query->fetchALL(PDO::FETCH_BOTH);
            return $const;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

}

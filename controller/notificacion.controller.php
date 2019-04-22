<?php
require_once 'model/notificacion.model.php';
require_once 'controller/protocolo.controller.php';

class NotificacionController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new NotificacionModel();
    }

    // Funcion para
    public function wiewsReporNotification()
    {
        $title = "Notificaciones";
        require_once 'views/include/headar.php';
        require_once 'views/modules/mod_notificacion/consultaNotificacion.php';
        require_once 'views/include/footer.php';
    }

    public function notificationsProtocoloNumber()
    {
        $const = $this->model->notificationsProtocoloNumbers();
        foreach ($const as $key => $value) {
            return $value["notip_leido"];
        }
    }

    public function notificationsConsignagNumber()
    {
        $const = $this->model->notificationsConsignagNumbers();
        foreach ($const as $key => $value) {
            return $value["noticg_leido"];
        }
    }

    public function notificationsConsignapNumber()
    {
        $const = $this->model->notificationsConsignapNumbers();
        foreach ($const as $key => $value) {
            return $value["noticp_leido"];
        }
    }

    public function notificationsCircularNumber()
    {
        $const = $this->model->notificationsCircularNumbers();
        foreach ($const as $key => $value) {
            return $value["noticir_leido"];
        }
    }

    public function notificationsInstrucionNumber()
    {
        $const = $this->model->notificationsInstrucionNumbers();
        foreach ($const as $key => $value) {
            return $value["notins_leido"];
        }
    }

    public function notificationsInstrucionManualNumber()
    {
        $const = $this->model->notificationsInstrucionManualNumbers();
        foreach ($const as $key => $value) {
            return $value["notinsm_leido"];
        }
    }

    public function notificationsProtocoloId()
    {
        $const = $this->model->notificationsProtocoloIds();
        return $const;
    }

    public function notificationsConsignagId()
    {
        $const = $this->model->notificationsConsignagIds();
        return $const;
    }

    public function notificationsConsignapId()
    {
        $const = $this->model->notificationsConsignapIds();
        return $const;
    }

    public function notificationsCircularId()
    {
        $const = $this->model->notificationsCircularIds();
        return $const;
    }

    public function notificationsInstrucionId()
    {
        $const = $this->model->notificationsInstrucionIds();
        return $const;
    }

    public function notificationsInstrucionManualId()
    {
        $const = $this->model->notificationsInstrucionManualIds();
        return $const;
    }

    public function notificationsProtocolo()
    {
        $data = NotificacionController::notificationsProtocoloId();
        if (!empty($data)) {
            $const = $this->model->notificationsProtocolos(array($data));
            if ($const != "") {
                foreach ($const as $key) {
                    foreach ($key as $value) {
                        echo '       <li>
                          <a href="' . $value["proto_file"] . '" id="borrarnotyproto" data-idnotiproto="' . $value["proto_id"] . '">
                            <span class="image"><img src="views/assets/images/user.png" alt="Profile Image" /></span>
                            <span>
                              <span>' . $value["usua_nombre1"] . ' ' . $value["usua_apellido1"] . '</span><br>
                              <span style="font-weight:bold; font-style:oblique">';
                        $fecha1 = new DateTime($value["proto_fecha"]);//fecha inicial
                        ini_set('date.timezone', 'America/Bogota');
                        $fecha2 = new DateTime(date("Y-m-d H:i:s"));//fecha de cierre
                        $intervalo = $fecha1->diff($fecha2);
                        if ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0 && $intervalo->format('%h') == 0) {
                            if ($intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %i minuto");
                            } else {
                                echo $intervalo->format("Hace %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0) {
                            if ($intervalo->format("%h") < 2 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h hora %i minuto");
                            } elseif ($intervalo->format("%h") < 2 && $intervalo->format("%i") > 1) {
                                echo $intervalo->format("Hace %h hora y %i minutos");
                            } elseif ($intervalo->format("%h") > 1 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h horas %i minuto");
                            } else {
                                echo $intervalo->format("Hace %h horas %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0) {
                            if ($intervalo->format('%d') < 2) {
                                echo $intervalo->format("Ayer");
                            } elseif ($intervalo->format('%d') == 2) {
                                echo $intervalo->format("AnteAyer");
                            } else {
                                echo $intervalo->format('Hace %d dias');
                            }
                        } elseif ($intervalo->format('%y') == 0) {
                            if ($intervalo->format('%m') < 2) {
                                echo $intervalo->format('Hace %m mes');
                            } else {
                                echo $intervalo->format('Hace %m meses');
                            }
                        } else {
                            if ($intervalo->format('%y') < 2) {
                                echo $intervalo->format('Hace %y año');
                            } else {
                                echo $intervalo->format('Hace %y años');
                            }
                        }

                        echo '</span>
                            <br></span>
                            <span class="message">
                              Creo un protocolo nuevo, contiene la siguiente información de interés: ';
                        if (strlen($value["proto_descripcion"]) > 25) {
                            $data = substr($value["proto_descripcion"], 0, 25);
                            $data = $data . "...";
                            echo $data;
                        } else {
                            echo $value["proto_descripcion"] . "...";
                        }
                        echo '
                            </span>
                          </a>
                        </li>';
                    }
                }
            }
        }
    }

    public function notificationsConsignag()
    {
        $data = NotificacionController::notificationsConsignagId();
        if (!empty($data)) {
            $const = $this->model->notificationsConsignasg(array($data));
            if ($const != "") {
                foreach ($const as $key) {
                    foreach ($key as $value) {
                        echo '       <li>
                          <a href="' . $value["consig_file"] . '" id="borrarnotyconsig" data-idnoticonsig="' . $value["consig_id"] . '">
                            <span class="image"><img src="views/assets/images/user.png" alt="Profile Image" /></span>
                            <span>
                              <span>' . $value["usua_nombre1"] . ' ' . $value["usua_apellido1"] . '</span><br>
                              <span style="font-weight:bold; font-style:oblique">';
                        $fecha1 = new DateTime($value["consig_fecha"]);//fecha inicial
                        ini_set('date.timezone', 'America/Bogota');
                        $fecha2 = new DateTime(date("Y-m-d H:i:s"));//fecha de cierre
                        $intervalo = $fecha1->diff($fecha2);
                        if ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0 && $intervalo->format('%h') == 0) {
                            if ($intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %i minuto");
                            } else {
                                echo $intervalo->format("Hace %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0) {
                            if ($intervalo->format("%h") < 2 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h hora %i minuto");
                            } elseif ($intervalo->format("%h") < 2 && $intervalo->format("%i") > 1) {
                                echo $intervalo->format("Hace %h hora y %i minutos");
                            } elseif ($intervalo->format("%h") > 1 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h horas %i minuto");
                            } else {
                                echo $intervalo->format("Hace %h horas %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0) {
                            if ($intervalo->format('%d') < 2) {
                                echo $intervalo->format("Ayer");
                            } elseif ($intervalo->format('%d') == 2) {
                                echo $intervalo->format("AnteAyer");
                            } else {
                                echo $intervalo->format('Hace %d dias');
                            }
                        } elseif ($intervalo->format('%y') == 0) {
                            if ($intervalo->format('%m') < 2) {
                                echo $intervalo->format('Hace %m mes');
                            } else {
                                echo $intervalo->format('Hace %m meses');
                            }
                        } else {
                            if ($intervalo->format('%y') < 2) {
                                echo $intervalo->format('Hace %y año');
                            } else {
                                echo $intervalo->format('Hace %y años');
                            }
                        }

                        echo '</span>
                            <br></span>
                            <span class="message">
                              Creo una consigna general nueva, contiene la siguiente información de interés: ';
                        if (strlen($value["consig_descripcion"]) > 25) {
                            $data = substr($value["consig_descripcion"], 0, 25);
                            $data = $data . "...";
                            echo $data;
                        } else {
                            echo $value["consig_descripcion"] . "...";
                        }
                        echo '
                            </span>
                          </a>
                        </li>';
                    }
                }
            }
        }
    }

    public function notificationsConsignap()
    {
        $data = NotificacionController::notificationsConsignapId();
        if (!empty($data)) {
            $const = $this->model->notificationsConsignasp(array($data));
            if ($const != "") {
                foreach ($const as $key) {
                    foreach ($key as $value) {
                        echo '       <li>
                          <a href="' . $value["consigp_file"] . '" id="borrarnotyconsip" data-idnoticonsip="' . $value["consigp_id"] . '">
                            <span class="image"><img src="views/assets/images/user.png" alt="Profile Image" /></span>
                            <span>
                              <span>' . $value["usua_nombre1"] . ' ' . $value["usua_apellido1"] . '</span><br>
                              <span style="font-weight:bold; font-style:oblique">';
                        $fecha1 = new DateTime($value["consigp_fecha"]);//fecha inicial
                        ini_set('date.timezone', 'America/Bogota');
                        $fecha2 = new DateTime(date("Y-m-d H:i:s"));//fecha de cierre
                        $intervalo = $fecha1->diff($fecha2);
                        if ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0 && $intervalo->format('%h') == 0) {
                            if ($intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %i minuto");
                            } else {
                                echo $intervalo->format("Hace %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0) {
                            if ($intervalo->format("%h") < 2 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h hora %i minuto");
                            } elseif ($intervalo->format("%h") < 2 && $intervalo->format("%i") > 1) {
                                echo $intervalo->format("Hace %h hora y %i minutos");
                            } elseif ($intervalo->format("%h") > 1 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h horas %i minuto");
                            } else {
                                echo $intervalo->format("Hace %h horas %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0) {
                            if ($intervalo->format('%d') < 2) {
                                echo $intervalo->format("Ayer");
                            } elseif ($intervalo->format('%d') == 2) {
                                echo $intervalo->format("AnteAyer");
                            } else {
                                echo $intervalo->format('Hace %d dias');
                            }
                        } elseif ($intervalo->format('%y') == 0) {
                            if ($intervalo->format('%m') < 2) {
                                echo $intervalo->format('Hace %m mes');
                            } else {
                                echo $intervalo->format('Hace %m meses');
                            }
                        } else {
                            if ($intervalo->format('%y') < 2) {
                                echo $intervalo->format('Hace %y año');
                            } else {
                                echo $intervalo->format('Hace %y años');
                            }
                        }

                        echo '</span>
                            <br></span>
                            <span class="message">
                              Creo una consigna partircular nueva, contiene la siguiente información de interés: ';
                        if (strlen($value["consigp_descripcion"]) > 25) {
                            $data = substr($value["consigp_descripcion"], 0, 25);
                            $data = $data . "...";
                            echo $data;
                        } else {
                            echo $value["consigp_descripcion"] . "...";
                        }
                        echo '
                            </span>
                          </a>
                        </li>';
                    }
                }
            }
        }
    }

    public function notificationsCircular()
    {
        $data = NotificacionController::notificationsCircularId();
        if (!empty($data)) {
            $const = $this->model->notificationsCirculares(array($data));
            if ($const != "") {
                foreach ($const as $key) {
                    foreach ($key as $value) {
                        echo '       <li>
                          <a href="' . $value["circu_file"] . '" id="borrarnotycircu" data-idnoticircu="' . $value["circu_id"] . '">
                            <span class="image"><img src="views/assets/images/user.png" alt="Profile Image" /></span>
                            <span>
                              <span>' . $value["usua_nombre1"] . ' ' . $value["usua_apellido1"] . '</span><br>
                              <span style="font-weight:bold; font-style:oblique">';
                        $fecha1 = new DateTime($value["circu_fecha"]);//fecha inicial
                        ini_set('date.timezone', 'America/Bogota');
                        $fecha2 = new DateTime(date("Y-m-d H:i:s"));//fecha de cierre
                        $intervalo = $fecha1->diff($fecha2);
                        if ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0 && $intervalo->format('%h') == 0) {
                            if ($intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %i minuto");
                            } else {
                                echo $intervalo->format("Hace %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0) {
                            if ($intervalo->format("%h") < 2 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h hora %i minuto");
                            } elseif ($intervalo->format("%h") < 2 && $intervalo->format("%i") > 1) {
                                echo $intervalo->format("Hace %h hora y %i minutos");
                            } elseif ($intervalo->format("%h") > 1 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h horas %i minuto");
                            } else {
                                echo $intervalo->format("Hace %h horas %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0) {
                            if ($intervalo->format('%d') < 2) {
                                echo $intervalo->format("Ayer");
                            } elseif ($intervalo->format('%d') == 2) {
                                echo $intervalo->format("AnteAyer");
                            } else {
                                echo $intervalo->format('Hace %d dias');
                            }
                        } elseif ($intervalo->format('%y') == 0) {
                            if ($intervalo->format('%m') < 2) {
                                echo $intervalo->format('Hace %m mes');
                            } else {
                                echo $intervalo->format('Hace %m meses');
                            }
                        } else {
                            if ($intervalo->format('%y') < 2) {
                                echo $intervalo->format('Hace %y año');
                            } else {
                                echo $intervalo->format('Hace %y años');
                            }
                        }

                        echo '</span>
                            <br></span>
                            <span class="message">
                              Creo una circular nueva, contiene la siguiente información de interés: ';
                        if (strlen($value["circu_descripcion"]) > 25) {
                            $data = substr($value["circu_descripcion"], 0, 25);
                            $data = $data . "...";
                            echo $data;
                        } else {
                            echo $value["circu_descripcion"] . "...";
                        }
                        echo '
                            </span>
                          </a>
                        </li>';
                    }
                }
            }
        }
    }

    public function notificationsInstrucion()
    {
        $data = NotificacionController::notificationsInstrucionId();
        if (!empty($data)) {
            $const = $this->model->notificationsInstruciones(array($data));
            if ($const != "") {
                foreach ($const as $key) {
                    foreach ($key as $value) {
                        echo '       <li>
                          <a href="' . $value["instru_file"] . '" id="borrarnotyinstru" data-idnotiinstru="' . $value["instru_id"] . '">
                            <span class="image"><img src="views/assets/images/user.png" alt="Profile Image" /></span>
                            <span>
                              <span>' . $value["usua_nombre1"] . ' ' . $value["usua_apellido1"] . '</span><br>
                              <span style="font-weight:bold; font-style:oblique">';
                        $fecha1 = new DateTime($value["instru_fecha"]);//fecha inicial
                        ini_set('date.timezone', 'America/Bogota');
                        $fecha2 = new DateTime(date("Y-m-d H:i:s"));//fecha de cierre
                        $intervalo = $fecha1->diff($fecha2);
                        if ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0 && $intervalo->format('%h') == 0) {
                            if ($intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %i minuto");
                            } else {
                                echo $intervalo->format("Hace %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0) {
                            if ($intervalo->format("%h") < 2 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h hora %i minuto");
                            } elseif ($intervalo->format("%h") < 2 && $intervalo->format("%i") > 1) {
                                echo $intervalo->format("Hace %h hora y %i minutos");
                            } elseif ($intervalo->format("%h") > 1 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h horas %i minuto");
                            } else {
                                echo $intervalo->format("Hace %h horas %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0) {
                            if ($intervalo->format('%d') < 2) {
                                echo $intervalo->format("Ayer");
                            } elseif ($intervalo->format('%d') == 2) {
                                echo $intervalo->format("AnteAyer");
                            } else {
                                echo $intervalo->format('Hace %d dias');
                            }
                        } elseif ($intervalo->format('%y') == 0) {
                            if ($intervalo->format('%m') < 2) {
                                echo $intervalo->format('Hace %m mes');
                            } else {
                                echo $intervalo->format('Hace %m meses');
                            }
                        } else {
                            if ($intervalo->format('%y') < 2) {
                                echo $intervalo->format('Hace %y año');
                            } else {
                                echo $intervalo->format('Hace %y años');
                            }
                        }

                        echo '</span>
                            <br></span>
                            <span class="message">
                              Creo una instrucción nueva, contiene la siguiente información de interés: ';
                        if (strlen($value["instru_descripcion"]) > 20) {
                            $data = substr($value["instru_descripcion"], 0, 20);
                            $data = $data . "...";
                            echo $data;
                        } else {
                            echo $value["instru_descripcion"] . "...";
                        }
                        echo '
                            </span>
                          </a>
                        </li>';
                    }
                }
            }
        }
    }

    public function notificationsInstruccionManual()
    {
        $data = NotificacionController::notificationsInstrucionManualId();
        if (!empty($data)) {
            $const = $this->model->notificationsInstruccionManuales(array($data));
            if ($const != "") {
                foreach ($const as $key) {
                    foreach ($key as $value) {
                        echo '       <li>
                          <a id="borrarnotyinstrumanu" data-idnotiproto="' . $value["instruman_id"] . '">
                            <span class="image"><img src="views/assets/images/user.png" alt="Profile Image" /></span>
                            <span>
                              <span>' . $value["usua_nombre1"] . ' ' . $value["usua_apellido1"] . '</span><br>
                              <span style="font-weight:bold; font-style:oblique">';
                        $fecha1 = new DateTime($value["instruman_fecha"]);//fecha inicial
                        ini_set('date.timezone', 'America/Bogota');
                        $fecha2 = new DateTime(date("Y-m-d H:i:s"));//fecha de cierre
                        $intervalo = $fecha1->diff($fecha2);
                        if ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0 && $intervalo->format('%h') == 0) {
                            if ($intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %i minuto");
                            } else {
                                echo $intervalo->format("Hace %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0 && $intervalo->format('%d') == 0) {
                            if ($intervalo->format("%h") < 2 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h hora %i minuto");
                            } elseif ($intervalo->format("%h") < 2 && $intervalo->format("%i") > 1) {
                                echo $intervalo->format("Hace %h hora y %i minutos");
                            } elseif ($intervalo->format("%h") > 1 && $intervalo->format("%i") < 2) {
                                echo $intervalo->format("Hace %h horas %i minuto");
                            } else {
                                echo $intervalo->format("Hace %h horas %i minutos");
                            }
                        } elseif ($intervalo->format('%y') == 0 && $intervalo->format('%m') == 0) {
                            if ($intervalo->format('%d') < 2) {
                                echo $intervalo->format("Ayer");
                            } elseif ($intervalo->format('%d') == 2) {
                                echo $intervalo->format("AnteAyer");
                            } else {
                                echo $intervalo->format('Hace %d dias');
                            }
                        } elseif ($intervalo->format('%y') == 0) {
                            if ($intervalo->format('%m') < 2) {
                                echo $intervalo->format('Hace %m mes');
                            } else {
                                echo $intervalo->format('Hace %m meses');
                            }
                        } else {
                            if ($intervalo->format('%y') < 2) {
                                echo $intervalo->format('Hace %y año');
                            } else {
                                echo $intervalo->format('Hace %y años');
                            }
                        }

                        echo '</span>
                            <br></span>
                            <span class="message">
                              Creo una instrucción manual nuevo, contiene la siguiente información de interés: ';
                        if (strlen($value["instruman_descripcion"]) > 15) {
                            $data = substr($value["instruman_descripcion"], 0, 15);
                            $data = $data . "...";
                            echo $data;
                        } else {
                            echo $value["instruman_descripcion"] . "...";
                        }
                        echo '
                            </span>
                          </a>
                        </li>';
                    }
                }
            }
        }
    }

    public function numbersNotification()
    {
        $numberproto = NotificacionController::notificationsProtocoloNumber();
        $numberconsigg = NotificacionController::notificationsConsignagNumber();
        $numberconsigp = NotificacionController::notificationsConsignapNumber();
        $numbercircular = NotificacionController::notificationsCircularNumber();
        $numberinstruccion = NotificacionController::notificationsInstrucionNumber();
        $numberinstruccionnmanueal = NotificacionController::notificationsInstrucionManualNumber();
        $totalnumber = $numberproto + $numberconsigg + $numberconsigp + $numbercircular + $numberinstruccion + $numberinstruccionnmanueal;
        return $totalnumber;
    }


    public function reportNotification()
    {
        $totalnumber = NotificacionController::numbersNotification();
        if ($totalnumber != "") {
            $protocolo = NotificacionController::notificationsProtocolo();
            $consignageneral = NotificacionController::notificationsConsignag();
            $consignaparticular = NotificacionController::notificationsConsignap();
            $circular = NotificacionController::notificationsCircular();
            $instruccion = NotificacionController::notificationsInstrucion();
            $instruccionmanual = NotificacionController::notificationsInstruccionManual();
        } else {
            echo '   <li>
                      <a>
                        <span class="image"><img src="views/assets/images/user.png" alt="Profile Image" /></span>
                        <span>
                          <span>Hola!!!</span>
                          <span class="time"></span>
                        </span>
                        <span class="message">
                          Por ahora no tienes notificacion pendientes.
                        </span>
                      </a>
                    </li>';
        }
    }

    public function borrarNotiProtoLeido()
    {
        if (isset($_POST["idnotiproto"])) {
            $data = $_POST["idnotiproto"];
            $result = $this->model->borrarNotiProtoLeidos($data);
            print_r($result);
        }
    }

    public function borrarNotiCosnigLeido()
    {
        if (isset($_POST["idnoticonsig"])) {
            $data = $_POST["idnoticonsig"];
            $result = $this->model->borrarNotiCosnigLeidos($data);
            print_r($result);
        }
    }

    public function borrarNotiCosnipLeido()
    {
        if (isset($_POST["idnoticonsip"])) {
            $data = $_POST["idnoticonsip"];
            $result = $this->model->borrarNotiCosnipLeidos($data);
            print_r($result);
        }
    }

    public function borrarNotiCircuLeido()
    {
        if (isset($_POST["idnoticircu"])) {
            $data = $_POST["idnoticircu"];
            $result = $this->model->borrarNotiCircuLeidos($data);
            print_r($result);
        }
    }

    public function borrarNotiInstruLeido()
    {
        if (isset($_POST["idnotiinstru"])) {
            $data = $_POST["idnotiinstru"];
            $result = $this->model->borrarNotiInstruLeidos($data);
            print_r($result);
        }
    }

    public function searchNotificacionInstruManual()
    {
        if (isset($_POST["idnotiinstrumanu"])) {
            $data = $_POST["idnotiinstrumanu"];
            $result = $this->model->searchNotificacionInstruManuales($data);
            echo $result;
        }
    }

    public function borrarNotiInstruManuLeido()
    {
        if (isset($_POST["idnotiinstrumanu"])) {
            $data = $_POST["idnotiinstrumanu"];
            $result = $this->model->borrarNotiInstruManuLeidos($data);
            print_r($result);
        }
    }

    public function excelNotificacion()
    {

        set_time_limit(0);
        setlocale(LC_ALL, 'es_ES');
        ini_set('memory_limit', '-1');

        $objPHPExcel = new PHPExcel();

        // Establecer propiedades
//        $objPHPExcel->getProperties()
//            ->setCreator("Cattivo")
//            ->setLastModifiedBy("Cattivo")
//            ->setTitle("Documento Excel de Prueba")
//            ->setSubject("Documento Excel de Prueba")
//            ->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")
//            ->setKeywords("Excel Office 2007 openxml php")
//            ->setCategory("Pruebas de Excel");

        $notificaciones = $this->model->consultaNotificacion();

        // Hoja de protocolos
        $objWorksheet = $objPHPExcel->createSheet(0);
        $objWorksheet
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'fecha')
            ->setCellValue('C1', 'Descripcion')
            ->setCellValue('D1', 'Leido')
            ->setCellValue('E1', 'Usuario');
        $i = 2;
        foreach ($notificaciones[0] as $row => $protocolo) {
            // Agregar Informacion
            $objWorksheet
                ->setCellValue('A' . $i, $protocolo[0])
                ->setCellValue('B' . $i, $protocolo[3])
                ->setCellValue('C' . $i, $protocolo[1])
                ->setCellValue('D' . $i, $protocolo[2] == 1 ? 'si' : 'no')
                ->setCellValue('E' . $i, $protocolo[4] . " " . $protocolo[5]);
            $i++;
        }
        // Renombrar Hoja
//        $objPHPExcel->getActiveSheet()->setTitle('N. protocolo');
        $objWorksheet->setTitle('N. protocolo');
//--------------------------------------------------------------------------------------------------------------

        // hoja de instruccion manual
        $objWorksheet = $objPHPExcel->createSheet(1);
        $objWorksheet
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'fecha')
            ->setCellValue('C1', 'Descripcion')
            ->setCellValue('D1', 'Leido')
            ->setCellValue('E1', 'Usuario');
        $i = 2;
        foreach ($notificaciones[1] as $row => $protocolo) {
            // Agregar Informacion
            $objWorksheet
                ->setCellValue('A' . $i, $protocolo[0])
                ->setCellValue('B' . $i, $protocolo[3])
                ->setCellValue('C' . $i, $protocolo[1])
                ->setCellValue('D' . $i, $protocolo[2] == 1 ? 'si' : 'no')
                ->setCellValue('E' . $i, $protocolo[4] . " " . $protocolo[5]);
            $i++;
        }

        // Renombrar Hoja
        $objWorksheet->setTitle('N. instruccion manual');
//----------------------------------------------------------------------------------------------------

        // Hoja de consigna particular
        $objWorksheet = $objPHPExcel->createSheet(2);
        $objWorksheet
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'fecha')
            ->setCellValue('C1', 'Descripcion')
            ->setCellValue('D1', 'Leido')
            ->setCellValue('E1', 'Usuario');
        $i = 2;
        foreach ($notificaciones[2] as $row => $protocolo) {
            // Agregar Informacion
//            $objPHPExcel->setActiveSheetIndex(2)
            $objWorksheet
                ->setCellValue('A' . $i, $protocolo[0])
                ->setCellValue('B' . $i, $protocolo[3])
                ->setCellValue('C' . $i, $protocolo[1])
                ->setCellValue('D' . $i, $protocolo[2] == 1 ? 'si' : 'no')
                ->setCellValue('E' . $i, $protocolo[4] . " " . $protocolo[5]);
            $i++;
        }
        // Renombrar Hoja
        $objWorksheet->setTitle('N. consigana particular');
//--------------------------------------------------------------------------------------------------------------

        // Hoja de condigna general
        $objWorksheet = $objPHPExcel->createSheet(3);
        $objWorksheet
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'fecha')
            ->setCellValue('C1', 'Descripcion')
            ->setCellValue('D1', 'Leido')
            ->setCellValue('E1', 'Usuario');
        $i = 2;
        foreach ($notificaciones[3] as $row => $protocolo) {
            // Agregar Informacion
            $objWorksheet
                ->setCellValue('A' . $i, $protocolo[0])
                ->setCellValue('B' . $i, $protocolo[3])
                ->setCellValue('C' . $i, $protocolo[1])
                ->setCellValue('D' . $i, $protocolo[2] == 1 ? 'si' : 'no')
                ->setCellValue('E' . $i, $protocolo[4] . " " . $protocolo[5]);
            $i++;
        }
        // Renombrar Hoja
        $objWorksheet->setTitle('N. consigana general');
//--------------------------------------------------------------------------------------------------------------


        // Hoja de circular
        $objWorksheet = $objPHPExcel->createSheet(4);
        $objWorksheet
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'fecha')
            ->setCellValue('C1', 'Descripcion')
            ->setCellValue('D1', 'Leido')
            ->setCellValue('E1', 'Usuario');
        $i = 2;
        foreach ($notificaciones[4] as $row => $protocolo) {
            // Agregar Informacion
            $objWorksheet
                ->setActiveSheetIndex(4)
                ->setCellValue('A' . $i, $protocolo[0])
                ->setCellValue('B' . $i, $protocolo[3])
                ->setCellValue('C' . $i, $protocolo[1])
                ->setCellValue('D' . $i, $protocolo[2] == 1 ? 'si' : 'no')
                ->setCellValue('E' . $i, $protocolo[4] . " " . $protocolo[5]);
            $i++;
        }
        // Renombrar Hoja
        $objWorksheet->setTitle('N. circular');
//--------------------------------------------------------------------------------------------------------------


        // Hoja de instruccion
        $objWorksheet = $objPHPExcel->createSheet(5);
        $objWorksheet
            ->setCellValue('A1', 'id')
            ->setCellValue('B1', 'fecha')
            ->setCellValue('C1', 'Descripcion')
            ->setCellValue('D1', 'Leido')
            ->setCellValue('E1', 'Usuario');
        $i = 2;
        foreach ($notificaciones[5] as $row => $protocolo) {
            // Agregar Informacion
            $objWorksheet
                ->setCellValue('A' . $i, $protocolo[0])
                ->setCellValue('B' . $i, $protocolo[3])
                ->setCellValue('C' . $i, $protocolo[1])
                ->setCellValue('D' . $i, $protocolo[2] == 1 ? 'si' : 'no')
                ->setCellValue('E' . $i, $protocolo[4] . " " . $protocolo[5]);
            $i++;
        }
        // Renombrar Hoja
        $objWorksheet->setTitle('N. instruccion');
//--------------------------------------------------------------------------------------------------------------


//      Establecer la hoja activa, para que cuando se abra el documento se muestre primero .
        $objPHPExcel->setActiveSheetIndex(0);

// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="resumen.xlsx"');
        $objWriter->save('php://output');
        exit;
    }


}

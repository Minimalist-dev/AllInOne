<?php
session_start();
require_once '../../Conexion.php';
require_once '../../Globales.php';

class Chats extends Globales {
    private $sql;
    private $resultado;
    private $obtenidos;
    private $ok;

    public function
    mensajes() {
        $this->obtenidos = array();
        
        if(isset($_POST["chat-contactado"])) {
            $this->ok = $_POST["chat-contactado"];
            
            $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT * FROM `Chats` WHERE `de` = '".$_SESSION['johnDoe']."' AND `para` = '".$this->ok."' "
                . "OR `de` = '".$this->ok."' AND `para` = '".$_SESSION['johnDoe']."' ");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

            foreach ($this->resultado as $valor) {
                if ($valor["de"] === $_SESSION['johnDoe'] and $valor["para"] !== $_SESSION['johnDoe']) {
                    $this->ok = $valor["de"];
                } else if ($valor["de"] !== $_SESSION['johnDoe'] and $valor["para"] === $_SESSION['johnDoe']) {
                    $this->ok = $valor["de"];
                }

                $this->sql = $GLOBALS["base"]->conexion->
                query("SELECT * FROM `Usuarios` WHERE id = '" . $this->ok . "' ");
                $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

            foreach ($this->resultado as $usuario) {
                array_push($this->obtenidos, array(
                    "id"        => $valor["id"],
                    "de"        => $valor["de"],
                    "para"      => $valor["para"],
                    "mensaje"   => $valor["mensaje"],
                    "nombre"    => $usuario["nombre"],
                    "foto"      => $usuario["foto"],
                    "fecha"     => self::tiempoTranscurrido(strtotime($valor['fecha']))
                ));
            }
            }
        }
        exit(json_encode($this->obtenidos));
    }
}

$ejecutarChats = new Chats;
$chats = $ejecutarChats->mensajes();
?>

<?php
session_start();
require_once '../Conexion.php';

class Chats {
    private $sql;
    private $resultado;
    private $obtenidos;
    private $ok;

    public function
    mensajes() {
        $this->obtenidos = array();
        
        $this->sql = $GLOBALS["base"]->conexion->
        query("SELECT * FROM `Chats` WHERE `de` = '5' AND `para` = '1' OR `de` = '1' AND `para` = '5' ");
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
            $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $valor['fecha']);

            array_push($this->obtenidos, array(
                "id"        => $valor["id"],
                "de"        => $valor["de"],
                "para"      => $valor["para"],
                "mensaje"   => $valor["mensaje"],
                "nombre"    => $usuario["nombre"],
                "foto"      => $usuario["foto"],
                "fecha"     => $fecha->format('d M Y')
            ));
        }
        }
        exit(json_encode($this->obtenidos));
    }
}

$ejecutarChats = new Chats;
$chats = $ejecutarChats->mensajes();
?>

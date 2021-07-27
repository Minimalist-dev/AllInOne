<?php
session_start();
require_once '../../Conexion.php';

class Contactados {
    private $sql;
    private $resultado;
    private $obtenidos;
    private $ok;

    public function 
    porChat() {
        $this->obtenidos = array();
        
        $this->sql = $GLOBALS["base"]->conexion->
        query("SELECT * FROM `ChatDePara` WHERE "
            . "`de` = '".$_SESSION['johnDoe']."' OR "
            . "`para` = '".$_SESSION['johnDoe']."' ORDER BY `fechaFinalizada` DESC");
        $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

        foreach ($this->resultado as $valor) {
            if ($valor["de"] === $_SESSION['johnDoe']) { $this->ok = $valor["para"]; } 
            else if ($valor["para"] === $_SESSION['johnDoe']) { $this->ok = $valor["de"]; }
            
            $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT DISTINCT `nombre`, `foto` FROM `Usuarios` WHERE `id` = '".$this->ok."'");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

        foreach ($this->resultado as $usuario) {
            array_push($this->obtenidos, array(
                "ok"        => $this->ok,
                "nombre"    => $usuario["nombre"],
                "foto"      => $usuario["foto"],
                "fecha"     => $valor['fechaFinalizada']
            ));
        }
        }
        exit(json_encode($this->obtenidos));
    }
}
$ejecutarContactados = new Contactados();
$contactados = $ejecutarContactados->porChat();
?>
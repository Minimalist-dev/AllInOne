<?php
session_start();
require_once "../../Conexion.php";

class Sesion {
    public function 
    delUsuario() {
        if(isset($_SESSION['johnDoe'])) {
            $sql = $GLOBALS["base"]->conexion->query("SELECT * FROM `Usuarios` WHERE id = '".$_SESSION['johnDoe']."'");
            $resultado = $sql->fetch_all(MYSQLI_ASSOC);

            exit(json_encode($resultado));
        }
    }
}
$secion     = new Sesion();
$delUsuario = $secion->delUsuario();
?>
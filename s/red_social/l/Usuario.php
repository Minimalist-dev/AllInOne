<?php
session_start();
require_once "../../Conexion.php";
//
//https://www.php.net/manual/es/function.session-id.php
//https://www.php.net/manual/es/function.session-create-id.php
//https://www.php.net/manual/es/function.session-name.php
//
class Usuario {
    public function 
    visitado() {
        if(isset($_SESSION["usuario"])) {
            $sql = $GLOBALS["base"]->conexion->query("SELECT * FROM `Usuarios` WHERE id = '".$_SESSION["usuario"]."'");
            $resultado = $sql->fetch_all(MYSQLI_ASSOC);

            exit(json_encode($resultado)); 
        }
    }
}
$usuario    = new Usuario();
$visitado   = $usuario->visitado();
?>
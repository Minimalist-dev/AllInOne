<?php
session_start();
require_once 'Conexion.php';

class CerrarSesion extends Conexion {
    public function
    olvidar() {
        session_unset($this->conexion);
        
        session_unset($_SESSION["usuario"]);
        session_unset($_SESSION["johnDoe"]);
        
        session_destroy();
    }
}

$ejecutar = new CerrarSesion();
$ejecutar->olvidar(header("location: http://localhost/AllInOne/index.php"));

exit;
?>
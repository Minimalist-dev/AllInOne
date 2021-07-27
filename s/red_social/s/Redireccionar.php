<?php
session_start();

class Redireccionar {
    public function 
    usuarion() {
        $_SESSION["usuario"] = $_POST["usuario"];

        header("location: ../../../i/red_social/perfil/usuario.php");
    }
}

$redireccionar  = new Redireccionar();
$usuario        = $redireccionar->usuarion(); 
?>
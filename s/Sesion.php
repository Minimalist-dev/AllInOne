<?php

session_start();

class Sesion {

    function
    __construct() {
        if (isset($_SESSION['sesion'])) {
            
        } else {
            header("location:../../index.php");
        }
    }

}

$ejecutarSesion = new Sesion();
?>
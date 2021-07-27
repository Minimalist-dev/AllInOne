<?php

session_start();

class SesionIniciada {
 
    function
    __construct() {
        if (isset($_SESSION['johnDoe'])) {
            
        } else {
            header("location: http://localhost/AllInOne/red_social.php");
        }
    }

}

$sesionInicada = new SesionIniciada();
?>
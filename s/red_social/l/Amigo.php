<?php
session_start();
require_once "../../Conexion.php";
/**
 * Description of Amigo
 *
 * @author desarrollador
 */
class Amigo {

    public function 
    estado() {
        $sql = $GLOBALS["base"]->conexion->
        query("SELECT amigos FROM `Amigos` "
             . "WHERE yo = '".$_SESSION['johnDoe']."' AND usuario = '".$_SESSION["usuario"]."'");
        
        $resultado = $sql->fetch_all(MYSQLI_ASSOC);
        
        if ($resultado) {
            exit(json_encode($resultado)); 
        } else {
            exit(json_encode([array('amigos' => '')]));
        }
    }
}
$secion     = new Amigo();
$delUsuario = $secion->estado();
?>
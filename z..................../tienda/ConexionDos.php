<?php
/** 
 * Abre una nueva conexión al servidor de MySQL 
 */
require_once 'Conexion.php';
class ConexionDos extends Conexion {
    public function __construct($host, $usuario, $contraseña, $bd) {
        parent::__construct($host, $usuario, $contraseña, $bd);

        if (mysqli_connect_error()) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
    }
}
$conexionDosObject = new ConexionDos('localhost', 'root', '', 'tienda');
?>

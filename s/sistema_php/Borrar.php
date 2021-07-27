<?php
require_once '../Conexion.php';

class Borrar {
    public function 
    datos() {
        $dato = file_get_contents("php://input");
        
        $sql = $GLOBALS["base"]->conexion->query("DELETE FROM `SistemaPHP` WHERE id = '".$dato."'");
        
        echo !empty($sql) ? "Se ha borrado correctamente" : "<span>No se ha borrado.</span>";
    }
}
$ejecutarBorrar = new Borrar();
$borrar = $ejecutarBorrar->datos();

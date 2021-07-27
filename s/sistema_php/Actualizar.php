<?php
require_once '../Conexion.php';

class Actualizar {
    public function 
    datos() {
        $dato = file_get_contents("php://input");
        
        $sql = $GLOBALS['base']->conexion->query("SELECT * FROM `SistemaPHP` WHERE id = '".$dato."'");
        $resultado = $sql->fetch_all(MYSQLI_ASSOC);
        exit(json_encode($resultado));
    }
}
$ejecutarActualizar = new Actualizar();
$actualizar = $ejecutarActualizar->datos();

<?php
require_once '../Conexion.php';

class CantidadDeFilas {
    public function 
    total() {
        $sql = "SELECT * FROM `SistemaPHP`";
        $resultado = $GLOBALS['base']->conexion->query($sql);
        $numeroDeFilas = mysqli_num_rows($resultado);

        exit(json_encode($numeroDeFilas));
    }
}
$ejecutarCantidadDeFilas = new CantidadDeFilas();
$total = $ejecutarCantidadDeFilas->total();

<?php
require_once '../Conexion.php';

class Articulos {

    private $sql;
    private $resultado;

    public function
    todos() {
        $this->sql = $GLOBALS["base"]->conexion->query("SELECT * FROM Articulos ORDER BY id DESC");
        $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

        if (empty($this->resultado)) {
            echo 'No hay articulos.';
        }

        exit(json_encode($this->resultado));
    }

}

$articulos = new Articulos();
$informacion = $articulos->todos();
?>
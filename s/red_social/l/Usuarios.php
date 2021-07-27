<?php
require_once "../../Conexion.php";

class Usuarios {
    private $sql;
    private $resultado;

    public function
    registrados() {
        $this->sql = $GLOBALS["base"]->conexion->query("SELECT * FROM `Usuarios` ORDER By id DESC");
        $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

        exit(json_encode($this->resultado));
    }
}
$usuarios = new Usuarios();
$registrados = $usuarios->registrados();
?>
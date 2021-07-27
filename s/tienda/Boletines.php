<?php

require_once '../Conexion.php';
require_once '../Globales.php';

class Boletines extends Globales {

    private $sql;
    private $resultado;

    public function
    unirse() {
        if (isset($_POST['unirse'])) {
            $correo = Globales::probarEntrada($_POST['correo']);

            $this->sql = $GLOBALS["base"]->conexion->query("SELECT `suscriptor` FROM `Boletines` WHERE `suscriptor`='$correo'");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

            if ($this->resultado) {
                echo "Esta unido al <b>Boletín</b> utilize otro correo.";
            } else {
                $this->sql = $GLOBALS["base"]->conexion->query("INSERT INTO `Boletines`(`suscriptor`) VALUES('$correo')");

                echo "<b>" . $correo . "</b> Se a unido al <b>Boletín</b>";
            }
        } else {
            echo "Se ha producido un Error.";
        }
    }

}

$boletines = new Boletines();
$unirse = $boletines->unirse();
?>

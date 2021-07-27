<?php
require_once '../Conexion.php';
require_once '../Globales.php';

class Suscriptores extends Globales {
    private $sql;
    private $resultado;

    public function 
    suscribir() {
        if(isset($_POST['suscribir'])) {
            $correo = Globales::probarEntrada($_POST['correo']);

            $this->sql = $GLOBALS["base"]->conexion->query("SELECT `suscriptor` FROM `Suscriptores` WHERE `suscriptor`='$correo'");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

            if($this->resultado) {
                echo "Esta <b>Suscripto</b> utilize otro correo.";
            } else {
                $this->sql = $GLOBALS["base"]->conexion->query("INSERT INTO `Suscriptores`(`suscriptor`) VALUES('$correo')");
                echo "<b>" . $correo . "</b> Se a <b>suscripto.</b>";
            } 
        } else {
            echo "Se ha producido un Error.";
        }
    }
}
$suscripciones = new Suscriptores();
$suscribir = $suscripciones->suscribir();
?>

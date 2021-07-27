<?php
require_once ("conexion.php");

class RegistroDeSorteo extends Conexion {
    private $mySQLi;
    private $mySQLiFecha;
    private $mySQLiLoto;
    private $resultadoFecha;
    private $resultadoLoto;
    private $ultimoID;

    public function 
    infoDelSorteo() {

        if(isset($_POST['nRegistrarSorteo'])) {
            if(!empty($_POST['sorteo'])) {
                $fecha     = $this->conexion->real_escape_string($_POST['fecha']);
                $sorteo    = $this->conexion->real_escape_string($_POST['sorteo']);
                $loto      = $this->conexion->real_escape_string($_POST['loto']);
                $lotoMas   = $this->conexion->real_escape_string($_POST['lotoMas']);
                $superMas  = $this->conexion->real_escape_string($_POST['superMas']);

                $this->mySQLiFecha = $this->conexion->  
                    query("SELECT fecha FROM Historial WHERE fecha='$fecha'");
                $this->resultadoFecha = $this->mySQLiFecha->fetch_all(MYSQLI_ASSOC);

                if($this->resultadoFecha) {
                        echo "<script>alert('Este Sorteo ya Esta Registrado.')</script>";
                        echo '<meta http-equiv="refresh" content="1; url= ../../i/loto/insertar.php" />';  
                } else {
                    $this->mySQLiLoto = $this->conexion->  
                        query("SELECT `loto` FROM `Historial` WHERE loto='$loto'");
                    $this->resultadoLoto = $this->mySQLiLoto->fetch_all(MYSQLI_ASSOC);
                        
                    if ($this->resultadoLoto) {
                        $this->mySQLi = $this->conexion->
                            query("INSERT INTO `Historial` (`id`, `fecha`, `sorteo`, `loto`, `lotoMas`, `superMas`) "
                            . "VALUES (NULL, '$fecha', '$sorteo', '$loto', '$lotoMas', '$superMas')");

                        $this->ultimoID = $this->conexion->insert_id;

                        $this->mySQLiCoincidente = $this->conexion->
                            query("INSERT INTO `HistorialCoincidente`(`id`, `idHistorial`, `fecha`, `sorteo`, `loto`, `lotoMas`, `superMas`) "
                            . "VALUES (NULL, '$this->ultimoID', '$fecha', '$sorteo', '$loto', '$lotoMas', '$superMas')");
                    
                        echo "<script>alert('Sorteo (coincidente) registrado con Exito.')</script>";
                    } else {
                        $this->mySQLi = $this->conexion->
                            query("INSERT INTO `Historial` (`id`, `fecha`, `sorteo`, `loto`, `lotoMas`, `superMas`) "
                            . "VALUES (NULL, '$fecha', '$sorteo', '$loto', '$lotoMas', '$superMas')");

                        echo "<script>alert('Sorteo registrado con Exito.')</script>";
                        echo '<meta http-equiv="refresh" content="1; url= ../../i/loto/historial.php" />';
                    }
                }
            } else {
                echo "<script>alert('Se ha producido un Error.')</script>";
                echo '<meta http-equiv="refresh" content="1; url= ../../i/loto/insertar.php" />';
            }
        }
    }
}
$registroDeSorteoObject = new RegistroDeSorteo;
$infoDelSorteoObject = $registroDeSorteoObject->infoDelSorteo();
?>
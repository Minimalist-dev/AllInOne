<?php
session_start();
require_once "../../Conexion.php";

class EditarDatos {
    private $sql;
    
    public function 
    deEdicion() {
        $nombre     = $_POST["nombre"];
        $apellido   = $_POST['apellido'];
        $correo     = $_POST['correo'];
        $numero     = $_POST['numero'];
        $sexo       = $_POST["sexo"];
        $nacimiento = $_POST['nacimiento'];
        $pais       = $_POST['pais'];
        $editar     = $_POST['editar-datos'];
        
        if (isset($editar)) {
            $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Usuarios` SET "
                    . "`nombre`='$nombre',"
                    . "`apellido`='$apellido',"
                    . "`correo`='$correo',"
                    . "`numero`='$numero',"
                    . "`sexo`='$sexo',"
                    . "`nacimiento`='$nacimiento',"
                    . "`pais`='$pais' WHERE id = '".$_SESSION['johnDoe']."'"
                . "");

            echo !empty($this->sql) ? "Actualizados." : "<span>No actualizados.</span>";
        } else {
            echo "<span>No ha actualizado los datos.<span>";
        }
    }
}

$ejecutarEditarDatos = new EditarDatos();
$editarDatos = $ejecutarEditarDatos->deEdicion();

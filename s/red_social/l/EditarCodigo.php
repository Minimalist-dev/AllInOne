<?php
session_start();
require_once "../../Conexion.php";

class EditarCodigo {
    private $sql;
    
    public function 
    deEdicion() {
        $nueva      = $_POST["nueva"];
        $repetir    = $_POST['repetir'];
        $editar     = $_POST['editar-codigo'];
        
        if (isset($editar) and $nueva !== $repetir) {
            echo "<span>La contraseña no coincide.<span>";
        } else if(isset($editar) and $nueva === $repetir) {
            $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Usuarios` SET `codigo`='$nueva' WHERE id = '".$_SESSION['johnDoe']."' ");

            echo !empty($this->sql) ? "Actualizada." : "<span>No actualizada.</span>";
        } else {
            echo "<span>No ha actualizado la contraseña.<span>";
        }
    }
}

$ejecutarEditarCodigo = new EditarCodigo();
$editarCodigo = $ejecutarEditarCodigo->deEdicion();

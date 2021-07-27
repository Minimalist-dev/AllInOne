<?php
session_start();
require_once "../../Conexion.php";

class EditarEliminar {
    private $sql;
    private $resultado;
    
    public function 
    deEdicion() {
        $correo = $_POST["correo"];
        $codigo = $_POST['codigo'];
        $editar = $_POST['editar-eliminar'];
        
        $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT * FROM `Usuarios` WHERE id = '".$_SESSION["johnDoe"]."' "
                . "AND `correo` = '$correo' "
                . "AND `codigo` = '$codigo' ");
        $this->resultado = $this->sql->num_rows;
        
        if (isset($editar) and $this->resultado !== 1) {
            echo "<span>El correo o la contraseña no coincide.<span>";
        } else if(isset($editar) and $this->resultado === 1) {
            $this->sql = $GLOBALS["base"]->conexion->
                query("DELETE FROM `Usuarios` WHERE id = '".$_SESSION['johnDoe']."' ");

            echo !empty($this->sql) ? "Hecho." : "<span>No se ha eliminado.</span>";
        } else {
            echo "<span>No ha eliminado la cuenta.<span>";
        }
    }
}

$ejecutarEditarEliminar = new EditarEliminar();
$editarEliminar = $ejecutarEditarEliminar->deEdicion();


<?php
session_start();
require_once "../../Conexion.php";

class EditarIntereses {
    private $sql;
    private $resultado;
    
    public function 
    deEdicion() {
        $interes    = $_POST["intereses"];
        $insertar   = $_POST['editar-interes'];
        
        $sqlLimite = $GLOBALS["base"]->conexion->
            query("SELECT * FROM `Intereses` WHERE yo = '".$_SESSION["johnDoe"]."' ");
        $limite = $sqlLimite->num_rows;
        
        $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT * FROM `Intereses` WHERE yo = '".$_SESSION["johnDoe"]."' AND `interes` = '$interes' ");
        $this->resultado = $this->sql->num_rows;
        
        if (empty($interes)) {
            echo "<span>No ha escogedo interes.</span>";
        } else if ($this->resultado === 1) {
            echo "<span>Ya esta escogedo.</span>";
        } else if ($limite >= 10) {
            echo "<span>Has llegado al limite.</span>";
        } else if(isset($insertar) and !empty($interes)) {
            $this->sql = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO "
                    . "`Intereses`(`yo`, `interes`, `fecha`) "
                    . "VALUES ('".$_SESSION['johnDoe']."', '$interes', NOW())");

            echo !empty($this->sql) ? "Escogido." : "<span>No Escogido.</span>";
        } else {
            echo "<span>No ha escogido el interes.</span>";
        }
    }
}

$ejecutarEditarIntereses = new EditarIntereses();
$editarIntereses = $ejecutarEditarIntereses->deEdicion();
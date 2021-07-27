<?php
require_once "../../Conexion.php";
/**
 * Description of Amigos
 *
 * @author desarrollador
 */
class Amigos {
    private $sql;
    private $resultado;
    
    public function 
    datos() {
        $yo         = $_POST["yo"];
        $usuario    = $_POST['usuario'];
        $amigos     = $_POST['amigos'];
            
        $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT `yo`, `usuario`, `amigos` FROM `Amigos`"
                . "WHERE yo = '".$yo."' AND usuario = '".$usuario."' AND NOT amigos = ''");
            
        $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
        
        if ($this->resultado) {
            $this->sql = $GLOBALS["base"]->conexion->
            query("DELETE FROM `Amigos` "
                . "WHERE  yo = '$yo' AND usuario = '$usuario' AND NOT amigos = ''");

            echo !empty($this->sql) ? "Se ha borrado correctamente" : "<span>No se ha borrado.</span>";
        } elseif (!$this->resultado) {
        
            $this->sql = $GLOBALS["base"]->conexion-> 
            query("INSERT INTO `Amigos`(`yo`, `usuario`, `amigos`, `fechaIniciada`)"
                . " VALUES ('$yo', '$usuario', 'Conocido', NOW())");                 

            echo !empty($this->sql) ? "Creado con exito." : "<span>No se ha creado.</span>";
        } else {
            echo "<span>No se a podido gestionar datos.<span>";
        }
    }
} 
      
$ejecutarCrear  = new Amigos();
$amigos  = $ejecutarCrear->datos();
?>
<?php
session_start();
require_once "../Conexion.php";
/**
 * Description of GustaNo
 *
 * @author desarrollador
 */
class GustaNo {
    private $sql;
    private $sqlGusta;
    private $ok;

    public function 
    no() {
        if(isset($_POST["gusta-no-boton"])) {
            $this->ok  = $_POST["publicacion-no"];
   
            $sqlGustaNo = $GLOBALS["base"]->conexion->
            query("SELECT `usuarioNo`, `publicacionNo` FROM `Gusta` "
                . "WHERE usuarioNo = '".$_SESSION['johnDoe']."' AND publicacionNo = '".$this->ok."'");

            $gustaNo = $sqlGustaNo->fetch_all(MYSQLI_ASSOC);
            
            $sqlGustaSi = $GLOBALS["base"]->conexion->
            query("SELECT `usuarioSi`, `publicacionSi` FROM `Gusta` "
                . "WHERE usuarioSi = '".$_SESSION['johnDoe']."' AND publicacionSi = '".$this->ok."'");

            $gustaSi = $sqlGustaSi->fetch_all(MYSQLI_ASSOC);

            if($gustaNo and $gustaSi) {
                $this->sqlGusta = $GLOBALS["base"]->conexion->
                query("UPDATE `Gusta` SET "
                    . "`usuarioNo`= NULL, "
                    . "`publicacionNo`= NULL, "
                    . "`fechaNOFinalizada`= NOW() "
                    . "WHERE usuarioSi = '".$_SESSION['johnDoe']."' AND publicacionSi = '".$this->ok."'");

                echo !empty($this->sqlGusta) ? "Actualizado en blanco" : "No actualizado en blanco.";
                
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Publicaciones` SET `gustaNo` = `gustaNo` - 1 "
                    . "WHERE id = '".$this->ok."'");  

                echo !empty($this->sql) ? "Gusta Si acutalizado." : "Gusta Si no actualizado.";
            } elseif (!$gustaNo and $gustaSi) {
                $this->sqlGusta = $GLOBALS["base"]->conexion->
                query("UPDATE `Gusta` SET "
                    . "`usuarioNo` = '".$_SESSION['johnDoe']."', "
                    . "`publicacionNo` = '".$this->ok."', "
                    . "`fechaNoIniciada` = NOW() "
                    . "WHERE usuarioSi = '".$_SESSION['johnDoe']."' AND publicacionSi = '".$this->ok."'");

                echo !empty($this->sqlGusta) ? "Se ha actualizado" : "No se ha actualizado."; 
                
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Publicaciones` SET `gustaNo` = `gustaNo` + 1 "
                    . "WHERE id = '".$this->ok."'");  

                echo !empty($this->sql) ? "Gusta Si acutalizado." : "Gusta Si no actualizado.";
            } elseif($gustaNo and !$gustaSi) {
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Publicaciones` SET `gustaNo` = `gustaNo` - 1 "
                    . "WHERE id = '".$this->ok."'");  

                echo !empty($this->sql) ? "Gusta Si acutalizado." : "Gusta Si no actualizado.";
                
                $this->sqlGusta = $GLOBALS["base"]->conexion->
                query("DELETE FROM `Gusta` "
                    . "WHERE  usuarioNo = '".$_SESSION['johnDoe']."' AND publicacionNo = '".$this->ok."'");
                
                echo !empty($this->sqlGusta) ? "Se ha borrado correctamente" : "No se ha borrado."; 
            } elseif(!$gustaNo and !$gustaSi) {
                $this->sqlGusta = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO `Gusta`(`usuarioNo`, `publicacionNo`, `fechaNoIniciada`) "
                    . "VALUES ('".$_SESSION['johnDoe']."', '".$this->ok."', NOW())");  
                
                echo !empty($this->sqlGusta) ? "Creado con exito." : "No se ha creado.";

                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Publicaciones` SET `gustaNo` = `gustaNo` + 1 "
                    . "WHERE id = '".$this->ok."'");  

                echo !empty($this->sql) ? "Gusta Si acutalizado." : "Gusta Si no actualizado.";
            }
        } else {
            echo 'Se ha producido un error';
        }
    }
} 
      
$ejecutarGustaNo  = new GustaNo();
$gustaNo  = $ejecutarGustaNo->no();
?>

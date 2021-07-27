<?php
session_start();
require_once "../Conexion.php";
/**
 * Description of Gusta
 *
 * @author desarrollador
 */
class GustaSi {
    private $sql;
    private $sqlGusta;
    private $ok;

    public function 
    si() {
        if(isset($_POST["gusta-si-boton"])) {
            $this->ok  = $_POST["publicacion-si"];
            //funcion que permite separar los numeros del texto
            //$siTotal = intval(preg_replace('/[*0-9+]/', '', $gustaSiTotal), 10);
            $sqlGustaSi = $GLOBALS["base"]->conexion->
            query("SELECT `usuarioSi`, `publicacionSi` FROM `Gusta` "
                . "WHERE usuarioSi = '".$_SESSION['johnDoe']."' AND publicacionSi = '".$this->ok."'");

            $gustaSi = $sqlGustaSi->fetch_all(MYSQLI_ASSOC);
            
            $sqlGustaNo = $GLOBALS["base"]->conexion->
            query("SELECT `usuarioNo`, `publicacionNo` FROM `Gusta` "
                . "WHERE usuarioNo = '".$_SESSION['johnDoe']."' AND publicacionNo = '".$this->ok."'");

            $gustaNo = $sqlGustaNo->fetch_all(MYSQLI_ASSOC);

            if($gustaSi and $gustaNo) {
                $this->sqlGusta = $GLOBALS["base"]->conexion->
                query("UPDATE `Gusta` SET "
                    . "`usuarioSi`= NULL, "
                    . "`publicacionSi`= NULL, "
                    . "`fechaSiFinalizada`= NOW() "
                    . "WHERE usuarioNo = '".$_SESSION['johnDoe']."' AND publicacionNo = '".$this->ok."'");

                echo !empty($this->sqlGusta) ? "Actualizado en blanco" : "No actualizado en blanco.";
                
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Publicaciones` SET `gustaSi` = `gustaSi` - 1 "
                    . "WHERE id = '".$this->ok."'");  

                echo !empty($this->sql) ? "Gusta Si acutalizado." : "Gusta Si no actualizado.";
            } elseif (!$gustaSi and $gustaNo) {
                $this->sqlGusta = $GLOBALS["base"]->conexion->
                query("UPDATE `Gusta` SET "
                    . "`usuarioSi` = '".$_SESSION['johnDoe']."', "
                    . "`publicacionSi` = '".$this->ok."', "
                    . "`fechaSiIniciada` = NOW() "
                    . "WHERE usuarioNo = '".$_SESSION['johnDoe']."' AND publicacionNo = '".$this->ok."'");

                echo !empty($this->sqlGusta) ? "Se ha actualizado" : "No se ha actualizado."; 
                
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Publicaciones` SET `gustaSi` = `gustaSi` + 1 "
                    . "WHERE id = '".$this->ok."'");  

                echo !empty($this->sql) ? "Gusta Si acutalizado." : "Gusta Si no actualizado.";
            } elseif($gustaSi and !$gustaNo) {
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Publicaciones` SET `gustaSi` = `gustaSi` - 1 "
                    . "WHERE id = '".$this->ok."'");  

                echo !empty($this->sql) ? "Gusta Si acutalizado." : "Gusta Si no actualizado.";
                
                $this->sqlGusta = $GLOBALS["base"]->conexion->
                query("DELETE FROM `Gusta` "
                    . "WHERE  usuarioSi = '".$_SESSION['johnDoe']."' AND publicacionSi = '".$this->ok."'");
                
                echo !empty($this->sqlGusta) ? "Se ha borrado correctamente" : "No se ha borrado."; 
            } elseif(!$gustaSi and !$gustaNo) {
                $this->sqlGusta = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO `Gusta`(`usuarioSi`, `publicacionSi`, `fechaSiIniciada`) "
                    . "VALUES ('".$_SESSION['johnDoe']."', '".$this->ok."', NOW())");  
                
                echo !empty($this->sqlGusta) ? "Creado con exito." : "No se ha creado.";

                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Publicaciones` SET `gustaSi` = `gustaSi` + 1 "
                    . "WHERE id = '".$this->ok."'");  

                echo !empty($this->sql) ? "Gusta Si acutalizado." : "Gusta Si no actualizado.";
            }
        } else {
            echo 'Se ha producido un error';
        }
    }
} 
      
$ejecutarGustaSi  = new GustaSi();
$gustaSi  = $ejecutarGustaSi->si();
?>
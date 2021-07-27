<?php
session_start();
require_once "../Conexion.php";
/**
 * Description of Compartir
 *
 * @author desarrollador
 */
class Compartir {
    private $sql;
    private $sqlCompartidas;
    private $ok;
    private $ok2;

    public function 
    publicacion() {
        if(isset($_POST["compartir-boton"])) {
            $this->ok   = $_POST["compartido"];
            $nombre     = $_POST["nombre"];
            $usuario    = $_POST["usuario"];
            $articulo   = $_POST["articulo"];
            $imagen     = $_POST["imagen"];
 
            $sqlCompartida = $GLOBALS["base"]->conexion->
            query("SELECT `usuario`, `publicacion`, `compartida` FROM `Compartidas` "
                . "WHERE "
                    . "`yo` = '".$_SESSION["johnDoe"]."' AND "
                    . "`usuario` = '".$usuario."' AND "
                    . "`publicacion` = '".$this->ok."'");

            $compartida = $sqlCompartida->fetch_all(MYSQLI_ASSOC);
            
            if(!empty($compartida)) {
                
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `Publicaciones` SET `compartida` = `compartida` - 1 "
                    . "WHERE id = '".$this->ok."'");  

                echo !empty($this->sql) ? "Compartida acutalizado." : "Compartida no actualizado.";
                
                $this->sqlCompartidas = $GLOBALS["base"]->conexion->
                query("DELETE FROM `Compartidas` "
                    . "WHERE `usuario` = '".$usuario."' AND `publicacion` = '".$this->ok."'");
                
                echo !empty($this->sqlCompartidas) ? "Se ha borrado correctamente" : "No se ha borrado."; 
                
                foreach ($compartida as $valor) {
                    $this->sqlCo = $GLOBALS["base"]->conexion->
                    query("DELETE FROM `Publicaciones` "
                        . "WHERE `id` = '".$valor["compartida"]."' AND `idUsuario` = '".$_SESSION["johnDoe"]."'");
                }
            } elseif(empty($compartida)) {
                $sqlCompartir = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO `Publicaciones`(`idUsuario`, `publicacion`, `fecha`, `gustaSi`, `gustaNo`, `compartida`, `de`, `autor`) "
                    . "VALUES ('".$_SESSION["johnDoe"]."', '".$articulo."', NOW(), '0', '0', '0', 'De', '".$nombre."')");

                $this->ok2 = $GLOBALS["base"]->conexion->insert_id;
                
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO `Imagenes`(`idUsuario`, `idPublicacion`, `imagen`, `fecha`) "
                    . "VALUES ('".$_SESSION["johnDoe"]."', '".$this->ok2."', "
                    . "'".$imagen."', NOW())");
   
                if ($sqlCompartir === true and $this->sql === true) {
                    $this->sqlCompartidas = $GLOBALS["base"]->conexion-> 
                    query("INSERT INTO `Compartidas`(`yo`, `usuario`, `publicacion`, `compartida`, `fecha`) "
                        . "VALUES ('".$_SESSION['johnDoe']."', '".$usuario."', '".$this->ok."', '".$this->ok2."', NOW())");  

                    echo !empty($this->sqlCompartidas) ? "Creado con exito." : "No se ha creado.";

                    $this->sql = $GLOBALS["base"]->conexion-> 
                    query("UPDATE `Publicaciones` SET `compartida` = `compartida` + 1 "
                        . "WHERE id = '".$this->ok."'");  

                    echo !empty($this->sql) ? "Compartida acutalizado." : "Compartida no actualizado.";
                }    
            }
        } else {
            echo 'Se ha producido un error';
        }
    }
} 
      
$ejecutarCompartir = new Compartir();
$compartir = $ejecutarCompartir->publicacion();
?>

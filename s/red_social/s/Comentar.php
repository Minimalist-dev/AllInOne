<?php
session_start();
require_once '../../Conexion.php';
/**
 * Description of Comentar
 *
 * @author desarrollador
 */
class Comentar {
    public $ok;
    
    public function 
    comentario() {
        if (isset($_POST["comentar"])) {
            $usuario        = $_POST["usuario"];
            $this->ok       = $_POST["publicacion"];
            $comentario     = $_POST["comentario"];

            $sql = $GLOBALS["base"]->conexion-> 
            query("INSERT INTO `Comentarios`(`yo`, `usuario`, `publicacion`, `comentario`, `fecha`) "
                . "VALUES ('".$_SESSION["johnDoe"]."', '".$usuario."', '".$this->ok."', '".$comentario."', NOW())");
            
            $sqlComentarios = $GLOBALS["base"]->conexion-> 
            query("UPDATE `Publicaciones` SET `comentarios` = `comentarios` + 1 "
                . "WHERE id = '".$this->ok."'");  
        }    
    }
}
$ejecutarComentario = new Comentar();
$comentario = $ejecutarComentario->comentario();
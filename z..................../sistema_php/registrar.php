<?php
require_once '../Conexion.php';
class Subir {
    private $sql;

    public function 
    articulo() {
        if (isset($_POST['crear'])) {
            $id             = $GLOBALS["base"]->conexion->real_escape_string($_POST["id"]);
            $marca          = $GLOBALS["base"]->conexion->real_escape_string($_POST['marca']);
            $nombre         = $GLOBALS["base"]->conexion->real_escape_string($_POST['nombre']);
            $precio         = $GLOBALS["base"]->conexion->real_escape_string($_POST['precio']);

            if (empty($id)) {
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO `SistemaPHP`(`id`, `marca`, `nombre`, `precio`) VALUES (NULL, '$marca', '$nombre', '$precio')");                  

                echo "<script>alert('Creado con exito.')</script>";
            } else {
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `productos` SET `codigo`='".$marca."',`producto`= '".$nombre."',`precio`= '".$precio."' WHERE id=".$id);  
            
                echo "<script>alert('Actualizado con exito.')</script>";
            }
        } else {
            echo "<script>alert('No se a podido subir el Articulo.')</script>";
        }
    }
} 
      
$ejecutarSubir      = new Subir();
$ejecutarArticulo   = $ejecutarSubir->articulo();
?>
<?php
require_once '../../sql/Conexion.php';
class Subir {
    private $sql;

    public function 
    articulo() {
        if (isset($_POST['subirArticulo'])) {
            $categoria      = $GLOBALS["base"]->conexion->real_escape_string($_POST["categoria"]);
            $subCategoria   = $GLOBALS["base"]->conexion->real_escape_string($_POST["subCategoria"]);
            $marca          = $GLOBALS["base"]->conexion->real_escape_string($_POST['marca']);
            $nombre         = $GLOBALS["base"]->conexion->real_escape_string($_POST['nombre']);
            $color          = $GLOBALS["base"]->conexion->real_escape_string($_POST['color']);
            $talla          = $GLOBALS["base"]->conexion->real_escape_string($_POST["talla"]);
            $descripcion    = $GLOBALS["base"]->conexion->real_escape_string($_POST['descripcion']);
            $costo          = $GLOBALS["base"]->conexion->real_escape_string($_POST['costo']);
            $cantidad       = $GLOBALS["base"]->conexion->real_escape_string($_POST['cantidad']);
            $precio         = $GLOBALS["base"]->conexion->real_escape_string($_POST['costo']) * 1.25;

            $imagen         = $GLOBALS["base"]->conexion->real_escape_string($_FILES['imagen']['name']);
            $ruta           = $GLOBALS["base"]->conexion->real_escape_string($_FILES['imagen']['tmp_name']);

            if (is_uploaded_file($ruta)) { 
                $destino =  "../../front-multimedia/tienda/img/" . $imagen;
                copy($ruta, $destino);
            } 

            $this->sql = $GLOBALS["base"]->conexion-> 
            query("INSERT INTO Articulos (`id`, `categoria`, `subCategoria`, `marca`, `nombre`, `color`, `talla`, `descripcion`, `costo`,"
                . " `cantidad`, `precio`, `imagen`) VALUES (NULL, '$categoria', '$subCategoria', '$marca', '$nombre', '$color', '$talla',"
                . " '$descripcion', '$costo', '$cantidad', '$precio', '$imagen')");                  

            echo "Articulo subido con Exito.";
        } else {
            echo "<script>alert('No se a podido subir el Articulo.')</script>";
        }
    }
} 
      
$ejecutarSubir      = new Subir();
$ejecutarArticulo   = $ejecutarSubir->articulo();
?>
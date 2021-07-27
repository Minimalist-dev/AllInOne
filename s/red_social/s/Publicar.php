<?php
session_start();
require_once '../../Conexion.php';
//class Publicar {
//    //put your code here
//}
if(isset($_POST["subir"])) {

    $imagen         = $_FILES['imagen']['tmp_name'];
    $imagen_tipo    = exif_imagetype($_FILES['imagen']['tmp_name']);
    
    if ($imagen_tipo == IMAGETYPE_PNG or $imagen_tipo == IMAGETYPE_JPEG or $imagen_tipo == IMAGETYPE_BMP) {
        $descripcion = $_POST["publicacion"];

        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            
//            $result     = $GLOBALS["base"]->conexion->query("SHOW TABLE STATUS WHERE `Name` = `Imagenes`");
//            $data       = $result->fetch_all(MYSQLI_ASSOC);
//            $next_id    = $data['Auto_increment'];
            
            $ext        = ".jpg";
            $namefinal  = trim($_FILES['imagen']['name']);
            $namefinal  = str_replace(" ", "", $namefinal);
            $aleatorio  = substr(strtoupper(md5(microtime(true))), 0,6);
//            $namefinal  = "ID-".$next_id."-NAME-".$aleatorio;
            $namefinal  = "ID-"."-NAME-".$aleatorio;
            
            if ($imagen_tipo == IMAGETYPE_PNG) {
                $imagen = imagecreatefrompng($imagen);
                imagejpeg($imagen, "../../../i_img/red_social/l/".$namefinal.$ext, 100);
                
                $nuevaimagen = "../../../i_img/red_social/l/".$namefinal.$ext;
            } else {
                $nuevaimagen = $imagen;
            }
            
            $original   = imagecreatefromjpeg($nuevaimagen);
            $max_ancho  = 1080; $max_alto = 1080;
            list($ancho, $alto) = getimagesize($nuevaimagen);
            
            $x_ratio = $max_ancho / $ancho;
            $y_ratio = $max_alto / $alto;
            
            if(($ancho <= $max_ancho) and ($alto <= $max_alto)) {
                $ancho_final    = $ancho;
                $alto_final     = $alto;
            }
            elseif (($x_ratio * $alto) < $max_alto) {
                $alto_final = ceil($x_ratio * $alto);
                $ncho_final = $max_ancho;
            }
            else {
                $ancho_final = ceil($y_ratio * $ancho);
                $alto_final = $max_alto;
            }
            
            imagedestroy($original);
            
            if (is_uploaded_file($imagen)) { 
                $destino =  "../../../i_img/red_social/l/".$namefinal.$ext;
                copy($imagen, $destino);
            } 
            
            if ($_FILES['imagen']['tmp_name']) {
                $sql = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO "
                    . "`Publicaciones`("
                        . "`yo`, "
                        . "`publicacion`, "
                        . "`fecha`, "
                        . "`gustaSi`, "
                        . "`gustaNo`, "
                        . "`comentarios`, "
                        . "`compartida`, "
                        . "`de`, "
                        . "`autor`"
                    . ") "
                    . "VALUES ("
                        . "'".$_SESSION["johnDoe"]."', "
                        . "'".$descripcion."', "
                        . "NOW(), "
                        . "'0', "
                        . "'0', "
                        . "'0', "
                        . "'0', "
                        . "' ', "
                        . "' '"
                    . ")"); 

                if ($sql === true) {
                    echo "Imagen final: " . $namefinal.$ext . "<br>";
                    $sql3 = $GLOBALS["base"]->conexion-> 
                    query("INSERT INTO `Imagenes`(`idUsuario`, `idPublicacion`, `imagen`, `fecha`) "
                    . "VALUES ('".$_SESSION["johnDoe"]."', '".$GLOBALS["base"]->conexion->insert_id."', '".$namefinal.$ext."', NOW())"); 
                    
                    header("Location: http://localhost/AllInOne/i/red_social/perfil.php");
                }
            }
        }
    }
}
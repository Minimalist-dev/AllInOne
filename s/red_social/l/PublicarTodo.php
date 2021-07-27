<?php
session_start();
require_once '../../Conexion.php';

class PublicarTodo {
    private $sql;
    
    public function 
    yo() {
        if(isset($_POST["publicar-todo"])) {
            $imagen         = $_FILES['imagen']['tmp_name'];
            $imagen_tipo    = exif_imagetype($_FILES['imagen']['tmp_name']);

            if ($imagen_tipo == IMAGETYPE_PNG or $imagen_tipo == IMAGETYPE_JPEG or $imagen_tipo == IMAGETYPE_BMP) {
                $publicacion = $_POST["publicacion"];

                if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                    $ext        = ".jpg";
                    $namefinal  = trim($_FILES['imagen']['name']);
                    $namefinal  = str_replace(" ", "", $namefinal);
                    $aleatorio  = substr(strtoupper(md5(microtime(true))), 0,6);
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
                    } elseif (($x_ratio * $alto) < $max_alto) {
                        $alto_final = ceil($x_ratio * $alto);
                        $ncho_final = $max_ancho;
                    } else {
                        $ancho_final = ceil($y_ratio * $ancho);
                        $alto_final = $max_alto;
                    }

                    imagedestroy($original);

                    if (is_uploaded_file($imagen)) { 
                        $destino =  "../../../i_img/red_social/l/".$namefinal.$ext;
                        copy($imagen, $destino);
                    } 

                    if ($_FILES['imagen']['tmp_name']) {
                        $this->sql = $GLOBALS["base"]->conexion-> 
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
                                . "'".$publicacion."', "
                                . "NOW(), "
                                . "'0', "
                                . "'0', "
                                . "'0', "
                                . "'0', "
                                . "' ', "
                                . "' '"
                            . ")"
                        ); 

                        if ($this->sql === true) {
                            $this->sql = $GLOBALS["base"]->conexion-> 
                                query("INSERT INTO `Imagenes`(`yo`, `publicacion`, `imagen`, `fecha`) "
                                    . "VALUES ("
                                        . "'".$_SESSION["johnDoe"]."', "
                                        . "'".$GLOBALS["base"]->conexion->insert_id."', "
                                        . "'".$namefinal.$ext."', "
                                        . "NOW())"
                                ); 

                             echo !empty($this->sql) ? "Todo hecho" : "<span>Todo no hecho</span>";
                        }
                    }
                }
            }
        }
    }
}
$ejecutarPublicarTodo = new PublicarTodo();
$publicarTodo = $ejecutarPublicarTodo->yo();
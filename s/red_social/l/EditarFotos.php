<?php
session_start();
require_once "../../Conexion.php";

class EditarFotos {
    private $sql;
    private $ancho;
    private $alto;
    private $destino;
    private $nombreAleatorio;


    private const ANCHO = 1080; 
    private const ALTO = 1080;
    private const EXT = ".jpg";

    public function 
    deEdicion() {
        $foto                   = $_FILES['foto']['tmp_name'];
        $portada                = $_FILES['portada']['tmp_name'];
        $this->nombreAleatorio  = substr(strtoupper(md5(microtime(true))), 0,6);
 
        if(!empty($foto) and empty($portada)) {
            $fotoTipo   = exif_imagetype($foto);
            $fotoFinal  = trim($_FILES['foto']['name']);
            $fotoFinal  = str_replace(" ", "", $fotoFinal);
            $fotoFinal  = "foto-".$this->nombreAleatorio;

            if($fotoTipo == IMAGETYPE_JPEG) {
                $fotoNueva = $foto;
            } else if ($fotoTipo == IMAGETYPE_PNG) {
                $foto = imagecreatefrompng($foto);

                imagejpeg($foto, "../../../i_img/red_social/i/".$fotoFinal.self::EXT, 100);

                $fotoNueva = "../../../i_img/red_social/i/".$fotoFinal.self::EXT;
            } else {
                echo 'Error de tipo.';
            }

            $fotoOriginal = imagecreatefromjpeg($fotoNueva);

            list($this->ancho, $this->alto) = getimagesize($fotoNueva);

            $x_ratio = self::ANCHO / $this->ancho;
            $y_ratio = self::ALTO / $this->alto;

            if(($this->ancho <= self::ANCHO) and ($this->alto <= self::ALTO)) {
                $ancho_final    = $this->ancho;
                $alto_final     = $this->alto;
            } elseif (($x_ratio * $this->alto) < self::ALTO) {
                $alto_final = ceil($x_ratio * $this->alto);
                $ncho_final = self::ANCHO;
            } else {
                $ancho_final = ceil($y_ratio * $this->ancho);
                $alto_final = self::ALTO;
            }

            imagedestroy($fotoOriginal);

            if (@is_uploaded_file($foto)) { 
                $this->destino =  "../../../i_img/red_social/i/".$fotoFinal.self::EXT;
                copy($foto, $this->destino);
            } 

            if ($foto) {
                $this->sql = $GLOBALS["base"]->conexion-> 
                    query("UPDATE `Usuarios` SET "
                        . "`foto`='".$fotoFinal.self::EXT."' WHERE id = '".$_SESSION['johnDoe']."'"
                    . ""); 

                echo !empty($this->sql) ? "Foto hecho." : "<span>Foto no hecho.</span>";
            }
        } else if(empty($foto) and !empty($portada)) {
            $portadaTipo   = exif_imagetype($portada);
            $portadaFinal  = trim($_FILES['portada']['name']);
            $portadaFinal  = str_replace(" ", "", $portadaFinal);
            $portadaFinal  = "portada-".$this->nombreAleatorio;

            if($portadaTipo == IMAGETYPE_JPEG) {
                $portadaNueva = $portada;
            } else if ($portadaTipo == IMAGETYPE_PNG) {
                $portada = imagecreatefrompng($portada);

                imagejpeg($portada, "../../../i_img/red_social/i/".$portadaFinal.self::EXT, 100);

                $portadaNueva = "../../../i_img/red_social/i/".$portadaFinal.self::EXT;
            } else {
                echo 'Error de tipo.';
            }

            $portadaOriginal = imagecreatefromjpeg($portadaNueva);

            list($this->ancho, $this->alto) = getimagesize($portadaNueva);

            $x_ratio = self::ANCHO / $this->ancho;
            $y_ratio = self::ALTO / $this->alto;

            if(($this->ancho <= self::ANCHO) and ($this->alto <= self::ALTO)) {
                $ancho_final    = $this->ancho;
                $alto_final     = $this->alto;
            } elseif (($x_ratio * $this->alto) < self::ALTO) {
                $alto_final = ceil($x_ratio * $this->alto);
                $ncho_final = self::ANCHO;
            } else {
                $ancho_final = ceil($y_ratio * $this->ancho);
                $alto_final = self::ALTO;
            }

            imagedestroy($portadaOriginal);

            if (@is_uploaded_file($portada)) { 
                $this->destino =  "../../../i_img/red_social/i/".$portadaFinal.self::EXT;
                copy($portada, $this->destino);
            } 

            if ($portada) {
                $this->sql = $GLOBALS["base"]->conexion-> 
                    query("UPDATE `Usuarios` SET "
                        . "`portada`='".$portadaFinal.self::EXT."' WHERE id = '".$_SESSION['johnDoe']."'"
                    . ""); 

                echo !empty($this->sql) ? "Portada hecho." : "<span>Portada no hecho.</span>";
            } 
        } else if(!empty($foto) and !empty($portada)) {
            $fotoTipo       = exif_imagetype($foto);
            $portadaTipo    = exif_imagetype($portada);
            $fotoFinal      = trim($_FILES['portada']['name']);
            $portadaFinal   = trim($_FILES['portada']['name']);
            $fotoFinal      = str_replace(" ", "", $portadaFinal);
            $portadaFinal   = str_replace(" ", "", $portadaFinal);
            $fotoFinal      = "foto-".$this->nombreAleatorio;
            $portadaFinal   = "portada-".$this->nombreAleatorio;

            if($fotoTipo == IMAGETYPE_JPEG) {
                $fotoNueva = $foto;
            } else if ($fotoTipo == IMAGETYPE_PNG) {
                $foto = imagecreatefrompng($foto);

                imagejpeg($foto, "../../../i_img/red_social/i/".$fotoFinal.self::EXT, 100);

                $fotoNueva = "../../../i_img/red_social/i/".$fotoFinal.self::EXT;
            } else {
                echo 'Error de tipo.';
            }

            if($portadaTipo == IMAGETYPE_JPEG) {
                $portadaNueva = $portada;
            } else if ($portadaTipo == IMAGETYPE_PNG) {
                $portada = imagecreatefrompng($portada);

                imagejpeg($portada, "../../../i_img/red_social/i/".$portadaFinal.self::EXT, 100);

                $portadaNueva = "../../../i_img/red_social/i/".$portadaFinal.self::EXT;
            } else {
                echo 'Error de tipo.';
            }
            
            $fotoOriginal       = imagecreatefromjpeg($fotoNueva);
            $portadaOriginal    = imagecreatefromjpeg($portadaNueva);

            list($this->ancho, $this->alto) = getimagesize($fotoNueva);
            list($this->ancho, $this->alto) = getimagesize($portadaNueva);

            $x_ratio = self::ANCHO / $this->ancho;
            $y_ratio = self::ALTO / $this->alto;

            if(($this->ancho <= self::ANCHO) and ($this->alto <= self::ALTO)) {
                $ancho_final    = $this->ancho;
                $alto_final     = $this->alto;
            } elseif (($x_ratio * $this->alto) < self::ALTO) {
                $alto_final = ceil($x_ratio * $this->alto);
                $ncho_final = self::ANCHO;
            } else {
                $ancho_final = ceil($y_ratio * $this->ancho);
                $alto_final = self::ALTO;
            }

            imagedestroy($fotoOriginal);
            imagedestroy($portadaOriginal);

            if (@is_uploaded_file($foto)) { 
                $this->destino =  "../../../i_img/red_social/i/".$fotoFinal.self::EXT;
                copy($foto, $this->destino);
            } 
            if (@is_uploaded_file($portada)) { 
                $this->destino =  "../../../i_img/red_social/i/".$portadaFinal.self::EXT;
                copy($portada, $this->destino);
            } 

            if ($foto and $portada) {
                $this->sql = $GLOBALS["base"]->conexion-> 
                    query("UPDATE `Usuarios` SET "
                        . "`foto`='".$fotoFinal.self::EXT."',"
                        . "`portada`='".$portadaFinal.self::EXT."' WHERE id = '".$_SESSION['johnDoe']."'"
                    . ""); 

                echo !empty($this->sql) ? "Hecho." : "<span>No hecho.</span>";
            } 
        } 
    }
}
$ejecutarEditarFotos = new EditarFotos();
$editarFotos = $ejecutarEditarFotos->deEdicion();
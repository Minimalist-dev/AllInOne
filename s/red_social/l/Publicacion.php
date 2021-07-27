<?php
session_start();
require_once '../../Conexion.php';
require_once '../../Globales.php';

class Publicacion extends Globales {

    private $sql;
    private $resultado;
    private $obtenidos;

    public function
    publicada() {
        $this->obtenidos = array();
        
        $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT * FROM `Publicaciones` WHERE yo = '".$_SESSION["johnDoe"]."' ORDER BY id DESC");
        $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

        foreach ($this->resultado as $valor) {
            $this->sql = $GLOBALS["base"]->conexion->
                query("SELECT * FROM `Usuarios` WHERE id = '".$valor["yo"]."' ");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

            foreach ($this->resultado as $yo) {
                
                $this->sql = $GLOBALS["base"]->conexion->
                    query("SELECT imagen FROM `Imagenes` WHERE publicacion = '".$valor["id"]."' ");
                $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

                foreach ($this->resultado as $imagen) {
                    array_push($this->obtenidos, array(
                        "nombre"        => $yo["nombre"],
                        "foto"          => $yo["foto"],
                        "publicacion"   => $valor["publicacion"],
                        "imagen"        => $imagen["imagen"],
                        "fecha"         => self::tiempoTranscurrido(strtotime($valor['fecha'])),
                        "gustaSi"       => $valor["gustaSi"],
                        "gustaNo"       => $valor["gustaNo"],
                        "comentarios"   => $valor["comentarios"],
                        "compartida"    => $valor["compartida"]
                    ));
                }
            }
        }
        
        exit(json_encode($this->obtenidos));
    }

}

$publicacion = new Publicacion();
$publicada = $publicacion->publicada();
?>

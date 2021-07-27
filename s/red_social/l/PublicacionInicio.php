<?php
session_start();
require_once '../../Conexion.php';

class PublicacionInicio {
    private $sql;
    private $resultado;
    private $obtenidos;
    private $comentariosObtenidos;

    public function
    publicada() {
        $this->obtenidos = array();
        $this->comentariosObtenidos = array();
        
        $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT * FROM `Publicaciones` ORDER BY id DESC");
        $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

        foreach ($this->resultado as $valor) {
            $this->sql = $GLOBALS["base"]->conexion->
                query("SELECT id, nombre, foto FROM `Usuarios` WHERE id = '" . $valor["yo"] . "'");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

        foreach ($this->resultado as $usuario) {
            $this->sql = $GLOBALS["base"]->conexion->
                query("SELECT imagen FROM `Imagenes` WHERE publicacion = '" . $valor["id"] . "'");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

        foreach ($this->resultado as $imagen) {
            $sqlComentarios = $GLOBALS["base"]->conexion->
                query("SELECT * FROM `Comentarios` WHERE `publicacion` = '".$valor["id"]."'");
            $comentarios = $sqlComentarios->fetch_all(MYSQLI_ASSOC);
            
            foreach ($comentarios as $comentario) {
                $sqlComentarioImgs = $GLOBALS["base"]->
                    conexion->query("SELECT nombre, foto FROM `Usuarios` WHERE id = '" . $comentario["yo"] . "'");
                $comentarioImgs = $sqlComentarioImgs->fetch_all(MYSQLI_ASSOC);

            foreach ($comentarioImgs as $comentarioImg) {
                $fechaDeComentario = DateTime::createFromFormat('Y-m-d H:i:s', $comentario["fecha"]);
                
                array_push($this->comentariosObtenidos, array(
                    "yo"            => $comentario["yo"],
                    "publicacion"   => $comentario["publicacion"],
                    "comentario"    => $comentario["comentario"],
                    "nombre"        => $comentarioImg["nombre"],
                    "foto"          => $comentarioImg["foto"],
                    "fecha"         => $fechaDeComentario->format('d M Y')
                ));
            }
            }
            
            $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $valor['fecha']);

            array_push($this->obtenidos, array(
                "id"            => $valor["id"],
                "de"            => $valor["de"],
                "autor"         => $valor["autor"],
                "usuario"       => $usuario["id"],
                "nombre"        => $usuario["nombre"],
                "foto"          => $usuario["foto"],
                "publicacion"   => $valor["publicacion"], 
                    "comentario" => array(
                        $this->comentariosObtenidos
                    ),
                "imagen"        => $imagen["imagen"],
                "fecha"         => $fecha->format('d M Y'),
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

$publicacion = new PublicacionInicio();
$publicada = $publicacion->publicada();
?>

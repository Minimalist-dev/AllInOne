<?php
require_once 'IntercambioFront.php';

class Editar {
    public $indiceDeSesion;
    
    public function 
    fila() {//if (isset($_SESSION["JSONenPHP"])) {
        foreach ($_SESSION["JSONenPHP"] as $this->indiceDeSesion => $datoDeSesion) {
            if ($datoDeSesion["ID"] == $_POST["id"]) {
                exit(json_encode($_SESSION["JSONenPHP"]));
            }
        }//} 
    }
}
$ejecutarEditar = new Editar();
$editar = $ejecutarEditar->fila();
?>
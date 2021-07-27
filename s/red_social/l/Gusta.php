<?php
session_start();
require_once "../Conexion.php";
/**
 * Description of Gusta
 *
 * @author desarrollador
 */
class Gusta {
    public $obtenidos;
    
    public function 
    estado() {
        $this->obtenidos = array();
    
        $sqlA = $GLOBALS["base"]->conexion->query("SELECT * FROM `Publicaciones` ORDER BY id DESC");
        $ResultadoA = $sqlA->fetch_all(MYSQLI_ASSOC);

        foreach ($resultadoA as $valorA) {
            $sqlB = $GLOBALS["base"]->conexion->
            query("SELECT * FROM `Gusta` "
                . "WHERE usuarioSi = '".$_SESSION['johnDoe']."' AND publicacionSi = '".$valorA["id"]."'");

            $resultadoB = $sqlB->fetch_all(MYSQLI_ASSOC);

            foreach ($resultadoB as $valorB) {
                array_push($this->obtenidos, array(
                    "usuarioSi"     => $valorB["usuarioSi"],
                    "publicacionSi" => $valorB["publicacionSi"]
                ));
            }
        }
        exit(json_encode($this->obtenidos));
//        if ($resultado) {
//            exit(json_encode($resultado)); 
//        } else {
//            exit(json_encode([array('' => '')]));
//        }
    }
}
$ejecutarGusta  = new Gusta();
$gusta          = $ejecutarGusta->estado();
?>

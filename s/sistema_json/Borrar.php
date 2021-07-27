<?php

class Borrar {
    private const ARCHIVO = "../../s_json/sistema_json/sistema_JSON.json";
    
    public function 
    datos() {
        $id           = file_get_contents("php://input");
        $archivo      = file_get_contents(self::ARCHIVO);
        $descodificar = json_decode($archivo, true);

        foreach ($descodificar as $llave => $valor) {
            if ($valor["ID"] == $id) { 
                array_splice($descodificar, $llave, 1);
            }     
        }

        $codificar  = json_encode($descodificar, JSON_PRETTY_PRINT);
        $archivo    = file_put_contents(self::ARCHIVO, $codificar);
        
        echo !empty($archivo) ? "Se ha borrado correctamente" : "<span>No se ha borrado.</span>";
    }
}
$ejecutarBorrar = new Borrar();
$borrar = $ejecutarBorrar->datos();
?>

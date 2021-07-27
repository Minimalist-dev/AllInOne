<?php

class Actualizar {
    private const ARCHIVO = "../../s_json/sistema_json/sistema_JSON.json";
    
    public function 
    datos() {
        $id           = file_get_contents("php://input");
        $archivo      = file_get_contents(self::ARCHIVO);
        $descodificar = json_decode($archivo, true);
        
        foreach ($descodificar as $valor) {
            if ($valor["ID"] == $id) {
                $editar = array(
                    "ID"     => $valor["ID"],
                    "FECHA"  => $valor["FECHA"],
                    "MARCA"  => $valor["MARCA"],
                    "NOMBRE" => $valor["NOMBRE"],
                    "PRECIO" => $valor["PRECIO"]
                );

                exit(json_encode($editar));
            }
        }
    }
}

$ejecutarEditar = new Actualizar();
$editar = $ejecutarEditar->datos();
?>

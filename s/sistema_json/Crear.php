<?php

class Crear {
    private const ARCHIVO = "../../s_json/sistema_json/sistema_JSON.json";
    private $archivo;
    private $descodificar;
    private $codificar;

    public function 
    datos() {
//        if (file_exists(self::ARCHIVO)) { echo "El fichero " . self::ARCHIVO . " existe"; } 
//        else { echo "El fichero " . self::ARCHIVO . " no existe"; }
        $this->archivo = file_get_contents(self::ARCHIVO);
        $this->descodificar = json_decode($this->archivo, true);
               
        if (isset($_POST['crear'])) {
            if ($_POST["crear"] === "Crear") {
                $this->descodificar[] = array(
                    "ID"     => $_POST["id"],
                    "FECHA"  => $_POST["fecha"],
                    "MARCA"  => $_POST['marca'],
                    "NOMBRE" => $_POST['nombre'],
                    "PRECIO" => $_POST['precio']
                );
                
                $this->codificar = json_encode($this->descodificar, JSON_PRETTY_PRINT);
                $this->archivo = file_put_contents(self::ARCHIVO, $this->codificar);                

                echo !empty($this->archivo) ? "Creado con exito." : "<span>No se ha creado.</span>";
            } else if($_POST["crear"] === "Actualizar") {
                foreach ($this->descodificar as $llave => $valor) {
                    if ($valor["ID"] == $_POST["id"]) {
                        $this->descodificar[$llave]["ID"]     = $_POST["id"];
                        $this->descodificar[$llave]["FECHA"]  = $_POST["fecha"];
                        $this->descodificar[$llave]["MARCA"]  = $_POST["marca"];
                        $this->descodificar[$llave]["NOMBRE"] = $_POST["nombre"];
                        $this->descodificar[$llave]["PRECIO"] = $_POST["precio"];
                    }
                }

                $this->codificar = json_encode($this->descodificar, JSON_PRETTY_PRINT);
                $this->archivo = file_put_contents(self::ARCHIVO, $this->codificar); 
                
                echo !empty($this->archivo) ? "Actualizadocon exito." : "<span>No se ha actualizado.</span>";
            }
        } else {
            echo "<span>No se a podido crear datos.<span>";
        }
    }
} 
      
$ejecutarCrear  = new Crear();
$crear  = $ejecutarCrear->datos();
?>

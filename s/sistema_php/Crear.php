<?php
require_once '../Conexion.php';

class Crear {
    private $sql;

    public function 
    datos() {
        if (isset($_POST['crear-envio'])) {
            $id     = $_POST["id"];
            $marca  = $_POST['marca'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];

            if (empty($id)) {
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO `SistemaPHP`(`id`, `fecha`, `hora`, `marca`, `nombre`, `precio`) "
                    . "VALUES (NULL, NOW(), NOW(), '$marca', '$nombre', '$precio')");                  

                echo !empty($this->sql) ? "Creado con exito." : "<span>No se ha creado.</span>";
            } else {
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("UPDATE `SistemaPHP` SET `marca`='".$marca."',`nombre`='".$nombre."',`precio`='".$precio."' "
                    . "WHERE id=".$id);  
            
                echo !empty($this->sql) ? "Actualizadocon exito." : "<span>No se ha actualizado.</span>";
            }
        } else {
            echo "<span>No se a podido crear datos.<span>";
        }
    }
} 
      
$ejecutarCrear  = new Crear();
$crear = $ejecutarCrear->datos();
?>
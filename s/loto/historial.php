<?php
require_once 'conexion.php';

class Historial extends Conexion {
    private $mySQLi;
    private $resultado;
    private $buscar = null;

    public function 
    infoDeHistorial() {
        if(isset($_REQUEST["nSearch"]) && !empty($_REQUEST["nSearch"])) {
            $this->buscar = htmlspecialchars($_REQUEST["nSearch"]);

//            $this->mySQLi = $this->conexion->query("SELECT * FROM nHistorial WHERE "
//                . "nID LIKE '%$this->buscar%' OR nFecha LIKE '%$this->buscar%' OR "
//                . "nSorteo LIKE '%$this->buscar%' OR nLoto LIKE '%$this->buscar%' OR "
//                . "nLotoMas LIKE '%$this->buscar%' OR supermas LIKE '%$this->buscar%' ORDER BY nID DESC LIMIT 100");
            $this->mySQLi = $this->conexion->query("SELECT * FROM Historial "
                . "WHERE loto LIKE '%$this->buscar%' ORDER BY id DESC");
            $this->resultado = $this->mySQLi->fetch_all(MYSQLI_ASSOC);

            if(empty($this->resultado)) {
                echo "<p>No hay resultado de: <span style='color: red;'>".$_GET["nSearch"]."</span></p>";   
            }
            return $this->resultado;
        } else {
            $this->mySQLi = $this->conexion->query("SELECT * FROM Historial ORDER BY id DESC LIMIT 100");
            $this->resultado = $this->mySQLi->fetch_all(MYSQLI_ASSOC);
            return $this->resultado;
        }
    }
}
?>
<table>
    <tr>
        <th width="7.801418439%" >ID</th>
        <th width="21.27659574%">Fecha</th>
        <th width="19.148936166">Sorteo</th>
        <th width="36.170212758%">Loto</th>
        <th width="7.801418439%">LotoMas</th>
        <th width="7.801418439%">SuperMas</th>
    </tr>
<?php
    $historialObject = new Historial();
    $infoDeHistorialObject = $historialObject->infoDeHistorial();

    foreach ($infoDeHistorialObject as $datoDeHistorial) { 
        $fecha  = date_create($datoDeHistorial["fecha"]);
?>
    <tr>
        <td colspan="1" style="text-align: right;"><?php    echo $datoDeHistorial["id"]; ?></td>
        <td colspan="1" style="text-align: center;"><?php   echo date_format($fecha, 'd/m/y'); ?></td>                
        <td colspan="1" style="text-align: right;"><?php    echo $datoDeHistorial["sorteo"]; ?></td>              
        <td colspan="1" style="text-align: center;"><?php   echo $datoDeHistorial["loto"]; ?></td>             
        <td colspan="1" style="text-align: center;"><?php   echo $datoDeHistorial["lotoMas"]; ?></td>
        <td colspan="1" style="text-align: center;"><?php   echo $datoDeHistorial["superMas"]; ?></td>
    </tr>
<?php
    }                
?>  
</table>
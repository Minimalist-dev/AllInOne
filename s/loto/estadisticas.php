<?php
require_once 'conexion.php';

class Loto extends Conexion {
    //Consultas para reflejar las cantidades
    public function 
    lotoNumeros() {
        $lotoArray = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15",
                           "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30",
                           "31", "32", "33", "34", "35", "36", "37", "38");
        
        foreach ($lotoArray as $loto) {
            $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%".$loto."%'");
            $this->resultado= $this->mySQLi->num_rows;
?>
            <tr>
                <td style="text-align: center;"><?php echo $loto; ?></td>
                <td style="text-align: center;"><?php echo $this->resultado; ?></td>
            </tr>
<?php
        }
    }
    //Consultas para calcular los porcentajes
    public function 
    lotoCantidades() {
        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%01%'");
        $this->resultadoUno = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%02%'");
        $this->resultadoDos = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%03%'");
        $this->resultadoTres = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%04%'");
        $this->resultadoCuatro = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%05%'");
        $this->resultadoCinco = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%06%'");
        $this->resultadoSeis = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%07%'");
        $this->resultadoSiete = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%08%'");
        $this->resultadoOcho = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%09%'");
        $this->resultadoNueve = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%10%'");
        $this->resultadoDies = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%11%'");
        $this->resultadoOnce = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%12%'");
        $this->resultadoDoce = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%13%'");
        $this->resultadoTrece = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%14%'");
        $this->resultadoCatorce = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%15%'");
        $this->resultadoQuince = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%16%'");
        $this->resultadoDieciseis = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%17%'");
        $this->resultadoDiecisiete = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%18%'");
        $this->resultadoDieciocho = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%19%'");
        $this->resultadoDiecinueve = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%20%'");
        $this->resultadoVeinte = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%21%'");
        $this->resultadoVeintiuno = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%22%'");
        $this->resultadoVeintidos = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%23%'");
        $this->resultadoVeintitres = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%24%'");
        $this->resultadoVeinticuatro = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%25%'");
        $this->resultadoVeinticinco = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%26%'");
        $this->resultadoVeintiseis = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%27%'");
        $this->resultadoVeintisiete = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%28%'");
        $this->resultadoVeintiocho = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%29%'");
        $this->resultadoVeintinueve = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%30%'");
        $this->resultadoTreinta = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%31%'");
        $this->resultadoTreintaiuno = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%32%'");
        $this->resultadoTreintaidos = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%33%'");
        $this->resultadoTreintaitres = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%34%'");
        $this->resultadoTreintaicuatro = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%35%'");
        $this->resultadoTreintaicinco = $this->mySQLi->num_rows;
 
        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%36%'");
        $this->resultadoTreintaiseis = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%37%'");
        $this->resultadoTreintaisiete = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `loto` FROM `Historial` WHERE loto LIKE '%38%'");
        $this->resultadoTreintaiocho = $this->mySQLi->num_rows;
    }
    public function 
    lotoPorcentajes() {
        $this->lotoCantidades();

        $this->suma = $this->resultadoUno + 
                        $this->resultadoDos + 
                        $this->resultadoTres + 
                        $this->resultadoCuatro +
                        $this->resultadoCinco + 
                        $this->resultadoSeis + 
                        $this->resultadoSiete +
                        $this->resultadoOcho +
                        $this->resultadoNueve +
                        $this->resultadoDies +
                        $this->resultadoOnce +
                        $this->resultadoDoce +
                        $this->resultadoTrece +
                        $this->resultadoCatorce +
                        $this->resultadoQuince +
                        $this->resultadoDieciseis +
                        $this->resultadoDiecisiete +
                        $this->resultadoDieciocho +
                        $this->resultadoDiecinueve +
                        $this->resultadoVeinte +
                        $this->resultadoVeintiuno +
                        $this->resultadoVeintidos +
                        $this->resultadoVeintitres +
                        $this->resultadoVeinticuatro +
                        $this->resultadoVeinticinco +
                        $this->resultadoVeintiseis +
                        $this->resultadoVeintisiete +
                        $this->resultadoVeintiocho +
                        $this->resultadoVeintinueve +
                        $this->resultadoTreinta +
                        $this->resultadoTreintaiuno +
                        $this->resultadoTreintaidos +
                        $this->resultadoTreintaitres +
                        $this->resultadoTreintaicuatro +
                        $this->resultadoTreintaicinco +
                        $this->resultadoTreintaiseis +
                        $this->resultadoTreintaisiete +
                        $this->resultadoTreintaiocho ;
        
        $cantidades = array($this->resultadoUno, 
                        $this->resultadoDos,
                        $this->resultadoTres, 
                        $this->resultadoCuatro,
                        $this->resultadoCinco, 
                        $this->resultadoSeis, 
                        $this->resultadoSiete,
                        $this->resultadoOcho,
                        $this->resultadoNueve,
                        $this->resultadoDies,
                        $this->resultadoOnce,
                        $this->resultadoDoce,
                        $this->resultadoTrece,
                        $this->resultadoCatorce,
                        $this->resultadoQuince,
                        $this->resultadoDieciseis,
                        $this->resultadoDiecisiete,
                        $this->resultadoDieciocho,
                        $this->resultadoDiecinueve,
                        $this->resultadoVeinte,
                        $this->resultadoVeintiuno,
                        $this->resultadoVeintidos,
                        $this->resultadoVeintitres,
                        $this->resultadoVeinticuatro,
                        $this->resultadoVeinticinco,
                        $this->resultadoVeintiseis,
                        $this->resultadoVeintisiete,
                        $this->resultadoVeintiocho,
                        $this->resultadoVeintinueve,
                        $this->resultadoTreinta,
                        $this->resultadoTreintaiuno,
                        $this->resultadoTreintaidos,
                        $this->resultadoTreintaitres,
                        $this->resultadoTreintaicuatro,
                        $this->resultadoTreintaicinco,
                        $this->resultadoTreintaiseis,
                        $this->resultadoTreintaisiete,
                        $this->resultadoTreintaiocho);
        
        foreach ($cantidades as $cantidad) {
?>
            <tr>
                <td colspan="1" style="text-align: center;"><?php echo number_format($cantidad / $this->suma, 6); ?></td>
            </tr>
<?php
        }
    }
}
?>
<table style="width: 22.222222222%; float: left">
    <tr>
        <th width="11.111111111">Loto</th>
        <th width="11.111111111">Cantidad</th>
    </tr>
<?php
    $lotoObject  = new Loto();
    $lotoObject->lotoNumeros();
?>
</table>
<table style="width: 11.111111111%; float: left;">
    <tr>
        <th width="11.111111111">%</th>
    </tr>
<?php
    $lotoObject->lotoPorcentajes();
?>
</table>
<?php
class LotoMas extends Conexion {
    //Consultas para reflejar las cantidades
    public function 
    lotoMasNumeros() {
        $lotoMasArray = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10");
        
        foreach ($lotoMasArray as $lotoMas) {
            $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '".$lotoMas."'");
            $this->resultado= $this->mySQLi->num_rows;      
?>
            <tr>
                <td style="text-align: center;"><?php echo $lotoMas; ?></td>
                <td style="text-align: center;"><?php echo $this->resultado; ?></td>
            </tr>
<?php
        }
    }
    //Consultas para calcular los porcentajes
    public function 
    lotoMasCantidades() {
        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '01'");
        $this->resultadoUno = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '02'");
        $this->resultadoDos = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '03'");
        $this->resultadoTres = $this->mySQLi->num_rows;
   
        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '04'");
        $this->resultadoCuatro = $this->mySQLi->num_rows;
  
        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '05'");
        $this->resultadoCinco = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '06'");
        $this->resultadoSeis = $this->mySQLi->num_rows;
   
        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '07'");
        $this->resultadoSiete = $this->mySQLi->num_rows;
   
        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '08'");
        $this->resultadoOcho = $this->mySQLi->num_rows;
    
        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '09'");
        $this->resultadoNueve = $this->mySQLi->num_rows;
   
        $this->mySQLi = $this->conexion->query("SELECT `lotoMas` FROM `Historial` WHERE lotoMas = '10'");
        $this->resultadoDies = $this->mySQLi->num_rows;
    }
    public function 
    lotoMasPorcentajes() {
        $this->lotoMasCantidades();

        $this->suma = $this->resultadoUno + 
                        $this->resultadoDos + 
                        $this->resultadoTres + 
                        $this->resultadoCuatro +
                        $this->resultadoCinco + 
                        $this->resultadoSeis + 
                        $this->resultadoSiete +
                        $this->resultadoOcho +
                        $this->resultadoNueve +
                        $this->resultadoDies;
        
        $cantidades = array($this->resultadoUno,
                        $this->resultadoDos, 
                        $this->resultadoTres, 
                        $this->resultadoCuatro,
                        $this->resultadoCinco, 
                        $this->resultadoSeis, 
                        $this->resultadoSiete,
                        $this->resultadoOcho,
                        $this->resultadoNueve,
                        $this->resultadoDies);

        foreach ($cantidades as $cantidad) {
?>
            <tr>
                <td colspan="1" style="text-align: center;"><?php echo number_format($cantidad / $this->suma, 6); ?></td>
            </tr>
<?php
        }
    }
}
?>
<table style="width: 22.222222222%; float: left">
    <tr>
        <th width="11.111111111">LotoMas</th>
        <th width="11.111111111">Cantidad</th>
    </tr>
<?php
    $lotoMasObject  = new LotoMas();
    $lotoMasObject->lotoMasNumeros();
?>
</table>
<table style="width: 11.111111111%; float: left;">
    <tr>
        <th width="11.111111111">%</th>
    </tr>
<?php
    $lotoMasObject->lotoMasPorcentajes();
?>
</table>
<?php
class SuperMas extends Conexion {
    //Consultas para reflejar las cantidades
    public function 
    superMasNumeros() {
        $superMasArray = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15");
        
        foreach ($superMasArray as $superMas) {
        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '".$superMas."'");
        $this->resultado= $this->mySQLi->num_rows;
?>
            <tr>
                <td style="text-align: center;"><?php echo $superMas; ?></td>
                <td style="text-align: center;"><?php echo $this->resultado; ?></td>
            </tr>
<?php
        }
    }
    //Consultas para calcular los porcentajes
    public function 
    superMasCantidades() {
        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '01'");
        $this->resultadoUno = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '02'");
        $this->resultadoDos = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '03'");
        $this->resultadoTres = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '04'");
        $this->resultadoCuatro = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '05'");
        $this->resultadoCinco = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '06'");
        $this->resultadoSeis = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '07'");
        $this->resultadoSiete = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '08'");
        $this->resultadoOcho = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '09'");
        $this->resultadoNueve = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '10'");
        $this->resultadoDies = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '11'");
        $this->resultadoOnce = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '12'");
        $this->resultadoDoce = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '13'");
        $this->resultadoTrece = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '14'");
        $this->resultadoCatorce = $this->mySQLi->num_rows;

        $this->mySQLi = $this->conexion->query("SELECT `superMas` FROM `Historial` WHERE superMas = '15'");
        $this->resultadoQuince = $this->mySQLi->num_rows;
    }
    public function 
    superMasPorcentajes() {
        $this->superMasCantidades();

        $this->suma = $this->resultadoUno + 
                        $this->resultadoDos + 
                        $this->resultadoTres + 
                        $this->resultadoCuatro +
                        $this->resultadoCinco + 
                        $this->resultadoSeis + 
                        $this->resultadoSiete +
                        $this->resultadoOcho +
                        $this->resultadoNueve +
                        $this->resultadoDies +
                        $this->resultadoOnce +
                        $this->resultadoDoce +
                        $this->resultadoTrece +
                        $this->resultadoCatorce +
                        $this->resultadoQuince;
                
        $cantidades = array($this->resultadoUno,
                $this->resultadoDos, 
                $this->resultadoTres, 
                $this->resultadoCuatro,
                $this->resultadoCinco, 
                $this->resultadoSeis, 
                $this->resultadoSiete,
                $this->resultadoOcho,
                $this->resultadoNueve,
                $this->resultadoDies,
                $this->resultadoOnce,
                $this->resultadoDoce,
                $this->resultadoTrece,
                $this->resultadoCatorce,
                $this->resultadoQuince);
        
        
        foreach ($cantidades as $cantidad) {
?>
            <tr>
                <td colspan="1" style="text-align: center;"><?php echo number_format($cantidad / $this->suma, 6); ?></td>
            </tr>
<?php
        }
    }
}
?>
<table style="width: 22.222222222%; float: left">
    <tr>
        <th width="11.111111111">SuperMas</th>
        <th width="11.111111111">Cantidad</th>
    </tr>
<?php
    $superMasObject  = new SuperMas();
    $superMasObject->superMasNumeros();
?>
</table>
<table style="width: 11.111111111%; float: left;">
    <tr>
        <th width="11.111111111">%</th>
    </tr>
<?php
    $superMasObject->superMasPorcentajes();
?>
</table>
<?php
class Coincidencia extends Conexion {
    private $mySQLi;
    private $resultado;

    public function 
    infoDeCoincidencia() {
        $this->mySQLi = $this->conexion->query("SELECT * FROM `HistorialCoincidente` ORDER BY id DESC LIMIT 10");
        $this->resultado = $this->mySQLi->fetch_all(MYSQLI_ASSOC);
        return $this->resultado;
    }
}
?>
<table>
    <caption>Coincidencias</caption>
    <tr>
        <th width="0.137254902%">ID</th>
        <th width="0.137254902%">IDHistorial</th>
        <th width="0.196078431%">Fecha</th>
        <th width="0.117647059%">Sorteo</th>
        <th width="0.333333333%">Loto</th>
        <th width="0.039215686%">LotoMas</th>
        <th width="0.039215686%">SuperMas</th>
    </tr>
<?php
    $coincidenciaObject = new Coincidencia();
    $infoDeCoincidenciaObject = $coincidenciaObject->infoDeCoincidencia();

    foreach ($infoDeCoincidenciaObject as $datoDeCoincidencia) { 
?>
    <tr>
        <td colspan="1" style="text-align: right;"><?php    echo $datoDeCoincidencia["id"]; ?></td>
        <td colspan="1" style="text-align: right;"><?php    echo $datoDeCoincidencia["idHistorial"]; ?></td>
        <td colspan="1" style="text-align: center;"><?php   echo $datoDeCoincidencia["fecha"]; ?></td>                
        <td colspan="1" style="text-align: right;"><?php    echo $datoDeCoincidencia["sorteo"]; ?></td>              
        <td colspan="1" style="text-align: center;"><?php   echo $datoDeCoincidencia["loto"]; ?></td>             
        <td colspan="1" style="text-align: center;"><?php   echo $datoDeCoincidencia["lotoMas"]; ?></td>
        <td colspan="1" style="text-align: center;"><?php   echo $datoDeCoincidencia["superMas"]; ?></td>
    </tr>
<?php
    }                
?>  
</table>
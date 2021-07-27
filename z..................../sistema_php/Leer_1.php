<?php
require_once '../Conexion.php';
require_once 'Paginacion.php';

class Leer {
    public $sql;
    public $buscar = null;
    public $paginacion;


    public function
    datos() {
//        $this->buscar = file_get_contents("php://input");
                
        $nMySQL = "SELECT * FROM `SistemaPHP` ORDER BY id DESC";
        $nResultado = $GLOBALS['base']->conexion->query($nMySQL);
        $nNumeroDeFilas = mysqli_num_rows($nResultado);

        $nResultadoDePagina = !empty($_GET['cantidad']) ? $_GET['cantidad'] : 4;
        $ordenar    = !empty($_GET['ordenar']) ? $_GET['ordenar'] : "DESC";
        $por        = !empty($_GET['por']) ? $_GET['por'] : "id";

        $this->paginacion = new Paginacion();
        $this->paginacion->nArchivos($nNumeroDeFilas);
        $this->paginacion->nArchivosPorPagina($nResultadoDePagina);
        
        if(!empty($_GET['buscar'])) {
            $this->sql = $GLOBALS['base']->conexion->query("SELECT * FROM `SistemaPHP` WHERE id LIKE '%".$_GET['buscar']."%'");
            $resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
            return $resultado;
        } else {
            $this->sql = $GLOBALS['base']->conexion->query("SELECT * FROM `SistemaPHP` ORDER BY $por  $ordenar"
            . " LIMIT " .(($this->paginacion->nGetPagina() - 1) * $nResultadoDePagina). ',' . $nResultadoDePagina);
            $resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
            
            if (!empty($resultado)) {
                $this->paginacion->nHacer();
                return $resultado;
                
            } else {
                echo "<tr style='color: var(--n-color); background: var(--n-color-rojo);'><td colspan='8'>No hay datos para leer.</td></tr>";
            }
        }
    }
}
$ejecutarLeer = new Leer();
$leer = $ejecutarLeer->datos();
foreach ($leer as $dato) {
    $fecha  = DateTime::createFromFormat('Y-m-d', $dato['fecha']);
    $hora   = DateTime::createFromFormat('H:i:s', $dato['hora']);
    
    echo "<tr>
        <td>" . $dato['id'] . "</td>
        <td>" . $fecha->format('d M Y') . "</td>
        <td>" . $hora->format('H:i a') . "</td>
        <td>" . $dato['marca'] . "</td>
        <td>" . $dato['nombre'] . "</td>
        <td>" . number_format($dato['precio'], 2, '.', ',') . "</td>
        <td>
            <button type='submit' onclick=actualizar('" . $dato['id'] . "')>Editar</button>
        </td> 
        <td>
            <button type='button' onclick=borrar('" . $dato['id'] . "')>Borrar</button>
        </td>  
    </tr>";
}
//$ejecutarLeer->paginacion->nHacer();
?>
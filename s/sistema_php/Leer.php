<?php
require_once '../Conexion.php';
        
class Leer {
    private $sql;
    private $resultado;
    private const SELECT = "SELECT * FROM `SistemaPHP` ORDER BY";

    public function
    datos() {
        if(!empty($_POST['buscar'])) {
            $this->sql = $GLOBALS['base']->conexion->query("SELECT * FROM `SistemaPHP` WHERE id LIKE '%" . $_POST['buscar'] . "%' LIMIT 4");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
            return $this->resultado;
        } elseif (!empty ($_POST['cantidad'])) {
            $this->sql = $GLOBALS['base']->conexion->query(self::SELECT . " id DESC LIMIT " . $_POST['cantidad']);
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
            return $this->resultado;
        } elseif (!empty ($_POST['por'])) {
            $this->sql = $GLOBALS['base']->conexion->query(self::SELECT . " '" . $_POST['por'] . "' ASC LIMIT 4");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
            return $this->resultado;
        } elseif (!empty ($_POST['ordenar'])) {
            $this->sql = $GLOBALS['base']->conexion->query(self::SELECT . " id " . $_POST['ordenar'] . " LIMIT 4");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
            return $this->resultado;
        } elseif (!empty ($_POST['inicio-de-paginacion'])) {
            $this->sql = $GLOBALS['base']->conexion->query(self::SELECT . " id DESC LIMIT 4 OFFSET " . $_POST['inicio-de-paginacion']);
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
            return $this->resultado;
        } else {
            $this->sql = $GLOBALS['base']->conexion->query(Leer::SELECT . " id DESC LIMIT 4");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
            
            if (!empty($this->resultado)) {
                return $this->resultado;
            } else {
                echo "<tr style='color: var(--n-color); background: var(--n-color-rojo);'><td colspan='8'>No hay datos para leer.</td></tr>";
            }
        }
    }
}
$ejecutarLeer = new Leer();
$leer = $ejecutarLeer->datos();

foreach ($leer as $dato) {
    $fecha  = date_create($dato['fecha']);
    $hora   = DateTime::createFromFormat('H:i:s', $dato['hora']);
    
    echo "<tr>
        <td>" . $dato['id'] . "</td>
        <td>" . date_format($fecha, 'd/m/y') . "</td>
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
?>
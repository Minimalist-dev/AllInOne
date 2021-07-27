<?php
require_once '../../s/Conexion.php';

class Detalles {

    public function
    detalle() {
        $sql = $GLOBALS['base']->conexion->query("SELECT * FROM `Articulos` WHERE id=" . htmlspecialchars($_GET["id"]));
        $resultado = $sql->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }

}

$ejecutarDetalles = new Detalles();
$detalles = $ejecutarDetalles->detalle();

foreach ($detalles as $detalle) {
?>
<img src="../../i_img/tienda/i/detalles.jpg" alt="" loading="lazy">
<section>
    <section>
        <img src="../../i_img/tienda/l/<?php echo $detalle['imagen']; ?>" alt="">
        <div class="n-total">
            <input id="n-total" type="text" value="<?php echo $detalle["precio"]; ?>" disabled="">
        </div>
    </section>
    <section class="n-etiqueta">
        <span><?php echo $detalle['marca']; ?></span>
        <span><?php echo $detalle['nombre']; ?></span>
        <span><?php echo $detalle['color']; ?></span>
        <span><?php echo $detalle['talla']; ?></span>
        <span><?php echo $detalle['descripcion']; ?></span>
        <span><?php echo $detalle['cantidad']; ?></span>
        <span><?php echo $detalle['precio']; ?></span>
    </section>
    <section>
        <!--<div>-->
            <button class="n-menos">-</button>
            <form action="" method="POST" name="detalles" id="detalles">
                <input type="hidden" name="id" value="<?php echo $detalle["id"]; ?>">
                <input type="hidden" name="marca" value="<?php echo $detalle["marca"]; ?>">
                <input type="hidden" name="nombre" value="<?php echo $detalle["nombre"]; ?>">
                <input type="hidden" name="color" value="<?php echo $detalle["color"]; ?>">
                <input type="hidden" name="talla" value="<?php echo $detalle["talla"]; ?>">
                <input type="hidden" name="descripcion" value="<?php echo $detalle["descripcion"]; ?>">
                <input type="hidden" name="cantidad" value="1">
                <input type="number" name="mas" id="mas" value="1" min="1" max="10">
                <input type="hidden" name="precio" id="precio" value="<?php echo $detalle["precio"]; ?>">
            </form>
            <button class="n-mas">+</button>
        <!--</div>-->
        <div>
            <button type="submit" name="escoger" id="escogiendo" value="Escoger" form="detalles">
                Escoger <i class="fa fa-shopping-cart"></i>
            </button>
        </div>      
    </section>
</section>
<?php
}
?>
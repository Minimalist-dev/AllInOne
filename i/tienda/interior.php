<?php require_once '../../s/Sesion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tienda: Interior</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="i_img/i/neury-dev.jpg" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="../../i_css/tienda/CascadeStyleSheet.css">
    <link rel="stylesheet" href="../../i_css/tienda/interior.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- header -->
    <header>
        <section>
            <button class="n-administrar">Administrar</button>
        </section>
        <section>
            <h1><a href="http://localhost/AllInOne/index.php" target="_blank" class="active">All<span class="n-vertical">
                Tienda</span><span class="n-one">nOne</span></a>
            </h1>
        </section>
        <section>
            <button class="n-cerrar">Cerrar</button>
        </section>
    </header>
<!-- nav -->
    <nav>
        <section>
            <section class="n-nav-botones">
                <button class="n-elegido" onclick="currentSlide(1)">Subir</button>
                <button class="n-elegido" onclick="currentSlide(2)">Editar</button>
<!--                <button class="n-elegido" onclick="currentSlide(3)">3</button>
                <button class="n-elegido" onclick="currentSlide(4)">4</button>
                <button class="n-elegido" onclick="currentSlide(5)">5</button>
                <button class="n-elegido" onclick="currentSlide(6)">6</button>
                <button >7</button><button >8</button><button >9</button><button >10</button>
                <button >11</button><button >12</button><button >13</button><button >14</button>
                <button >15</button><button >16</button><button >17</button><button >18</button>
                <button >19</button><button >20</button><button >21</button><button >22</button>
                <button >23</button><button >24</button><button >25</button><button >26</button>
                <button >27</button><button >28</button><button >29</button><button >30</button>-->
            </section>
            <section class="n-nav-buscar">
                <label for="n-buscar" hidden="">Buscar en este menu</label>
                <input type="search" id="n-buscar" placeholder="Buscar en este menu">
            </section>
        </section>
    </nav>
<!-- AllInOne -->
    <div class="all-in-one-linea">
        <div class="n-contenedor n-izquierda">
            <div class="n-contenido">
                <h2><a href="http://localhost/AllInOne/tienda.php">Tienda</a></h2>
                <p>14/09/2020 - 29/11/2020: Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admovim ea mazim fierent 
                    detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
            </div>
        </div>
        <div class="n-contenedor n-derecha">
            <div class="n-contenido">
                <h2><a href="http://localhost/AllInOne/plantillas_de_codigo.php">Plantillas de código</a></h2>
                <p>01/12/2020 - 01/12/2020: Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admovim ea mazim fierent 
                    detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
            </div>
        </div>
        <div class="n-contenedor n-izquierda">
            <div class="n-contenido">
                <h2><a href="http://localhost/AllInOne/sistema_PHP.php">Sistema PHP</a></h2>
                <p>01/12/2020 - 06/12/2020: Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent 
                    detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
            </div>
        </div>
        <div class="n-contenedor n-derecha">
            <div class="n-contenido">
                <h2><a href="http://localhost/AllInOne/sistema_JSON.php">Sistema JSON</a></h2>
                <p>09/12/2020 - 16/12/2020: Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent 
                    detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
            </div>
        </div>
        <div class="n-contenedor n-izquierda">
            <div class="n-contenido">
                <h2>2011</h2>
                <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent 
                    detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
            </div>
        </div>
        <div class="n-contenedor n-derecha">
            <div class="n-contenido">
                <h2>2007</h2>
                <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent 
                    detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
            </div>
        </div>
    </div>
<!--
    contenido
-->
    <div class="n-linea">
        <div class="n-nav-contenido n-contenedor n-izquierda">
            <div class="n-contenido">
                <h2>Subir</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" 
                name="subir" id="n-subir-envia" >
                    <label for="categoria">Categoria</label> 
                        <select name="categoria" id="categoria" required="">
                            <option value="" selected="selected">Seleccionar categoria</option>
                        </select>
                    <label for="subCategoria">Subcategoria</label>
                        <select name="subCategoria" id="subCategoria" required="">
                            <option value="" selected="selected">Seleccionar subcategoria</option>
                        </select>
                    <label for="marca">Marca</label>
                        <select name="marca" id="marca" required="">
                            <option value="" selected="selected">Seleccionar marca</option>
                        </select>
                    <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required="">
                    <label for="color">Color</label>
                        <select name="color" id="color" required="">
                            <option value="" selected="selected">Seleccionar color</option>
                        </select>
                    <label for="talla">Talla</label>
                        <select name="talla" id="talla" required="">
                            <option value="" selected="selected">Seleccionar talla</option>
                        </select>
                    <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3" cols="30" placeholder="Este es un mensaje"></textarea>
                    <label for="costo">Costo</label>
                        <input type="text" name="costo" id="costo" placeholder="Costo" required="">
                    <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" min="0" placeholder="Cantidad" required="">
                    <label for="imagen">Imagne</label>
                        <input type="file" name="imagen" id="imagen" required="">
                    <button type="submit" name="subirArticulo" id="subirArticulo" value="">Subir</button>  
                </form>
<!--                <p id="n-subir-responde"></p>-->
            </div>
        </div>
        <div class="n-nav-contenido n-contenedor n-derecha">
            <div class="n-contenido">
                <h2>Editar</h2>
                <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent 
                    detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
            </div>
        </div>
<!--        <div class="n-nav-contenido n-contenedor n-izquierda">
            <div class="n-contenido">
                <h2>2015</h2>
                <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent 
                    detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
            </div>
        </div>-->
<!--        <div class="n-nav-contenido n-contenedor n-derecha">
            <div class="n-contenido">
                <h2>2012</h2>
                <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto mnesarchum, vim ea mazim fierent 
                    detracto. Ea quis iuvaret expetendis his, te elit voluptua dignissim per, habeo iusto primis ea eam.</p>
            </div>
        </div>-->
    </div>
    <div class="n-cerrar-alerta">
        <p>¿Desea salir de la Sesion?</p>
        <a href="../../s/CerrarSesion.php">Aceptar</a>
    </div>
    <div id="n-subir-responde">Tiene que rellenar todos los campos.</div>
<script src="../../l_admin/tienda/i/interior.js" async=""></script>
<script src="../../l_admin/tienda/l/subir.js" defer=""></script>
</body>
</html>
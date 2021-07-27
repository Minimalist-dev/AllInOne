<?php
    require_once '../../s/tienda/Carrito.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>AllInOne | Tienda | Carrito</title>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="i_img/i/neury-dev.jpg" type="image/jpg" sizes="16x16">
<!--CSS-->
    <link rel="stylesheet" href="../../i_css/tienda/CascadeStyleSheet.css">
    <link rel="stylesheet" href="../../i_css/tienda/header.css">
    <link rel="stylesheet" href="../../i_css/tienda/nav.css">
    <link rel="stylesheet" href="../../i_css/tienda/carrito.css">
    <link rel="stylesheet" href="../../i_css/tienda/footer.css">
    <link rel="stylesheet" href="../../i_css/tienda/aside.css">
    <link rel="stylesheet" href="../../front-css/tienda/fontello-embedded.css">
<!--JavaScript-->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body class="n-grid">
<!------------------------------------------------------------------------------
header
------------------------------------------------------------------------------->
<section class="n-grid-area-1">
    <header>
        <h1><a href="http://localhost/AllInOne/index.php">All<span class="n-vertical">Tienda</span><span class="n-one">nOne</span></a></h1>
            <section class="n-uno">
                <button class="n-categoria" onmouseover="header(event, 'n-camisetas')" onclick="header2(event, 'n-camisetas')"> 
                    <span class="n-maximo">Camisetas</span><span class="n-minimo"><i class='fab fa-creative-commons-nd'></i></span>
                </button>
                <button class="n-categoria" onmouseover="header(event, 'n-vestidos')" onclick="header2(event, 'n-vestidos')"> 
                    <span class="n-maximo">Vestidos</span><span class="n-minimo"><i class='fab fa-creative-commons-nd'></i></span>
                </button>
                <button class="n-categoria" onmouseover="header(event, 'n-pantalones')" onclick="header2(event, 'n-pantalones')">
                    <span class="n-maximo">Pantalones</span><span class="n-minimo"><i class='fab fa-creative-commons-nd'></i></span>
                </button>
                <button class="n-categoria" onmouseover="header(event, 'n-chaquetas')" onclick="header2(event, 'n-chaquetas')"> 
                    <span class="n-maximo">Chaquetas</span><span class="n-minimo"><i class='fab fa-creative-commons-nd'></i></span>
                </button>
                <button class="n-categoria" onmouseover="header(event, 'n-deportivas')" onclick="header2(event, 'n-deportivas')"> 
                    <span class="n-maximo">Deportivas</span><span class="n-minimo"><i class='fab fa-creative-commons-nd'></i></span>
                </button>
                <button class="n-categoria" onmouseover="header(event, 'n-zapatos')" onclick="header2(event, 'n-zapatos')"> 
                    <span class="n-maximo">Zapatos</span><span class="n-minimo"><i class='fab fa-creative-commons-nd'></i></span>
                </button>
            </section>
            <section class="n-dos">
                <a href="#n-contacto" class="n-contacto">
                    <span class="n-maximo">Contacto</span><span class="n-minimo"><i class='fas fa-envelope-open-text'></i></span>
                </a>
                <button class="n-categoria" onmouseover="header(event, 'n-boletin')" onclick="header2(event, 'n-boletin')">
                    <span class="n-maximo">Boletin informativo</span><span class="n-minimo"><i class='fab fa-creative-commons-nd'></i></span>
                </button>
                <button class="n-categoria" onmouseover="header(event, 'n-subscribir')" onclick="header2(event, 'n-subscribir')">
                    <span class="n-maximo">Subscribir</span><span class="n-minimo"><i class='fab fa-creative-commons-nd'></i></span>
                </button>
            </section>
    </header>
</section>
<!------------------------------------------------------------------------------
nav
------------------------------------------------------------------------------->
<section class="n-grid-area-2">
    <nav>
        <!--<h2 hidden=""><a href="">Tienda</a></h2>-->
        <a href="../../tienda.php"><!--i class='fas fa-store-alt'></i--><i class='fas fa-home'></i></a> 
        <a href="perfil.php">Perfil</a> 
        <a href="">Carrito</a>
        <a href="">Buscar</a>
    </nav>
</section>
<!------------------------------------------------------------------------------
main
------------------------------------------------------------------------------->
<!--<section class="n-grid-area-3">
    <main>

    </main>
</section>-->
<!------------------------------------------------------------------------------
article
------------------------------------------------------------------------------->
<section class="n-grid-area-4">
    <article>
        <?php require_once '../../s/tienda/carrito.php'; ?>
    </article>
</section>
<!------------------------------------------------------------------------------
footer
------------------------------------------------------------------------------->
<section class="n-grid-area-5">
    <hr>
    <footer class="n-footer">
        <section id="n-contacto" class="n-footer-area-1">
            <h3>Contacto</h3>
            <p>Preguntas? Adelante.</p>
            <form action="php/enviar/enviarMail.php" method="post">
                <p><input type="text" name="" placeholder="Nombre..." required=""></p>
                <p><input type="email" name="" placeholder="Correo..." required=""></p>
                <p><input type="text" name="" placeholder="Tema..." required=""></p>
                <p><textarea name="" placeholder="Mensaje..." required=""></textarea></p>
                <button type="submit" name="mail">Submit</button>
            </form>
        </section>
        <section class="n-footer-area-2">
            <h3>Nosotros</h3>
            <a href="#">Sobre nosotros</a>
            <a href="#">Estamos contratando</a>
            <a href="#">Apoyo para</a>
            <a href="#">Encontrar tienda</a>
            <a href="#">Envío</a>
            <a href="#">Pago</a>
            <a href="#">Tarjeta de regalo</a>
            <a href="#">Regresó</a>
            <a href="html.html">Ayuda</a>
        </section>
        <section class="n-footer-area-3">
            <h3>Tienda</h3>
            <address>
                <p><i class="fa fa-fw fa-map-marker"></i> AllInOne</p>
                <p><i class="fa fa-fw fa-phone"></i> 809 000 0000</p>
                <p><i class="fa fa-fw fa-envelope"></i> info@allinone.com</p>
                
                <a href="#"><i class="fab fa-facebook w3-hover-opacity w3-large"></i></a>
                <a href="#"><i class="fab fa-instagram w3-hover-opacity w3-large"></i></a>
                <a href="#"><i class="fab fa-twitter w3-hover-opacity w3-large"></i></a>
                <a href="#"><i class="fab fa-pinterest-p w3-hover-opacity w3-large"></i></a>
                <a href="#"><i class="fab fa-snapchat w3-hover-opacity w3-large"></i></a>
                <a href="#"><i class="fab fa-linkedin w3-hover-opacity w3-large"></i></a>
                <a href="#"><i class='fab w3-hover-opacity w3-large'>&#xf167;</i></a>
                <a href="#"><i class='fab fa-whatsapp'></i></a>
                <a href="#"><i class='fab fa-vimeo-square'></i></a>
                <a href="#"><i class='fab fa-blogger'></i></a>
            </address>
            <br><br><br>
            <h3>Nosotros Acceptamos</h3>
            <a href="https://es.wikipedia.org/wiki/PayPal" target="_blank"><i class='fab fa-cc-paypal'></i></a>
            <a href="https://es.wikipedia.org/wiki/Mastercard" target="_blank"><i class='fab fa-cc-mastercard'></i></a> 
            <a href="https://es.wikipedia.org/wiki/Visa_(empresa)" target="_blank"><i class='fab fa-cc-visa'></i></a>
            <a href="https://es.wikipedia.org/wiki/Discover_Card" target="_blank"><i class='fab fa-cc-discover'></i></a> 
            <a href="https://es.wikipedia.org/wiki/American_Express" target="_blank"><i class='fab fa-cc-amex'></i></a>
        </section>
    </footer>
</section>
<!------------------------------------------------------------------------------
aside
------------------------------------------------------------------------------->
<div id="n-camisetas" class="n-categoria-contenido"><h2>Capisetas</h2></div>
<div id="n-vestidos" class="n-categoria-contenido"><h2>Vestidos</h2></div>
<div id="n-pantalones" class="n-categoria-contenido">
    <aside>
        <section>
            <h2>Masculinos</h2>
            <hr>
            <h3><a href="">Para hombres</a></h3>
            <ol>
                <li><a href="">APC</a></li>
                <li><a href="">Acne Studios</a></li>
                <li><a href="">Tom Ford</a></li>
                <li><a href="">Prada</a></li>
                <li><a href="">Polo Ralph Lauren</a></li>
                <li><a href="">Nudie Jeans</a></li>
                <li><a href="">Levi’s</a></li>
                <li><a href="">Ksubi</a></li>
                <li><a href="">Hugo Boss</a></li>
                <li><a href="">Gucci</a></li>
                <li><a href="">G-Star Raw</a></li>
                <li><a href="">Givenchy</a></li>
                <li><a href="">Fendi</a></li>
                <li><a href="">Dolce Gabbana</a></li>
                <li><a href="">DSquared2</a></li>
                <li><a href="">Diesel</a></li>
                <li><a href="">Calvin Klein</a></li>
                <li><a href="">Balenciaga</a></li>
                <li><a href="">AG Jeans</a></li>
            </ol>
        </section>
        <section>
            <h2>Femeninos</h2>
            <hr>
            <h3><a href="">Para mujeres</a></h3>
            <ol>
                <li><a href="">Levi's</a></li>
                <li><a href="">Lee</a></li>
                <li><a href="">Wrangler</a></li>
                <li><a href="">Topshop</a></li>
                <li><a href="">Paige</a></li>
                <li><a href="">Madewell</a></li>
                <li><a href="">Pepe Jeans</a></li>
                <li><a href="">Calvin Klein</a></li>
                <li><a href="">Zara</a></li>
                <li><a href="">RE/DONE</a></li>
                <li><a href="">Dolce & Gabbana</a></li>
                <li><a href="">GUESS</a></li>
                <li><a href="">B SIDES</a></li>
                <li><a href="">Askk NY</a></li>
                <li><a href="">The Feel Studio Inc</a></li>
                <li><a href="">Reiko Jeans</a></li>
                <li><a href="">Neuw Denim</a></li>
                <li><a href="">One Teaspoon</a></li>
                <li><a href="">J Brand Jeans</a></li>
            </ol>
        </section>
    </aside>
</div>
<div id="n-chaquetas" class="n-categoria-contenido"><h2>Chaquetas</h2></div>
<div id="n-deportivas" class="n-categoria-contenido"><h2>Deportivas</h2></div>
<div id="n-zapatos" class="n-categoria-contenido"><h2>Zapatos</h2></div>
<div id="n-boletin" class="n-categoria-contenido">
    <aside>
        <h2>Boletín informativo</h2>
        <p id="n-boletin-responde">
            Únase a nuestra lista de correo para recibir actualizaciones sobre recién llegados y ofertas especiales.
        </p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="n-boletin-envia" name="boletin">
            <label for="n-correo" hidden="">Correo</label>
            <p><input type="email" name="correo" id="n-correo"placeholder="Ingresar correo" required=""
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="alert('El Correo es Invalido.');"></p>
            <button type="submit" name="unirse">Unirse</button>
        </form>
    </aside>
</div>
<div id="n-subscribir" class="n-categoria-contenido">
    <aside>
        <h2>Suscribir</h2>
        <p id="n-suscriptor-responde">Para recibir ofertas especiales y trato VIP:</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="n-suscriptor-envia" name="suscriptor">
            <label for="n-correo" hidden="">Correo</label>
            <p><input type="email" name="correo" id="n-correo"placeholder="Ingresar correo" required=""
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="alert('El Correo es Invalido.');"></p>
            <button type="submit" name="suscribir">Suscribir</button>
        </form>
    </aside>
</div>
<div id="n-alerta-general"></div>
<script src="../../l/tienda/header.js" async=""></script>
<script src="../../l/tienda/l/carrito.js" defer=""></script>
<script src="../../l/tienda/l/boletines.js" defer=""></script>
<script src="../../l/tienda/l/suscriptores.js" defer=""></script>
</body>
</html>


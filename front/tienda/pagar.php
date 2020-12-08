<?php
    require_once '../../sql/tienda/Carrito.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>AllInOne: Tienda, Carrito</title>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<!--CSS-->
    <link rel="stylesheet" href="../../front-css/tienda/CascadeStyleSheet.css">
    <link rel="stylesheet" href="../../front-css/tienda/header.css">
    <link rel="stylesheet" href="../../front-css/tienda/nav.css">
    <link rel="stylesheet" href="../../front-css/tienda/carrito.css">
    <link rel="stylesheet" href="../../front-css/tienda/footer.css">
    <link rel="stylesheet" href="../../front-css/tienda/aside.css">
<!--JavaScript-->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        main > h2, main > p {
            font-family: 'Gadget', sans-serif;
        }
    </style>
</head>
<body class="n-grid">
<!--
    header
-->
<section class="n-grid-area-1">
    <header>
        <h1><a href="#n-all-in-one">All<span class="n-vertical">Tienda</span><span class="n-one">nOne</span></a></h1>
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
<!--
    nav
-->
<section class="n-grid-area-2">
    <nav>
        <!--<h2 hidden=""><a href="">Tienda</a></h2>-->
        <a href="http://localhost/AllInOne/index.php"><!--i class='fas fa-store-alt'></i--><i class='fas fa-home'></i></a> 
        <a href="perfil.php">Perfil</a> 
        <a href="carrito.php">Carrito</a>
        <a href="">Buscar</a>
    </nav>
</section>
<!--
    main
-->
<section class="n-grid-area-3">
    <main>
<?php
require_once '../../sql/Conexion.php';

    if(isset($_POST)) {
        is_numeric($subtotal = NULL);
        $correo = $_POST["correo"];
        
        foreach ($_SESSION["CARRITO"] as $indiceDeSesion => $datoDeSesion) {
            $subtotal = $GLOBALS['base']->conexion-> 
                real_escape_string($subtotal + ($datoDeSesion["PRECIO"] * $datoDeSesion["CANTIDAD"]));   
        }
        
        require_once '../../sql/tienda/descuento.php';
        
//        $nMySQL = $GLOBALS['base']->conexion->
//            query("INSERT INTO `ntablaventas` (`nID`, `nIDDeTransaccion`, `nIDDelCliente`, `nPayPalDatos`, `nTotal`, "
//            . "`nCorreo`, `nEstado`, `nFecha`) VALUES (NULL, '', '', '', '$total', '$correo', 'Incompleta', NOW())");   
    }
?>
        <h2>¡Último paso!</h2>
        <p>Estás a punto de pagar con paypal el importe de: <b><?php echo number_format($total, 2); ?></b></p>
    <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
    <!-- Include the PayPal JavaScript SDK -->
        <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
    
        <script>
            // Render the PayPal button into #paypal-button-container
            paypal.Buttons({
                env: 'sandbox', // sandbox | production
                //locale: 'en_US', //configuración regional //Predeterminado: en_US //https://developer.paypal.com/docs/integration/direct/rest/locale-codes/#supported-locale-codes
        //        style: { // Especifique el estilo del botón.
        //            label: 'buynow',
        //            fundingicons: true, // optional
        //            branding: true, // optional
        //            size:  'medium', // small | medium | large | responsive
        //            shape: 'pill',   // pill | rect
        //            color: 'white'   // gold | blue | silver | black
        //        },
            // ID de clientes de PayPal: sustitúyalos por los suyos // Create a PayPal app: https://developer.paypal.com/developer/applications/create
                client: {
                    sandbox: 'AdJSRKpP6XeTgurC6KG9mkWTRhHEyblNiwJoAbrMWn4arZWqn7dMStRP7wFonTVsRzhDw5NpkgkWoI9y' //, production: '<insert production client id>'
                },
                // Set up the transaction
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '<?php echo number_format($total, 2); ?>'
                            }
                        }]
                    });
                },
                // Finalize the transaction
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        // Show a success message to the buyer
                        alert('Transaction completed by ' + details.payer.name.given_name + '!');
                        window.location = "Transaccion.php?paymentToken="+details.id+"&paymentID="+details.id;
                    });
                }
            }).render('#paypal-button-container');
        </script>
    </main>
</section>
<!--
    article
-->
<!--<section class="n-grid-area-4">
    <article>
  
    </article>
</section>-->
<!--
    footer (1)
-->
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
<!--
    footer (2)
-->
<section class="n-grid-area-6">
    <footer id="n-all-in-one">
        <section class="n-desarrollador">
            <p>Desarrollado por <strong>Neury Eleasar Aguasvivas Lorenzo</strong> con:</p>
            <hr>
            <a href="https://www.w3.org/TR/html5/" title="HTML5" target="_blank"><i class="fab">&#xf13b;</i></a>
            <a href="https://www.w3.org/TR/css-2017/" title="CSS3" target="_blank"><i class='fab'>&#xf38b;</i></a>
            <a href="https://developer.mozilla.org/es/" title="JavaScipt" target="_blank"><i class='fab'>&#xf3b9;</i></a>
            <a href="http://php.net/" title="PHP" target="_blank"><i class='fab'>&#xf457;</i></a>
            <a href="https://www.mysql.com/" title="MySQL" target="_blank"><i class='fas'>&#xf1c0;</i></a>
            <a href="https://netbeans.org/" title="NetBeans" target="_blank"><i class='fas'>&#xf1b2;</i></a>
            <a href="https://www.apachefriends.org/es/index.html" title="XAMPP" target="_blank"><i class='fas'>&#xf233;</i></a>
        </section>
        <section class="n-desarrollos">
            <article>
                <h4><a href="http://localhost/AllInOne/index.php">Tienda</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Red Social</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
            <article>
                <h4><a href="">Demo</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </article>
        </section>
    </footer>
</section>
<!--
    aside
-->
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
<script>

</script>
<script src="../../show/tienda/header.js" async=""></script>
<script src="../../show/tienda/adaptador/boletines.js" defer=""></script>
<script src="../../show/tienda/adaptador/suscriptores.js" defer=""></script>
</body>
</html>


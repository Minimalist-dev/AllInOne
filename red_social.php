<html>
    <head>
        <title>AllInOne | Red Social</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="http://localhost/AllInOne/i_img/i/neury-dev.jpg" type="image/jpg" sizes="16x16">
        <!--CSS-->
        <link rel="stylesheet" href="http://localhost/AllInOne/i_css/i/root.css" />
        <link rel="stylesheet" href="i_css/red_social/red_social.css">
        <!--Iconos-->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
<body>
    <section class="n-form-contenedor">
        <section class="fila">
            <header>
                <h1><a href="http://localhost/AllInOne/index.php">AllInOne</a></h1>
                <p class="resultado"></p>
            </header>
            <section class="linea">
                <span>or</span>
            </section>
            <section class="columna">
                <form action="s/red_social/s/Iniciar.php" method="POST" autocomplete="">
                    <h3 class="titulo">Iniciar</h3>
                    <section class="input-contenedor">
                        <input type="email" name="correo" placeholder="Correo" required="" 
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                            oninvalid="Globales.validarCorreo()">
                    </section>
                    <section class="input-contenedor">
                        <input type="password" name="codigo" placeholder="Contraseña" required="">
                    </section>
                    <button type="submit" name="iniciar">Iniciar</button>
                </form>
            </section>
            <section class="columna">
                <form action="s/red_social/s/Registrar.php" method="POST" autocomplete=""> 
                   <h3 class="titulo">Registrarse</h3>
                    <section class="input-contenedor">
                        <i class="fas fa-envelope-open-text"></i>
                        <input type="email" name="correo" placeholder="Correo" required=""
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                            oninvalid="Globales.validarCorreo()">
                    </section>
                    <section class="input-contenedor">
                        <i class="fas fa-key"></i>
                        <input type="password" name="codigo" placeholder="Contraseña" required="">
                    </section>
                    <button type="submit" name="registrar">Registrarse</button>
                </form>
            </section>
        </section>
    </section>
<script src="l/globales.js"></script>
</body>
</html>

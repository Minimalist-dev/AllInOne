<?php require_once '../../s/red_social/s/SesionIniciada.php'; ?>
<html>
<head>
    <title>AllInOne | Red Social | Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/AllInOne/i_img/i/neury-dev.jpg" type="image/jpg" sizes="16x16">
    <!--CSS-->
    <link rel="stylesheet" href="http://localhost/AllInOne/i_css/i/root.css" />
    <link rel="stylesheet" href="../../i_css/red_social/header.css">
    <link rel="stylesheet" href="../../i_css/red_social/nav.css"/>
    <link rel="stylesheet" href="../../i_css/red_social/main.css"/>
    <link rel="stylesheet" href="../../i_css/red_social/article.css"/>
    <link rel="stylesheet" href="../../i_css/red_social/aside.css"/>
    <!--Iconos-->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<!------------------------------------------------------------------------------
header
------------------------------------------------------------------------------->
    <header id="n-header" class="n-grid-header">
        <section class="area-1">
            <h1><a href="http://localhost/AllInOne/index.php" style="display: block;">AllInOne</a></h1>
        </section>
        <section class="area-2">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" id="form" enctype="multipart/form-data">
                <!--<label for="buscar">Buscar:</label>-->
                <input type="search" name="buscar" id="buscar" placeholder="Buscar gente...">
                <!--            <button type="submit" name="enviar" id="enviar" value="Enviar">Enviar</button>
                            <input type="submit" name="enviar" id="enviar" value="Enviar">-->
            </form>
        </section>
        <section class="area-3">
            <section class="sesion-1">
                <a href="" class="n-header-maximo-oculto"><i class='fas fa-chalkboard-teacher'></i></a>
                <a href="" class="n-header-maximo-oculto"><i class="fas fa-envelope-open"></i></a>
                <a href="" class="n-header-maximo-oculto"><i class="fas fa-bell-slash"></i></a>
            </section>
            <section class="n-header-mediano">
                <section id="n-header-mediano">
                    <a href="" class="n-header-maximo-oculto"><i class="fas fa-envelope-open"></i></a>
                    <a href="" class="n-header-maximo-oculto"><i class="fas fa-bell-slash"></i></a>
                </section>
                <span class="n-header-span" id="n-header-span">
                    <a href="" class="n-header-maximo-oculto"><i class='fas fa-chalkboard-teacher'></i></a>
                    <a href="javascript:void(0);" id="n-icono-mediano" class="n-icono-mediano" onclick="ejecutarHeader.mediano();">&#9776;</a>
                </span>
                <!--<a href="javascript:void(0);" id="n-icono-mediano" class="n-icono-mediano" onclick="mediano()">&#9776;</a>-->
            </section>
<!--            <section class="n-header-minimo-oculto">
                <section class="n-header-minimo" id="n-header-minimo">
                    <a href="historial.php">Historial</a>
                    <a href="insertar.php">Insertar</a>
                    <a href="estadisticas.php">Estadisticas</a>
                </section>
                <a href="javascript:void(0);" class="n-icono-minimo" onclick="header()">&#9776;</a>
            </section>-->
            <!--<a href="javascript:void(0);" class="n-icono-minimo n-header-maximo-oculto" onclick="header()">&#9776;</a>-->
            <section>
                <img src="../../i_img/red_social/i/mist.jpg" class="n-img-portada-header"alt="alt"/>
                <img src="../../i_img/red_social/i/firefoxos.png" class="n-img-perfil-header" onclick="headerNav()" alt="alt"/>
            </section>
        </section>
    </header>
    <div id="n-header-nav" class="n-header-nav-contenedor">
        <a href="perfil.php">Perfil</a>
        <a href="red_social/i/perfil/editar.php">Editar</a>
        <a href="../../s/CerrarSesion.php">Salir</a>
    </div>
<!------------------------------------------------------------------------------
nav
------------------------------------------------------------------------------->
    <section class="n-grid">
        <section class="area-1">
            <nav>
                <section class="principal">
                    <a href="inicio.php"><i class='fas fa-house-user'></i> <span>Inicio</span></a>
                    <a href="#"><i class='fas fa-search'></i> <span>Buscar</span></a>
                    <a href="usuarios.php"><i class='fas fa-users'></i> <span>Usuarios</span></a>
                    <a href="#"><i class='fas fa-file-alt'></i> <span>Publicaciones</span></a>
                    <a href="#"><i class='fas fa-images'></i> <span>Imagenes</span></a>
                    <a href="#"><i class='fas fa-play'></i> <span>Audios</span></a>
                    <a href="#"><i class='fas fa-video'></i> <span>videos</span></a>
                    
                </section>
                <section class="segundario">
                    <ul>
                        <li><a href="#">Aserca de</a></li>
                        <li><a href="#">Mapa del sitio</a></li>
                        <li><a href="#">Idioma</a></li>
                        <li><a href="#">Otros</a></li>
                    </ul>
                </section>
            </nav>
        </section>
<!------------------------------------------------------------------------------
main
------------------------------------------------------------------------------->
        <section class="area-2">
            <main>

            </main>
        </section>
<!------------------------------------------------------------------------------
article: publicaciones
------------------------------------------------------------------------------->
        <section class="area-3">
            <div class="publicacion">

            </div>
        </section>
        <section class="area-4">
            <aside>
                <h4 class="titulo">Solicitudes de amistad</h4>
                <section>
                    <img src="../../i_img/red_social/i/avatar3.png" alt="alt"/>
                    <h5>Jonh Doe</h5>
                    <section>
                        <button class="aceptar"><i class='fas fa-user-friends'></i></button>
                        <button class="rechazar"><i class='fas fa-user-slash'></i></button>
                    </section>
                </section>
                <section>
                    <img src="../../i_img/red_social/i/avatar3.png" alt="alt"/>
                    <h5>Jonh Doe</h5>
                    <section>
                        <button class="aceptar"><i class='fas fa-user-friends'></i></button>
                        <button class="rechazar"><i class='fas fa-user-slash'></i></button>
                    </section>
                </section>
            </aside>
        </section>
    </section>
<script src="../../l/red_social/i/header.js" async=""></script>
<!--<script src="../../show/red-social/main.js" defer=""></script>-->
<script src="../../l/red_social/l/publicacionInicio.js" defer=""></script>
<script src="../../l/red_social/l/publicacionMenuInicio.js" defer=""></script>
</body>
</html> 

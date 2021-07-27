<?php require_once '../../s/red_social/s/SesionIniciada.php'; ?>
<html>
<head>
    <title>AllInOne | Red Social | Perfil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/AllInOne/i_img/i/neury-dev.jpg" type="image/jpg" sizes="16x16">
    <!--CSS-->
    <link rel="stylesheet" href="http://localhost/AllInOne/i_css/i/root.css" />
    <link rel="stylesheet" href="../../i_css/red_social/header.css" />
    <link rel="stylesheet" href="../../i_css/red_social/perfil/perfil.css" />
    <link rel="stylesheet" href="../../i_css/red_social/perfil/nav.css" />
    <link rel="stylesheet" href="../../i_css/red_social/perfil/menu.css" />
    <link rel="stylesheet" href="../../i_css/red_social/perfil/article.css" />
    <link rel="stylesheet" href="../../i_css/i/flechas.css" />
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
                <a href="http://localhost/AllInOne/i/red_social/inicio.php"><i class='fas fa-home'></i></a>
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
            <section class="dropdown" style="z-index: 9;">
                <img src="../../i_img/red_social/i/mist.jpg" class="n-img-portada-header"alt="alt"/>
                <img src="../../i_img//red_social/i/firefoxos.png" class="n-img-perfil-header" onclick="headerNav()" alt="alt"/>
            </section>
        </section>
    </header>
    <div id="n-header-nav" class="n-header-nav-contenedor">
        <a href="#">Perfil</a>
        <a href="perfil/editar.php">Editar</a>
        <a href="../../s/CerrarSesion.php">Salir</a>
    </div>
    <section class="n-grid">
<!------------------------------------------------------------------------------ 
main
------------------------------------------------------------------------------->
        <section class="area-1">
            <main>
                <img class="portada" alt="portada"/>
                <section class="contenedor">
                    <img class="foto" alt="foto"/>
                    <!--<h2>Neury E. Aguasvivas L.</h2>-->
                    <section class="perfil-nav">
                        <!--<button><i class='fas fa-user-friends'></i></button>-->
                        <!--<button><i class='fas fa-comments'></i></button>-->
                    </section>
                </section>
            </main>
        </section>
<!------------------------------------------------------------------------------
nav 
------------------------------------------------------------------------------->
        <section class="area-2">
            <nav>
                <ul>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Amigos</a></li>
                    <li><a href="perfil/chats.php">Chats</a></li>
                    <li><a href="perfil/fotos.php">Fotos</a></li>
                    <li><a href="#">Audios</a></li>
                    <li><a href="#">Videos</a></li>
                    <li><a href="#">Solicitudes</a></li>
                    <li><a href="#">Visitas</a></li>
                    <li><a href="#">Notificaciones</a></li>
                    <li><a href="#"><i class='fas fa-search'></i></a></li>
                </ul>
            </nav>
        </section>
<!------------------------------------------------------------------------------
Publicar
------------------------------------------------------------------------------->
        <section class="area-3">
            <section>
                <h5 class="titulo">Publicar? <small id="res"></small></h5>
                <section class="menu">
                    <button class="enlace" onclick="Menu.abrir(event, 'n-articulo')"><i class='fas fa-file-alt'></i></button>
                    <button class="enlace" onclick="Menu.abrir(event, 'n-imagen')"><i class='fas fa-images'></i></button>
                    <button class="enlace" onclick="Menu.abrir(event, 'n-audio')"><i class='fas fa-play'></i></button>
                    <button class="enlace" onclick="Menu.abrir(event, 'n-video')"><i class='fas fa-video'></i></button>
                </section>  
                <div id="n-articulo" class="contenido">
                    <button class="cerrar" onclick="Menu.cerrar()"><i class="flechas up"></i></button>
                    <form action="" method="POST" name="todo" id="todo" enctype="multipart/form-data">
                        <label for="publicacion" class="etiqueta">Publicación</label>
                        <textarea name="publicacion" id="publicacion" rows="3" cols="10" maxlength='140' placeholder="Publicación..." required=""></textarea>
                        <label for="imagen" class="cargar-archivo">Seleccionar Imagen</label>
                        <input type="file" name="imagen" id="imagen" hidden="" required="">
                        <input type="text" disabled="" id="img-nombre">
                        <button type="submit" name="publicar-todo" id="publicar-todo" value="Publicar Todo">Publicar</button>
                    </form>
                </div>

                <div id="n-imagen" class="contenido">
                    <button class="cerrar" onclick="Menu.cerrar()"><i class="flechas up"></i></button>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" id="form" enctype="multipart/form-data">
                        <label for="imagen" class="cargar-archivo">Seleccionar Imagen</label>
                        <input type="file" name="imagen" id="imagen" hidden="">
                        <input type="text" disabled="">
                        <button type="submit" name="subir-archivo" id="subir-archivo" value="Imagen">Subir</button>
                    </form>
                </div>
                <div id="n-audio" class="contenido">
                    <button class="cerrar" onclick="Menu.cerrar()"><i class="flechas up"></i></button>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" id="form" enctype="multipart/form-data">
                        <label for="audio" class="cargar-archivo">Seleccionar Audio</label>
                        <input type="file" name="audio" id="audio" hidden="">
                        <input type="text" disabled="">
                        <button type="submit" name="subir-archivo" id="subir-archivo" value="Audio">Subir</button>
                    </form>
                </div>
                <div id="n-video" class="contenido">
                    <button class="cerrar" onclick="Menu.cerrar()"><i class="flechas up"></i></button>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" id="form" enctype="multipart/form-data">
                        <label for="video" class="cargar-archivo">Seleccionar Video</label>
                        <input type="file" name="video" id="video" hidden="">
                        <input type="text" disabled="">
                        <button type="submit" name="subir-archivo" id="subir-archivo" value="Video">Subir</button>
                    </form>
                </div>
            </section>
            <div class="publicacion">
                <!--publicaiones-->   
            </div>
        </section>
        <section class="area-4">
            <section class="sesion-1">
                <h2  class="nombre titulo"></h2>
                <p class="nacimiento"></p>
                <p class="correo"></p>
                <p class="numero"></p>
                <p class="sexo"></p>
                <p class="estado"></p>
                <p class="pais"></p>
                <p class="ciudad"></p>
            </section>
            <section class="sesion-2">
                <h4 class="titulo">Intereses</h4>
                <p>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>text</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>span</span>
                    <span>text</span>
                </p>
            </section>
            <section class="sesion-3">
                <h4 class="titulo">Otros</h4>
                <p>text</p>
                <p>text</p>
                <p>text</p>
                <p>text</p>
                <p>text</p>
                <p>text</p>
            </section>
        </section>
    </section>
<script src="../../l/red_social/i/header.js" async=""></script>
<script src="../../l/red_social/l/perfil.js" async=""></script>
<script src="../../l/red_social/i/menu.js" defer=""></script>
<script src="../../l/red_social/l/publicacion.js" defer=""></script>
<script src="../../l/red_social/l/publicar.js" defer=""></script>
</body>
</html>

<?php require_once '../../../s/red_social/s/SesionIniciada.php'; ?>
<html>
<head>
    <title>Usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../i_css/red_social/header.css">
    <link rel="stylesheet" href="../../../i_css/red_social/perfil/perfil.css"/>
    <link rel="stylesheet" href="../../../i_css/red_social/perfil/chat.css" />
    <link rel="stylesheet" href="../../../i_css/red_social/perfil/nav.css"/>
    <link rel="stylesheet" href="../../../i_css/red_social/perfil/menu.css"/>
    <link rel="stylesheet" href="../../../i_css/red_social/perfil/article.css"/>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<!-- 
    header
-->
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
                <a href="http://localhost/AllInOne/front/red_social/inicio.php"><i class='fas fa-home'></i></a>
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
                <img src="../../../i_img/red_social/i/mist.jpg" class="n-img-portada-header"alt="alt"/>
                <img src="../../../i_img/red_social/i/firefoxos.png" class="n-img-perfil-header" onclick="headerNav()" alt="alt"/>
            </section>
        </section>
    </header>
    <div id="n-header-nav" class="n-header-nav-contenedor">
        <a href="#">Perfil</a>
        <a href="../../front/red_social/perfil/editar.php">Editar</a>
        <a href="../../sql/CerrarSesion.php">Salir</a>
    </div>
    <section class="n-grid">
<!--
    main 
-->
        <section class="area-1">
            <main>
                <img src="../../../i_img/red_social/i/foto.jpg" class="portada" alt="alt"/>
                <section class="contenedor">
                    <img class="foto" alt=""/>
                    <section class="perfil-nav">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="amigo" id="amigo">
                            <input type="text" value="" hidden="" name="yo" id="yo">
                            <input type="text" value="" hidden="" name="usuario" id="usuario">
                            <input type="text" value="" hidden="" name="amigos" id="amigos">
                            <button type="submit" name="" id="amigo-boton" value="">
                                <i id="amistad-icono" class=''></i>
                            </button>
                        </form>
<!--                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="" id="">
                            <input type="text" value="" hidden="" name="" id="">
                            <input type="text" value="" hidden="" name="" id="">
                            <input type="text" value="" hidden="" name="" id="">-->
                            <button onclick="openForm()">
                                <i id="" class='fas fa-comments'></i>
                            </button>
                        <!--</form>-->
                    </section>
                </section>
            </main>
        </section>
<!--
    chat 
-->
        <div class="chat-popup" id="myForm">
            <form action="" method="POST" name="chat" id="chat" class="form-container">
                <label for="mensaje"><b>Mensaje</b></label>
                <textarea placeholder="Mensaje.." name="mensaje"></textarea>
                <!--<input type="hidden" id="usuario" name="usuario">-->
                <button type="submit" name="chat-boton" class="btn send" onclick="Chat.mensaje()">Send</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
            <!--<p id="chat-responde"></p>-->
        </div>
<!--
    nav 
-->
        <section class="area-2">
            <nav>
                <ul>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Amigos</a></li>
                    <li><a href="perfil/chat.php">Chat</a></li>
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
        <section class="area-3">
            <p id="amigo-responde"></p>
<!--            <section>
                <p>Publicar?</p>
                <section class="section-nav">
                    <button class="tablinks" onclick="openCity(event, 'n-articulo')"><i class='fas fa-file-alt'></i></button>
                    <button class="tablinks" onclick="openCity(event, 'n-imagen')"><i class='fas fa-images'></i></button>
                    <button class="tablinks" onclick="openCity(event, 'n-audio')"><i class='fas fa-play'></i></button>
                    <button class="tablinks" onclick="openCity(event, 'n-video')"><i class='fas fa-video'></i></button>
                </section>  
                <div id="n-articulo" class="tabcontent">
                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                    <form action="../../sql/red-social/Publicar.php" method="POST" name="form-articulo" id="form-articulo" enctype="multipart/form-data">
                        <label for="titulo" class="etiqueta">Titulo</label>
                        <input type="text" name="titulo" id="titulo" placeholder="Titulo...">
                        <label for="articulo" class="etiqueta">Publicación</label>
                        <textarea name="publicacion" id="publicacion" rows="5" cols="10" placeholder="Publicación..." required=""></textarea>
                        <label for="imagen" class="cargar-archivo">Seleccionar Imagen</label>
                        <input type="file" name="imagen" id="imagen" hidden="" required="">
                        <input type="text" disabled="">
                        <button type="submit" name="subir" id="subir" value="Articulo">Subir</button>
                    </form>
                </div>

                <div id="n-imagen" class="tabcontent">
                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" id="form" enctype="multipart/form-data">
                        <label for="imagen" class="cargar-archivo">Seleccionar Imagen</label>
                        <input type="file" name="imagen" id="imagen" hidden="">
                        <input type="text" disabled="">
                        <button type="submit" name="subir-archivo" id="subir-archivo" value="Imagen">Subir</button>
                    </form>
                </div>
                <div id="n-audio" class="tabcontent">
                    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" id="form" enctype="multipart/form-data">
                        <label for="audio" class="cargar-archivo">Seleccionar Audio</label>
                        <input type="file" name="audio" id="audio" hidden="">
                        <input type="text" disabled="">
                        <button type="submit" name="subir-archivo" id="subir-archivo" value="Audio">Subir</button>
                    </form>
                </div>
                <div id="n-video" class="tabcontent">
                    <span class="topright">&times</span>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="form" id="form" enctype="multipart/form-data">
                        <label for="video" class="cargar-archivo">Seleccionar Video</label>
                        <input type="file" name="video" id="video" hidden="">
                        <input type="text" disabled="">
                        <button type="submit" name="subir-archivo" id="subir-archivo" value="Video">Subir</button>
                    </form>
                </div>
            </section>-->
            <section class="publicacion">
                
                
                
<!--                <article>
                    <section class="articulo-head">
                        <section>
                            <img src="../../front-multimedia/red-social/imagen/avatar3.png" class="foto" alt="alt"/>
                            <h2>Neury</h2>
                        </section>  
                        <section>
                            <span class="">1 de enero 2021</span> <button><i class='fas fa-ellipsis-v'></i></button>
                        </section>
                    </section>
                    <hr>
                    <section class="articulo-body">
                        <h3>Articulo</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <img src="../../front-multimedia/red-social/imagen/app.jpg" alt="" style="width: 100%;"/>
                    </section>
                    <hr>
                    <section class="articulo-footer">
                        <section><button><i class='fas fa-thumbs-up'></i></button></section><section><span class="">100</span></section>
                        <section><button><i class='fas fa-thumbs-down'></i></button></section><section><span class="">100</span></section>
                        <section><button><i class='fas fa-comments'></i></button></section><section><span class="">100</span></section>
                        <section><button><i class='fas fa-share'></i></button></section><section><span class="">100</span></section>
                    </section>
                </article>-->
                
                
                
            </section>
        </section>
        <section class="area-4">
            <section class="sesion-1">
                <h2  class="nombre"></h2>
                <p class="nacimiento"></p>
                <p class="correo"></p>
                <p class="numero"></p>
                <p class="sexo"></p>
                <p class="estado"></p>
                <p class="pais"></p>
                <p class="ciudad"></p>
            </section>
            <section class="sesion-2">
                <h4>Intereses</h4>
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
                <h4>Otros</h4>
                <p>text</p>
                <p>text</p>
                <p>text</p>
                <p>text</p>
                <p>text</p>
                <p>text</p>
            </section>
        </section>
    </section>
<script src="../../../l/red_social/i/header.js" async=""></script>
<script src="../../../l/red_social/l/usuario.js" async=""></script>
<!--<script src="../../show/red-social/main.js" defer=""></script>-->
<script src="../../../l/red_social/l/publicacionDeUsuario.js" defer=""></script>
<script src="../../../l/red_social/l/amigos.js" defer=""></script>
<script src="../../../l/red_social/l/chat.js" defer=""></script>
<script>

</script>
</body>
</html>

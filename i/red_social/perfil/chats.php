<html>
<head>
    <title>AllInOne | Red Social | Chats</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/AllInOne/i_img/i/neury-dev.jpg" type="image/jpg" sizes="16x16">
    <!--CSS-->
    <link rel="stylesheet" href="http://localhost/AllInOne/i_css/i/root.css" />
    <link rel="stylesheet" href="../../../i_css/red_social/header.css">
    <link rel="stylesheet" href="../../../i_css/red_social/perfil/chats.css"/>
    <!--Iconos-->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<!------------------------------------------------------------------------------ 
header
-------------------------------------------------------------------------------->
    <header id="n-header" class="n-grid-header">
        <section class="area-1">
            <h1><a href="http://localhost/AllInOne/index.php" style="display: block;">AllInOne</a></h1>
        </section>
        <section class="area-2">
            <form action="" method="POST" name="form" id="form" enctype="multipart/form-data">
                <input type="search" name="buscar" id="buscar" placeholder="Buscar gente...">
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
                <a href="javascript:void(0);" id="n-icono-mediano" class="n-icono-mediano" onclick="mediano()">&#9776;</a>
            </section>
            <section class="n-header-minimo-oculto">
                <section class="n-header-minimo" id="n-header-minimo">
                    <a href="historial.php">Historial</a>
                    <a href="insertar.php">Insertar</a>
                    <a href="estadisticas.php">Estadisticas</a>
                </section>
                <a href="javascript:void(0);" class="n-icono-minimo" onclick="header()">&#9776;</a>
            </section>
            <a href="javascript:void(0);" class="n-icono-minimo n-header-maximo-oculto" onclick="header()">&#9776;</a>
            <section class="dropdown" style="z-index: 9;">
                <img src="../../../i_img/red_social/i/mist.jpg" class="n-img-portada-header"alt="alt"/>
                <img src="../../../i_img/red_social/i/firefoxos.png" class="n-img-perfil-header" onclick="headerNav()" alt="alt"/>
            </section>
        </section>
    </header>
    <div id="n-header-nav" class="n-header-nav-contenedor">
        <a href="../../i/red_social/perfil/editar.php">Editar</a>
        <a href="#">Salir</a>
    </div>
<!------------------------------------------------------------------------------
    Chats 
------------------------------------------------------------------------------->
<section class="n-grid">
    <section class="area-1">
        <nav id="contactados">

        </nav>
    </section>
    <section class="area-2">
        <main class="chat">

        </main>
    </section>
    <section class="area-3 chat-formulario">
         <form action="" method="POST" name="chat-para" id="chat-para" class="form-container">
            <textarea rows="3" placeholder="Mensaje.." name="re-mensaje" required></textarea>
            <input type="hidden" id="chat-con" name="chat-con">
            <button type="submit" name="chat-boton" class="btn send" onclick="ChatCon.reMensaje()">Send</button>
        </form>
    </section>
</section>
<script src="../../../l/red_social/i/header.js" async=""></script>
<script src="../../../l/red_social/l/chats.js"></script>
<!--<script src="../../../show/red-social/adaptador/contactados.js"></script>-->
</body>
</html>

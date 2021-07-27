<!DOCTYPE html>
<html>
<head>
    <title>AllInOne | Tienda | Perfil</title>
    <meta charset="UTF-8">
    <meta name="viewport" n-contenido="width=device-width, initial-scale=1.0">
    <link rel="icon" href="i_img/i/neury-dev.jpg" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="../../i_css/tienda/CascadeStyleSheet.css">
    <link rel="stylesheet" href="../../i_css/tienda/nav.css">
    <link rel="stylesheet" href="../../i_css/tienda/perfil.css">
<!--JavaScript-->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<section>
    <nav>
        <a href="../../tienda.php"><i class='fas fa-home'></i></a> 
        <a href="perfil.php">Perfil</a> 
        <a href="carrito.php">Carrito</a>
        <a href="">Buscar</a>
    </nav>
    <section class="n-contenedor" style="background-image: url('jeans.jpg')">
        <section class="n-contenido">
            <section>
                <img src="../../i_img/tienda/i/avatar2.png" alt="" loading="lazy">
            </section>
            <section>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                name="perfil" id="n-perfil-envia" class="n-perfilado">
                    <input type="email" name="correo" placeholder="Ingresar correo" required=""
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="alert('El Correo es Invalido.');">
                    <button type="submit" name="suscriptor">&#10095;</button>
                </form>
            </section>
            <section id="n-perfil-responde">
                <p>
                    Ingresa tu correo y verifica si estas perfilado en la <b>Suscripción</b> o el <b>Boletín</b>.
                </p>
            </section>
        </section>
    </section>
</section>
<script src="../../l/tienda/l/perfil.js" defer=""></script>
</body>
</html>

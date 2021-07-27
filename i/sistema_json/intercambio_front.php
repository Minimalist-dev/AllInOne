<!DOCTYPE html>
<html>
<head>
    <title>Intercambio Front</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="last-modified" content="Thu, 18 Nov 2020 19:11:42 GMT">
    <link rel="stylesheet" href="../../i_css/sistema_json/sistema_JSON.css">
    <link rel="stylesheet" href="../../i_css/sistema_json/intercambio_front.css">
    <link rel="stylesheet" href="../../i_css/i/flechas.css">
</head>
<body>
     <header>
        <p title="Atras"><a href="http://localhost/AllInOne/index.php"><i class="flecha left"></i>Neury-dev</a></p>
    </header>
    <section class="n-grid">
        <section class="area-1">
            <h2>Intercambio Front</h2>
            <hr>
            <section>
                <a href="../../sistema_JSON.php">JSON</a>
                <a href="">Intercambio Front</a>
            </section>
            <hr>
            <div id="n-respuesta"></div>
        </section>
        <section class="area-2">
            <h3>Entrada de datos</h3>
        </section>
        <section class="area-3">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="crear" id="crear">
                <label for="id">
                    <input type="text" name="id" id="id" value="" required="">
                </label>
                <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" required="">
                <label for="marca">Marca</label>
                    <input type="text" name="marca" id="marca" placeholder="Ingresar marca" required="">
                <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingresar nombre" required="">
                <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" placeholder="Ingresar precio" required="">
                <input type="submit" name="crud" id="crud" value="Crear">
            </form>
        </section>
        <section class="area-4">
<!--            <form action="<?php // echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="buscar" id="buscar">
                <label for="buscar">Buscar:</label>
                <input type="search" name="buscar" id="buscar" placeholder="Buscar...">
            </form>-->
        </section>
        <section class="area-5">
            <div>
            <table>
                <!--<caption>Salida de datos</caption>-->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Marca</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th colspan="2">Gestionar</th>
                    </tr>
                </thead>
                <tbody id="n-leer">
              
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                           
                        </td>
                    </tr>
                 </tfoot>
            </table>
            </div>
        </section>
    </section>
<script src="../../l/sistema_json/l/crud_de_intercambio_front.js" defer=""></script>
</body>
</html>

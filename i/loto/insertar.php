<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar</title>
    <link rel="stylesheet" href="../../i_css/loto/header.css">
    <link rel="stylesheet" href="../../i_css/loto/nav.css">
    <link rel="stylesheet" href="../../i_css/loto/insertar.css">
</head>
<body>
    <?php require_once '../../s/loto/header_nav.php'; ?>
    
    <form action="../../s/loto/insertar.php" method="post" enctype="multipart/form-data">
        <p><input type="date" name="fecha" required="" style="width: 94%;" required=""></p>
        <p><input type="number" min="1" max="2760691" name="sorteo" placeholder="Sorteo (2760681)" required=""></p>
        <p><input type="text" name="loto" placeholder="Loto (01 02 03 04 05 06)" required=""
            pattern="[0-3][0-9][ \t\n\x0B\f\r][0-3][0-9][ \t\n\x0B\f\r][0-3][0-9][ \t\n\x0B\f\r][0-3][0-9][ \t\n\x0B\f\r][0-3][0-9][ \t\n\x0B\f\r][0-3][0-9]$" 
            title="01 09 17 25 33 38"
        ></p>
        <p><input type="number" min="1" max="10" name="lotoMas" placeholder="LotoMas (10)" required=""></p>
        <p><input type="number" min="1" max="15" name="superMas" placeholder="SuperMas (15)" required=""></p>
        <button type="submit" name="nRegistrarSorteo">Registrar Sorteo</button>
    </form>
    
<script type="text/javascript" src="../../l/loto/nav.js"></script>
<script src="../../l/loto/insertar.js"></script>
</body>
</html>
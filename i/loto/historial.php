<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Historial</title>
    <link rel="stylesheet" href="../../i_css/loto/header.css">
    <link rel="stylesheet" href="../../i_css/loto/nav.css">
    <link rel="stylesheet" href="../../i_css/loto/historial.css">
</head>
<body>
    <?php require_once '../../s/loto/header_nav.php'; ?>
    
    <section>
<!-- Busqueda con AJAX -->
        <p><input type="text" placeholder="Historial: Buscar coincidencia..." onkeyup="buscarSorteo(this.value)"></p>
        <span id="mostrarHistorial"> <?php require_once '../../s/loto/historial.php'; ?> </span>
    </section>
    
    <script type="text/javascript" src="../../l/loto/nav.js"></script>
<script src="../../l/loto/historial.js"></script>
</body>
</html>

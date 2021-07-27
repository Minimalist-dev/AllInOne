<?php

session_start();
require_once '../Conexion.php';

class Sesion {

    public function
    administrador() {
        $correo = htmlspecialchars($_REQUEST["correo"]);
        $codigo = htmlspecialchars($_REQUEST["codigo"]);

        $sql = $GLOBALS["base"]->conexion->
                query("SELECT correo, codigo FROM Admin WHERE correo='" . $correo . "' AND codigo='" . $codigo . "'");
        $administrador = $sql->fetch_all(MYSQLI_ASSOC);

        if (!empty($administrador)) {
            $_SESSION['sesion'] = $correo;
            header("location: ../../i/tienda/interior.php");
        } elseif (empty($administrador)) {
            echo "No tiene permiso.";
            echo '<meta http-equiv="refresh" content="3; url= ../../i/tienda/perfil.php" />';
        } else {
            echo "Erro----------------------";
        }
    }

}

$sesion = new Sesion();
$iniciar = $sesion->administrador();
?>

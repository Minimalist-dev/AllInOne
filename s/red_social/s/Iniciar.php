<?php
session_start();
require_once "../../Conexion.php";
require_once '../../Globales.php';

final class Iniciar extends Globales {
    private $sql;
    private $resultado;
    private $johnDoe;
    
    final public function 
    sesion() {
        if(isset($_POST["iniciar"])) {
            $correo = self::probarEntrada($_POST["correo"]);
            $codigo = self::probarEntrada($_POST["codigo"]);

            $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT id, correo, codigo FROM `Usuarios` "
                . "WHERE correo = '".$correo."' AND codigo = '".$codigo."' LIMIT 1");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
        
            if($this->resultado) {
                foreach ($this->resultado as $this->johnDoe):
                   if($correo === $this->johnDoe['correo'] and $codigo === $this->johnDoe['codigo']) {		
                       $_SESSION['johnDoe'] = $this->johnDoe['id'];
                       
                       header("location: ../../../i/red_social/inicio.php");
                   }
                endforeach;
            } else {
                header("location: http://localhost/AllInOne/red_social.php");
            }
        }
    }
}
$iniciar    = new Iniciar();
$secion     = $iniciar->sesion(); 
?>
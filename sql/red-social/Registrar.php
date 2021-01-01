<?php
session_start();
require_once "../Conexion.php";
require_once '../Globales.php';

final class Registrar extends Globales {
    private $sql;
    private $resultado;
    private $johnDoe;
    
    final public function 
    usuario() {
        if(isset($_POST["registrar"])) {
            $correo = self::probarEntrada($_POST ["correo"]);
            $codigo = self::probarEntrada($_POST ["codigo"]);
            
            $this->sql = $GLOBALS["base"]->conexion->query("SELECT `correo` FROM `Usuarios` WHERE correo = '".$correo."'");
            $this->resultado = $this->sql->num_rows;

            if ($this->resultado === 1) {
                exit(json_encode("Este Correo ya esta registrado."));  
            } else {
                $this->sql = $GLOBALS["base"]->conexion->
                query("INSERT INTO `Usuarios`(`nombre`, `apellido`, `correo`, `codigo`, `numero`, `sexo`, `estado`, `pais`, `ciudad`, `fecha`, `foto`) "
                . "VALUES ('John', 'Doe', '".$correo."', '".$codigo."', '809 000 0000', 'Masculino', 'Soltero', 'RD', 'SD', NOW(), 'avatar.png')");

                $this->sql = $GLOBALS["base"]->conexion->query("SELECT id FROM `Usuarios` WHERE correo = '".$correo."'");
                $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

                if($this->resultado) {
                   foreach ($this->resultado as $this->johnDoe):
                       if($correo == $this->johnDoe['correo'] && $codigo == $this->johnDoe['codigo']) {
//                               $_SESSION['estoyDentro']             = $nCorreo;			
                           $_SESSION['johnDoe']           = $this->johnDoe['id'];			
//                               $_SESSION['estoyDentroPrivilegio']   = $this->johnDoe['nPrivilegio'];		                     
                       }
                   endforeach;        

                   $this->sql->close();
                   header("location:../../front/red_social/perfil.php");
                } 
            }
        }
    }
}
$registrar  = new Registrar();
$usuario    = $registrar->usuario();
?>                                                                                                                                                                                                                              
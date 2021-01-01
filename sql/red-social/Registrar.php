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
                query("INSERT INTO `Usuarios`(`nombre`, `apellido`, `nacimiento`, `correo`, `codigo`, `numero`, `sexo`, `estado`, `pais`, `ciudad`, `fecha`, `foto`) "
                . "VALUES ('John', 'Doe', '2020-00-00', '".$correo."', '".$codigo."', '809 000 0000', 'Femenina', 'Soltera', 'RD', 'SD', NOW(), 'avatar.png')");

                $this->sql = $GLOBALS["base"]->conexion->query("SELECT id, correo, codigo FROM `Usuarios` WHERE correo = '".$correo."'");
                $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

                if($this->resultado) {
                   foreach ($this->resultado as $this->johnDoe):
                       if($correo === $this->johnDoe['correo'] and $codigo === $this->johnDoe['codigo']) {			
                           $_SESSION['johnDoe'] = $this->johnDoe['id'];	
//                               $_SESSION['estoyDentro']             = $nCorreo;
//                               $_SESSION['estoyDentroPrivilegio']   = $this->johnDoe['nPrivilegio'];	
                           $this->sql->close();
                           header("location:../../front/red_social/perfil.php");
                       }
                   endforeach;        
                } else {
                    header("location: http://localhost/AllInOne/red_social.php");
                }
            }
        }
    }
}
$registrar  = new Registrar();
$usuario    = $registrar->usuario();
?>                                                                                                                                                                                                                              
<?php
class Conexion {
    public $conexion;
    private $host     = "localhost";
    private $usuario  = "root";
    private $codigo   = "";
    private $bd       = "all_in_one";
    private $charset  = "utf8";

    public function
    __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->codigo, $this->bd);
        
        if($this->conexion->connect_errno) { exit(); } 
        
        $this->conexion->set_charset($this->charset);
    }
}
$base = new Conexion();//$base->conexion-> "instancia la variable conexion"
//
    //conexion segundaria
//
//class ConexionDos extends Conexion {
//    public function 
//    __construct($host, $usuario, $codigo, $bd) {
//        parent::__construct($host, $usuario, $codigo, $bd);
//
//        if (mysqli_connect_error()) {
//            exit('Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
//        }
//        
//        parent::set_charset('utf-8');
//    }
//}
//$baseDos = new ConexionDos('localhost', 'root', '', 'crud');
//$baseTres = new ConexionDos('localhost', 'root', '', 'tienda');
//$baseCuatro = new ConexionDos('localhost', 'root', '', 'tienda');
?>


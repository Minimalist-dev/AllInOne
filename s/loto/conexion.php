<?php 
 class Conexion {
    public      $conexion;
    private     $host     = "localhost";
    private     $usuario  = "root";
    private     $codigo   = "";
    private     $DB       = "all_in_one";
    private     $charset  = "utf8";

    public function 
    __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->codigo, $this->DB);

        if($this->conexion->connect_errno) { exit(); } 

        $this->conexion->set_charset($this->charset);
    }
}
$conexionObject = new Conexion(); 
?>
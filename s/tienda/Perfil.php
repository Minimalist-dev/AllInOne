<?php
require_once '../Conexion.php';
class Perfil {
    private $sql;
    private $boletiner;
    private $suscriptor;
    private $buscar = null;
    
    public function 
    perfilado() {
        $this->buscar = htmlspecialchars($_REQUEST["correo"]);
        
        if(isset($_POST["suscriptor"]) and  $this->buscar === 'eleasar0991@gmail.com') {
            echo "<form action='../../s/tienda/Sesion.php' method='POST' class='n-perfilado'>
                    <input type='email' name='correo' value='".$this->buscar."'required hidden>
                    <input type='password' name='codigo' value='admin'>
                    <button type='submit' name='administrador'>&#10095;</button>
                </form>"
            . "";
        } elseif(isset($_POST["suscriptor"]) and $this->buscar !== 'eleasar0991@gmail.com') {
            $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT `suscriptor` FROM Boletines WHERE `suscriptor` LIKE '%$this->buscar%' LIMIT 1");
            $this->boletiner = $this->sql->fetch_all(MYSQLI_ASSOC);
            
            $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT `suscriptor` FROM Suscriptores WHERE `suscriptor` LIKE '%$this->buscar%' LIMIT 1");
            $this->suscriptor = $this->sql->fetch_all(MYSQLI_ASSOC);

            if(!empty($this->boletiner) and !empty($this->suscriptor)) {
                echo "<p>Estas <b>Suscripto</b> y unido al <b>Boletín</b>.</p>";
            } if(!empty($this->boletiner) and empty($this->suscriptor)) {
                echo "<p>Estas unido al <b>Boletín</b>, pero no <b style='color: #901E1D;'>Suscripto</b>.</p>";
            } elseif(empty($this->boletiner) and !empty($this->suscriptor)) {
                echo "<p>Estas <b>Suscripto</b>, pero no estas unido al <b style='color: #901E1D;'>Boletín</b>.</p>";  
            } elseif(empty($this->boletiner) and empty($this->suscriptor)) {
                echo "<p><b style='color: #901E1D;'>No estas perfilado en la Suscripción o el Boletín.</b></p>";
            } 
            return $this->suscriptor;
        } else {
            echo "Erro----------------------";
        }
    }
}
$perfil = new Perfil();
$perfilado = $perfil->perfilado();
?>

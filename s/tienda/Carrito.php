<?php

@session_start();

class Carrito {

    public $sesionArticulos;
    public $idArticulos;
    public $articulosContados;
    public $indiceDeSesion;

    public function
    compras() {
        if (isset($_POST["escoger"])) {
            switch ($_POST["escoger"]) {
                case "Escoger":
                    if (!isset($_SESSION["CARRITO"])) {
                        $this->sesionArticulos = array(
                            'ID' => $_POST["id"],
                            'MARCA' => $_POST["marca"],
                            'NOMBRE' => $_POST["nombre"],
                            'COLOR' => $_POST["color"],
                            'TALLA' => $_POST["talla"],
                            'DESCRIPCION' => $_POST["descripcion"],
                            'CANTIDAD' => $_POST["cantidad"] + $_POST["mas"] - 1,
                            'PRECIO' => $_POST["precio"]
                        );
                        is_array($_SESSION["CARRITO"][0] = $this->sesionArticulos);
//                        echo  "<script>alert('Lo elegido se agrego al carrito.');</script>";
                    } else {
                        $this->idArticulos = array_column($_SESSION["CARRITO"], "ID");
                        if (in_array($_POST["id"], $this->idArticulos, TRUE)) {
//                            echo "<script>alert('Ya lo tiene elegido en el carrito.');</script>";
                        } else {
                            $this->articulosContados = count($_SESSION["CARRITO"]);
                            $this->sesionArticulos = array(
                                'ID' => $_POST["id"],
                                'MARCA' => $_POST["marca"],
                                'NOMBRE' => $_POST["nombre"],
                                'COLOR' => $_POST["color"],
                                'TALLA' => $_POST["talla"],
                                'DESCRIPCION' => $_POST["descripcion"],
                                'CANTIDAD' => $_POST["cantidad"] + $_POST["mas"] - 1,
                                'PRECIO' => $_POST["precio"]
                            );
                            is_array($_SESSION["CARRITO"][$this->articulosContados] = $this->sesionArticulos);
//                            echo "<script>alert('Lo elegido se agrego al carrito.');</script>";
                        }
                    }
                    break;
                
                case "Cambiar":
                    foreach ($_SESSION["CARRITO"] as $this->indiceDeSesion => $this->sesionArticulos) {
                        if ($this->sesionArticulos["ID"] == $_POST["id"]) {
                            unset($_SESSION["CARRITO"][$this->indiceDeSesion]);
                        }
                    }
                    break;

                case "Devolver":
                    foreach ($_SESSION["CARRITO"] as $this->indiceDeSesion => $this->sesionArticulos) {
                        if ($this->sesionArticulos["ID"] == $_POST["id"]) {
                            unset($_SESSION["CARRITO"][$this->indiceDeSesion]);
//                                echo "<script>alert('Acaba de devolver uno escogido.');</script>";
                        }
                    }
                    break;

                case "Devolver todo":

                    foreach ($_SESSION["CARRITO"] as $this->sesionArticulos) {
                        if ($this->sesionArticulos["ID"] == $_POST["id"]) {
                            unset($_SESSION["CARRITO"]);
//                               echo "Acaba de devolver todo lo elegido.";
                        }
                    }
                    break;
            }
        }
    }

}

$nClassCarrito = new Carrito();
$nMethodCarrito = $nClassCarrito->compras();
?>

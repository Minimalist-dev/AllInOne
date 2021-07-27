<?php

@session_start();

class IntercambioFront {
    public $sesionArticulos;
    public $idArticulos;
    public $articulosContados;
    public $indiceDeSesion;

    public function
    deDatos() {
        if (isset($_POST["crud"])) {
            switch ($_POST["crud"]) {
                case "Crear":
                    if (!isset($_SESSION["JSONenPHP"])) {
                        $this->sesionArticulos = array(
                            'ID' => $_POST["id"],
                            'FECHA' => $_POST["fecha"],
                            'MARCA' => $_POST["marca"],
                            'NOMBRE' => $_POST["nombre"],
                            'PRECIO' => $_POST["precio"]
                        );
                        
                        is_array($_SESSION["JSONenPHP"][0] = $this->sesionArticulos);
                    } else {
                        $this->idArticulos = array_column($_SESSION["JSONenPHP"], "ID");
                        
                        if (in_array($_POST["id"], $this->idArticulos, TRUE)) {
//                            echo "<script>alert('Ya lo tiene elegido en el carrito.');</script>";
                        } else {
                            $this->articulosContados = count($_SESSION["JSONenPHP"]);
                            
                            $this->sesionArticulos = array(
                                'ID' => $_POST["id"],
                                'FECHA' => $_POST["fecha"],
                                'MARCA' => $_POST["marca"],
                                'NOMBRE' => $_POST["nombre"],
                                'PRECIO' => $_POST["precio"]
                            );
                            
                            is_array($_SESSION["JSONenPHP"][$this->articulosContados] = $this->sesionArticulos);
                        }
                    }
                break;

                case "Editar":
                    foreach ($_SESSION["JSONenPHP"] as $this->indiceDeSesion => $this->sesionArticulos) {
                        if ($this->sesionArticulos["ID"] == $_POST["id"]) {
                            exit(json_encode($_SESSION["JSONenPHP"][$this->indiceDeSesion]));  
                        }
                    }
                break;
                    
                case "Actualizar":
                    foreach ($_SESSION["JSONenPHP"] as $this->indiceDeSesion => $this->sesionArticulos) {
                        if ($this->sesionArticulos["ID"] == $_POST["id"]) {
                            $_SESSION["JSONenPHP"][$this->indiceDeSesion] = array_replace($_SESSION["JSONenPHP"], array(
                                'ID' => $_POST["id"],
                                'FECHA' => $_POST["fecha"],
                                'MARCA' => $_POST["marca"],
                                'NOMBRE' => $_POST["nombre"],
                                'PRECIO' => $_POST["precio"]
                            ));

                            is_array($_SESSION["JSONenPHP"]);
                        }
                    }
                break;
                    
                case "Borrar":
                    foreach ($_SESSION["JSONenPHP"] as $this->indiceDeSesion => $this->sesionArticulos) {
                        if ($this->sesionArticulos["ID"] == $_POST["id"]) {
                            unset($_SESSION["JSONenPHP"][$this->indiceDeSesion]);
                        }
                    }
                break;
            }
        }
        
        exit(json_encode($_SESSION["JSONenPHP"]));
    }
}

$ejecutarIntercambioFront = new IntercambioFront();
$intercambioFront = $ejecutarIntercambioFront->deDatos();
?>
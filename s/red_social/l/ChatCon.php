<?php
session_start();
require_once '../../Conexion.php';

class ChatCon {
    private $sql;
    private $de;
    private $para;
    private $resultado;
    private $obtenidos;
    private $ok;

    public function 
    reMensaje() {
        $this->obtenidos = array();
        
        if (isset($_POST["chat-con"]) and !empty($_POST["re-mensaje"])) {
            $this->de   = $_SESSION['johnDoe'];
            $this->para = $_POST["chat-con"]; 
            $mensaje    = $_POST["re-mensaje"];
            
            $this->sql = $GLOBALS["base"]->conexion->
            query("SELECT * FROM `Chats` "
                . "WHERE mensaje = '".$mensaje."' AND `fecha` = NOW() OR `de` = '".$this->de."' AND `fecha` = NOW()");
            $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);
                
            if(empty($this->resultado)) {
                $sqlChat = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO `Chats`(`de`, `para`, `mensaje`, `fecha`) "
                    . "VALUES ('".$this->de."', '".$this->para."', '".$mensaje."', NOW())");
                
                $this->sql = $GLOBALS["base"]->conexion->query("UPDATE `ChatDePara` SET `fechaFinalizada`= NOW() "
                    . "WHERE `de` = '".$this->de."' AND `para` = '".$this->para."' "
                    . "OR `de` = '".$this->para."' AND `para` = '".$this->de."' LIMIT 1 ");
            }
            
            if($sqlChat) {
                $this->ok = $this->para;

                $this->sql = $GLOBALS["base"]->conexion->
                query("SELECT * FROM `Chats` WHERE `de` = '".$_SESSION['johnDoe']."' AND `para` = '".$this->ok."' "
                    . "OR `de` = '".$this->ok."' AND `para` = '".$_SESSION['johnDoe']."' ");
                $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

                foreach ($this->resultado as $valor) {
                    if ($valor["de"] === $_SESSION['johnDoe'] and $valor["para"] !== $_SESSION['johnDoe']) {
                        $this->ok = $valor["de"];
                    } else if ($valor["de"] !== $_SESSION['johnDoe'] and $valor["para"] === $_SESSION['johnDoe']) {
                        $this->ok = $valor["de"];
                    }

                    $this->sql = $GLOBALS["base"]->conexion->
                    query("SELECT * FROM `Usuarios` WHERE id = '" . $this->ok . "' ");
                    $this->resultado = $this->sql->fetch_all(MYSQLI_ASSOC);

                foreach ($this->resultado as $usuario) {
                    $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $valor['fecha']);

                    array_push($this->obtenidos, array(
                        "id"        => $valor["id"],
                        "de"        => $valor["de"],
                        "para"      => $valor["para"],
                        "mensaje"   => $valor["mensaje"],
                        "nombre"    => $usuario["nombre"],
                        "foto"      => $usuario["foto"],
                        "fecha"     => $fecha->format('d M Y')
                    ));
                }
                }
            }
            exit(json_encode($this->obtenidos));
        }    
    }
}
$ejecutarChatCon = new ChatCon();
$chatCon = $ejecutarChatCon->reMensaje();
?>
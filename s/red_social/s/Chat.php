<?php
session_start();
require_once '../Conexion.php';

class Chat {
    private $sql;
    private $de;
    private $para;
    
    public function 
    mensaje() {
        if (isset($_POST["mensaje"])) {
            $this->de   = $_SESSION['johnDoe'];
            $this->para = $_SESSION["usuario"]; 
            $mensaje    = $_POST["mensaje"];
            
            $sqlChatDePara = $GLOBALS["base"]->conexion-> 
            query("SELECT `de`, `para` FROM `ChatDePara` "
                . "WHERE `de` = '".$this->de."' AND `para` = '".$this->para."' "
                . "OR `de` = '".$_SESSION['usuario']."' AND `para` = '".$this->de."'");
            $chatDePara  = $sqlChatDePara->fetch_all(MYSQLI_ASSOC);
            
            if (empty($chatDePara)) {
                $sqlChat = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO `ChatDePara`(`de`, `para`, `fecha`) "
                    . "VALUES ('".$this->de."', '".$this->para."', NOW())");
                echo !empty($sqlChat) ? "Ha sido el primer Chat." : "No.. ha sido el primer Chat.";
                
                if ($sqlChat) {
                    $this->sql = $GLOBALS["base"]->conexion-> 
                    query("INSERT INTO `Chats`(`de`, `para`, `mensaje`, `fecha`) "
                        . "VALUES ('".$this->de."', '".$this->para."', '".$mensaje."', NOW())");
                    echo !empty($this->sql) ? "Ha sido enviado." : "No.. ha sido enviado.";
                }
            } else {
                $this->sql = $GLOBALS["base"]->conexion-> 
                query("INSERT INTO `Chats`(`de`, `para`, `mensaje`, `fecha`) "
                    . "VALUES ('".$this->de."', '".$this->para."', '".$mensaje."', NOW())");
                echo !empty($this->sql) ? "Ha sido enviado." : "No.. ha sido enviado.";
            }   
        }    
    }
}
$ejecutarChat = new Chat();
$chat = $ejecutarChat->mensaje();
?>
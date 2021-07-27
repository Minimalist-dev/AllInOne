<?php
    require_once '../../sql/tienda/define.php';
    require_once "../../sql/Conexion.php";
    require_once '../../sql/tienda/Carrito.php';
    
    class Transaccion extends Conexion {
        private $nVMySQLi;
        private $nVMySQLiUpdate;
        private $nVMySQLiInsert;
        
        public function obtener() {
            //print_r($_GET); //echo "<b></b> ".."<br>";
            echo "<h1><b>Acceso a PayPal:</b></h1>";
            echo "<b>Payment Token:</b> ".$_GET["paymentToken"]."<br>";
            echo "<b>Payment ID:</b> ".$_GET["paymentID"]."<br>";
            $Login = curl_init(LINKAPI."/v1/oauth2/token");
            curl_setopt($Login, CURLOPT_RETURNTRANSFER,  TRUE);
            curl_setopt($Login, CURLOPT_USERPWD, CLIENTID.":".SECRET);
            curl_setopt($Login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

            $Respuesta = curl_exec($Login);
            //print_r($Respuesta);
            $objRespuesta = json_decode($Respuesta);
            $AccessToken = $objRespuesta -> access_token;
            //print_r($AccessToken."<br>");
            echo "<b>Access Token:</b> ".$AccessToken."<br><hr>";
            /*echo "<b></b> ".$TokenType = $objRespuesta -> token_type."<br>";*/
            $venta = curl_init(LINKAPI."/v1/payments/payment/".$_GET['paymentID']);

            curl_setopt($venta,CURLOPT_HTTPHEADER,array("Content-Type: application/json","Authorization: Bearer ".$AccessToken));

            curl_setopt($venta, CURLOPT_RETURNTRANSFER, TRUE);

            $RespuestaVenta = curl_exec($venta);
            print_r($RespuestaVenta);
            $objDatosTransaccion = json_decode($RespuestaVenta);
            //print_r($objDatosTransaccion->payer->payer_info->email);
            $nIDDeTransaccion       = $objDatosTransaccion->transactions[0]->related_resources[0]->sale->id;
            $nIDDelPagador          = $objDatosTransaccion->payer->payer_info->payer_id;
            $nNombreCompleto        = $objDatosTransaccion->payer->payer_info->first_name." ".$objDatosTransaccion->payer->payer_info->last_name;
            $nCorreo                = $objDatosTransaccion->payer->payer_info->email;
            $nTelefono              = $objDatosTransaccion->payer->payer_info->phone;
            $nPaymentToken          = $_GET["paymentToken"];
            $nPaymentID             = $_GET["paymentID"];
            $nAccessToken           = $objRespuesta -> access_token;
            $nDescripcion           = $objDatosTransaccion->transactions[0]->description;
            $nEstadoDeTransaccion   = $objDatosTransaccion->transactions[0]->related_resources[0]->sale->state;
            $nFecha                 = $objDatosTransaccion->transactions[0]->related_resources[0]->sale->update_time; //$objDatosTransaccion->transactions[0]->related_resources[0]->sale->create_time
            $nSubTotal              = $objDatosTransaccion->transactions[0]->amount->details->subtotal;
            $nImpuesto              = $objDatosTransaccion->transactions[0]->amount->details->tax;
            $nEnvio                 = $objDatosTransaccion->transactions[0]->amount->details->shipping;
            $nDescuento             = $objDatosTransaccion->transactions[0]->amount->details->shipping_discount;;
            $nTotal                 = $objDatosTransaccion->transactions[0]->amount->total;
            $nLinea                 = $objDatosTransaccion->payer->payer_info->shipping_address->line1;
            $nCiudad                = $objDatosTransaccion->payer->payer_info->shipping_address->city;
            $nEstado                = $objDatosTransaccion->payer->payer_info->shipping_address->state;
            $nCodigoPostal          = $objDatosTransaccion->payer->payer_info->shipping_address->postal_code;
            $nCodigoDePais          = $objDatosTransaccion->payer->payer_info->shipping_address->country_code;
            //echo "<b></b> ".."<br>";
            $this->nVMySQLi = $GLOBALS['base']->conexion-> 
                query("INSERT INTO `Transaccion` (`id`, `idDeCliente`, `idDeTransaccion`, `idDelPagador`, `nombreCompleto`, `correo`, `celular`, `paymentToken`, `paymentID`, `accessToken`, `descripcion`, `estadoDeTransaccion`, `fecha`, `subTotal`, `impuesto`, `envio`, `descuento`, `total`, `linea`, `ciudad`, `estado`, `codigoPostal`, `codigoDePais`) VALUES (NULL, '', '$nIDDeTransaccion', '$nIDDelPagador', '$nNombreCompleto',"
                    . " '$nCorreo', '$nTelefono', '$nPaymentToken', '$nPaymentID', '$nAccessToken', '$nDescripcion',"
                    . " '$nEstadoDeTransaccion', '$nFecha', '$nSubTotal', '$nImpuesto', '$nEnvio', '$nDescuento', "
                    . "'$nTotal', '$nLinea', '$nCiudad', '$nEstado', '$nCodigoPostal', '$nCodigoDePais')");

            $nID = $GLOBALS['base']->conexion->insert_id;
            //`nIDDeTransaccion`, `nPayPalDatos` = $RespuestaVenta, `nEstado`, -> modificar
            $this->nVMySQLiUpdate = $GLOBALS['base']->conexion-> 
                query("UPDATE ntablaventas SET idDelCliente='', idDeTransaccion='$nIDDeTransaccion', "
                    . "payPalDatos='$RespuestaVenta', total='$nTotal', correo='$nCorreo', "
                    . "estado='$nEstadoDeTransaccion', fecha='$nFecha' WHERE id='$nID' ");

            foreach ($_SESSION["CARRITO"] as $nIndiceArray => $nArticulosArrays) {
                $this->nVMySQLiInsert = $GLOBALS['base']->conexion-> 
                query("INSERT INTO `VentasInformacion` (`id`, `idVenta`, `idArticulo`, `cantidad`, `precioUnitario`) VALUES (NULL, '$nID', '".$nArticulosArrays["ID"]."', "
                    . "'".$nArticulosArrays["CANTIDAD"]."', '".$nArticulosArrays["PRECIO"]."')");
            }

            curl_close($venta);
            curl_close($Login);

//            unset($_SESSION['CARRITO']);

//            echo "<script>alert('Esperamos volver a verlo prondo, (xxxxxxxxxxxxxxxxxxxxxxxxxxxx).')</script>";
//            echo '<meta http-equiv="refresh" content="1; url=index.php" />'; 
        }
    }
    $nClassTransaccion = new Transaccion();
    $nMethodTransaccion = $nClassTransaccion->obtener();
?>
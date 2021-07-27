<?php

$impuesto = $subtotal * 0.18;
$envio = 1.98;
is_numeric($descuento = NULL);

if ($subtotal >= 0 && $subtotal <= 12.50) {
    $descuento = 0.00;
    $alertaDeDescuento = "<b>No</b> has obtenido el descuento, por superar la suma de <b>12,50</b>.";
} elseif ($subtotal >= 12.51 && $subtotal <= 25.00) {
    $descuento = $subtotal * 0.05;
    $alertaDeDescuento = "Has obtenido un descuento del <b>5%</b>, por superar la suma de <b>12,50</b>.";
} elseif ($subtotal >= 25.01) {
    $descuento = $subtotal * 0.10;
    $alertaDeDescuento = "Has obtenido un descuento del <b>10%</b>, por superar la suma de <b>25,00</b>.";
}

$total = $subtotal + $impuesto + $envio - $descuento;
?>
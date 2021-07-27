<?php

class Descuento {
    public $nImpuesto;
            
    public function
    porciento() {
        $this->nImpuesto = $nSubTotal * 0.18;
        $nEnvio = 1.98;
        is_numeric($nDescuento = NULL);

        if ($nSubTotal >= 0 && $nSubTotal <= 12.50) {
            $nDescuento = 0.00;
            $nAlertaDeDescuento = "<b>No</b> has obtenido el descuento, por superar la suma de <b>12,50</b>.";
        } elseif ($nSubTotal >= 12.51 && $nSubTotal <= 25.00) {
            $nDescuento = $nSubTotal * 0.05;
            $nAlertaDeDescuento = "Has obtenido un descuento del <b>5%</b>, por superar la suma de <b>12,50</b>.";
        } elseif ($nSubTotal >= 25.01) {
            $nDescuento = $nSubTotal * 0.10;
            $nAlertaDeDescuento = "Has obtenido un descuento del <b>10%</b>, por superar la suma de <b>25,00</b>.";
        }


        $nTotal = $nSubTotal + $this->nImpuesto + $nEnvio - $nDescuento;
    }

}
$descuento = new Descuento();
$porciento = $descuento->porciento();
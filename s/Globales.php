<?php

class Globales {

    public static function
    probarEntrada($datos) {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }
    public static function 
    tiempoTranscurrido($fecha) {
        $transcurrido = time() - $fecha;

        if ($transcurrido < 1) {
            return 'Justo ahora';
        }

        $periodo = array(
            12 * 30 * 24 * 60 * 60  => 'año',
            30 * 24 * 60 * 60       => 'me',
            24 * 60 * 60            => 'dia',
            60 * 60                 => 'hora',
            60                      => 'minuto',
            1                       => 'segundo',
        );
        
        foreach ($periodo as $pasado => $indice) {
            $redondear = $transcurrido / $pasado;

            if ($redondear >= 1) {
                $tiempo = round($redondear);
                return 'Hace ' . $tiempo . ' ' . $indice . ($tiempo > 1 ? 's' : '');
            }
        }
    }
}

//Globales::probarEntrada($datos);
?>
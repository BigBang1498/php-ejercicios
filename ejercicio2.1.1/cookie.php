<?php
    function cookie() { 

        if(isset($_COOKIE['TiempoSesion'])) {
            $tiempoTranscurrido = time() - $_COOKIE['TiempoSesion'];
            $minutos = floor($tiempoTranscurrido / 60);
            $segundos = floor($tiempoTranscurrido % 60);   
            return [$minutos, $segundos];    
        } else {
            return "No hay cookies";
        }
    }
?>
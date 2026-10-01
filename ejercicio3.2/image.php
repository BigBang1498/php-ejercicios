<?php

    if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
         
        $name = $_POST['name'] ?? '';
    
        if(!empty($name)) {
            $imagen = imagecreatetruecolor(400,300);
            $colortexto = imagecolorallocate( $imagen, 143, 224, 60 );
            imagestring($imagen, 1, 160, 135, 'Hola: ' . $name, $colortexto );
            header('Content-Type: image/jpeg');
            imagejpeg($imagen);
            imagedestroy($imagen);
        } else {
            echo "No se envio información";
        }
    }
?>
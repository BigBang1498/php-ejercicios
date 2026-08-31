<?php

    //Nota: agregar en la terminal los permisos de la carpeta destino
    // Se realiza con este comando: chmod 777 uploads o el nombre de la carpeta
    // O docker exec -it proyecto2 chmod -R 777 /var/www/html/uploads
    $error = '';
    $message = '';
    //Ruta absoluta
    $carpetaDestino = __DIR__ . '/uploads/';

    if ( $_SERVER['REQUEST_METHOD'] === "POST" ) {
        //Se guarda el error
        $error = $_FILES['file']['error'];
        //Se verifica que no haya errores
        if ( $error == UPLOAD_ERR_OK ) {
            //nombre temporal
            $tmp_name = $_FILES['file']['tmp_name'];
            //La función basename regresa el nombre del archivo sin la ruta
            $name = basename( $_FILES['file']['name'] );
            //Se sube el archivo a la carpeta $carpetaDestino
            if ( move_uploaded_file( $tmp_name, $carpetaDestino . $name ) ) {
                $message = basename( $_FILES['file']['name'] . "cargado correctamente" );
                echo $message;
            } else {
                echo "Ocurrió un error al subir el archivo";
            }
        } else {
            echo "Error: Verifica tu código.";
        }
    }
?>
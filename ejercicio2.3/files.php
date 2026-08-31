<?php
    $error = '';
    $message = '';
    //ruta absoluta del proyecto
    $carpetaDestino = __DIR__ . '/uploads/';
    //Para asegurar que los datos sean enviado por POST
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        //Variable para guardar la existencia de un error
        $error = $_FILES['file']['error'];
        //Se verifica que no haya errores
        if( $error == UPLOAD_ERR_OK ) {
            //Se obtiene el nombre temporal del archivo y se guarda en una Variable
            $tmp_name = $_FILES['file']['tmp_name'];
            //La función basename regresa el nombre del archivo sin la ruta
            $name = basename( $_FILES['file']['name'] );
            //Se mueve el archivo subido a la carpeta de nuestra elección
            if( move_uploaded_file( $tmp_name, "$carpetaDestino . $name" ) ) {
                $message = basename( $_FILES['file']['name'] . "cargado correctamente" );
                echo $message;
            } else {
                $error = "Ocurrió un error al subir el archivo";
            }
        } else {
            $error = "Ocurrió un error al subir el archivo";
        }
    }
?>
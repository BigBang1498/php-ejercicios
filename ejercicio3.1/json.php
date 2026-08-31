<?php
    //Estructura de datos
    $usuarios = array(
        "user"      => $_POST['user'] ?? '',
        "email"     => $_POST['email'] ?? '',
        'hash'      => password_hash( $_POST['psw'] ?? '', PASSWORD_DEFAULT) 
    );
    $bandera = true;
    
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        foreach ( $usuarios as $usuario ) {
            if ( empty ( $usuario ) ) {
             $bandera = false;
            }
        }
        if ( $bandera === true ) {
            // Guardado estético (con saltos de línea e indentación(JSON_PRETTY_PRINT))
            $json = json_encode( $usuarios, JSON_PRETTY_PRINT );
            $registros = "registros.js";
            // Crea el archivo si no existe, o añade al final si ya existe
            file_put_contents( $registros, $json, FILE_APPEND );
            header("Location: validation.php?datos=true");
            exit;
        } else {
            header( "Location: register.php?datos=false" );
            exit;
        }
    }
    
?>
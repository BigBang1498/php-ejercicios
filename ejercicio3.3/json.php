<?php
    
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
        //Estructura de datos
        $usuarios = array(
            "user"      => $_POST['user'] ?? '',
            "email"     => $_POST['email'] ?? '',
            'hash'      => password_hash( $_POST['psw'] ?? '', PASSWORD_DEFAULT) 
        );
        $bandera = true;

        foreach ( $usuarios as $usuario ) {
            if ( empty ( $usuario ) ) {
             $bandera = false;
            }
        }
        if ( $bandera === true ) {
            // Guardado estético (con saltos de línea e indentación(JSON_PRETTY_PRINT))
            $json = json_encode( $usuarios, JSON_PRETTY_PRINT );
            $registros = "registros.js";
            //Trae los datos del json para convertirlo a un array y poder actualizar su información
            if (file_exists($registros)) {
                $datos = json_decode(file_get_contents($registros), true);
            } else {
                $datos = [];
            }

            //Se agrega un nuevo registro al array
            $datos[] = [
                "user"      => $_POST['user'] ?? '',
                "email"     => $_POST['email'] ?? '',
                'hash'      => password_hash( $_POST['psw'] ?? '', PASSWORD_DEFAULT) 
            ];
            
            $newUser = json_encode( $datos, JSON_PRETTY_PRINT );
            // Crea el archivo si no existe, o añade al final si ya existe
            file_put_contents( $registros, $newUser );
            header("Location: login.php?datos=true");
            exit;
        } else {
            header( "Location: register.php?datos=false" );
            exit;
        }
    }
    
?>
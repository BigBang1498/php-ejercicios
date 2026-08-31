<?php
    session_start();

    function register() {
        // Se valida con $_SESSION y no con $_GET porque el GET solo existe
        // justo después del registro (cuando config.php redirige con ?datos=true).
        // El login llega a esta página en otro momento, sin ese parámetro,
        // así que la única forma confiable de saber si hay un usuario
        // registrado es revisando si sigue guardado en la sesión.
        if( isset( $_SESSION['usuario'] ) && !empty( $_SESSION['usuario'] ) ) {
            $usuario_valido = array( 
                'correo_valido' => $_SESSION[ 'usuario' ]['email'],
                'hash' => password_hash( $_SESSION['usuario']['password'], PASSWORD_DEFAULT)
            );
           
            return $usuario_valido;
        } else {
            return "Usuario no valido";
        }
    }

    function login() {
        if ( $_SERVER['REQUEST_METHOD'] === 'POST') { 
            $datosIntroducidos = array(
                'email' => $_POST['email_login'] ?? '',
                'password' => $_POST['psw_login'] ?? ''
            );
            
            return $datosIntroducidos;
        } else {
            return "datos no enviados";
        }
    }

    function validation() {
        $login = login();
        $register = register();
        if( is_array( $login ) && is_array( $register ) ) {
            $bandera = true;
            if ( !empty( $login['email'] ) && !empty( $login['password'] ) ) {
                if( $login['email'] !== $register['correo_valido']) {
                    $bandera = false;
                } 
                if( !password_verify( $login['password'], $register['hash'] ) ) {
                    $bandera = false;
                }
            } else {
                echo "datos vacios";
            }
    
            if( $bandera === true ) {
                header( "Location: dashboard.php?validation=true" );
                exit;
            } else {
                echo false;
            }
    
        } else {
            echo "La información proporcionada no es un array";
        }
    }

    validation();
?>
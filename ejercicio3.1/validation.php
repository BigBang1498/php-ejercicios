<?php

    function login() {
        if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $user_login = array (
                "email"     => $_POST['email_login'] ?? '',
                "password" => $_POST['psw_login'] ?? ''
            );
            return $user_login ?? [];
        } 
        return[];
    }

    function register() {
        $archivo = 'registro.js';
        if ( file_exists ( $archivo ) ) {
            $json = file_get_contents($archivo);
            $array = json_decode($json, true);
            return $array ?? [];
        }
        return[];
    }
    
    function validation() {
        $register = register();
        $login = login();
        if ( is_array( $register ) && is_array( $login ) ) {
            if ( !empty( $login['email'] ) && !empty( $login['password'] ) ) {
                $bandera = true;
                foreach ($register as $user_valido) {
                    if ( $user_valido['email'] !== $login['email'] ) {
                        $bandera = false;
                    } 
                    if( ! password_verify( $login['password'], $user_valido['hash'] ) ) {
                        $bandera = false;
                    }
                }
                if ( $bandera === true ) {
                    header( "Location: dashboard.php    ?validation=true" );
                    exit;
                } else {
                    echo "Usuario no valido";
                }
            } else {
                echo "Datos vacíos";
            }
        } else {
            echo "La información proporcionada no es un array";
        }

    }
    validation();
?>
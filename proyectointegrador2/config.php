<?php
    session_start();
    
    $datosGuardados = array(
        "nombre" => htmlspecialchars( $_POST['user'] ?? ''), //Prevenir ataques xss
        "email" => filter_var( $_POST['email'] ?? '', FILTER_VALIDATE_EMAIL), //SEGURIDAD DE DATOS: SANITIZACIÓN Y VALIDACIÓN (filter_var)
        "password" => $_POST['psw'] ?? ''
    );

    $bandera = true;

    foreach($datosGuardados as $datoGuardado) {
        if( empty( $datoGuardado ) ) {
            $bandera = false;
        }
    }

    if($bandera === true) {
        $_SESSION['usuario'] = $datosGuardados;
        header( "Location: validation.php?datos=true");
        exit;
    } else {
       header( "Location: validation.php?datos=false" );
        exit;
    }
?>
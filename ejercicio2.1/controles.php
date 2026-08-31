<?php
    /*
 * -----------------------------------------------------------------------------
 * SEGURIDAD DE DATOS: SANITIZACIÓN Y VALIDACIÓN (filter_var)
 * -----------------------------------------------------------------------------
 * 1. SANITIZACIÓN (Limpieza):
 *    - Función: filter_var($dato, FILTER_SANITIZE_*).
 *    - Objetivo: Eliminar o codificar caracteres ilegales o peligrosos (ej. tags HTML, espacios extra).
 *    - Orden: Siempre se aplica PRIMERO para "limpiar" la entrada bruta.
 *
 * 2. VALIDACIÓN (Verificación):
 *    - Función: filter_var($dato_limpio, FILTER_VALIDATE_*).
 *    - Objetivo: Comprobar si el dato cumple estrictamente con el formato esperado (ej. email, URL, int).
 *    - Retorno: Devuelve el dato filtrado si es válido, o FALSE si no lo es.
 *    - Orden: Se aplica SEGUNDO, sobre el dato ya sanitizado.
 *
 * REGLA DE ORO: Primero sanitizar (limpiar), luego validar (comprobar).
 * Nunca confiar en los datos de $_POST sin este proceso doble.
 * -----------------------------------------------------------------------------
 */   
    session_start(); //Para hacer uso de las sesiones y de $_SESSION

    if($_SERVER['REQUEST_METHOD']  === 'POST') {
       
        $datosFormulario = array(
            "nombre" => htmlspecialchars( $_POST['name'] ?? ''), //Prevenir ataques XSS (Cross-Site Scripting)
            "correo" => filter_var( $_POST['email'] ?? '', FILTER_VALIDATE_EMAIL),
            "password" => $_POST['psw'] ?? '',
            "nacimiento" => $_POST['birth'] ?? ''
        );

        $bandera = true;

        foreach($datosFormulario as $campo) {
            if(empty($campo)) {
               $bandera = false; 
            }
        }
        if($bandera === true) {
            $_SESSION['usuario'] = $datosFormulario;
            header("Location: dashboard.php?valores=true");
            exit;
        }else{
            header("Location: index.php?valores=false");
            exit;
        }
    }
?>
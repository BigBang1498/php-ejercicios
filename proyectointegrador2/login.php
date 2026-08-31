<?php
    //session_start();
    if ( isset( $_GET['logout'] ) && $_GET['logout'] === "true" ) {
        session_start();
        session_unset();
        session_destroy();
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
   <h1>Iniciar Sesión</h1>
    <form action="validation.php" method="post">
        <label for="email_login">Correo: </label><br>
        <input type="email" name="email_login" id="email_login"><br>
        <label for="psw_login">Contraseña: </label><br>
        <input type="password" name="psw_login" id="psw_login">
        <button type="submit">Iniciar Sesión</button>
    </form>
    
</body>
</html>
<?php
    session_start();
    setcookie("TiempoSesion", 'El tiempo transcurrido desde el inicio de sesión es: "', time() + 86400, "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Datos del usuario</h1><br>      
    <a href="index.php?logout=true">Cerrar Sesión</a><br>
    <?php
        if(isset($_GET['valores']) && $_GET['valores'] === "true") {
            $password_hash = password_hash( $_SESSION['usuario']['password'],  PASSWORD_DEFAULT); //Encriptar contraseña 
            //imprimir el tiempo de sesión
            $_SESSION['sesion'] = time();
           ?>
           <ul>
                <?php echo "<li>" . $_SESSION['usuario']['nombre'] . "</li>";?>
                <?php echo "<li>" . $_SESSION['usuario']['correo'] . "</li>";?>
                <?php echo "<li>" . $password_hash . "</li>";?>
                <?php echo "<li>" . $_SESSION['usuario']['nacimiento'] . "</li>";?>
                <?php echo "<li>" . $_COOKIE['TiempoSesion'] . $_SESSION['sesion'];?>
           </ul>
           <?php
        }
    ?>
</body>
</html>
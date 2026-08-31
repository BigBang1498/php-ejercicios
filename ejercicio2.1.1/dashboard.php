<?php
    session_start();
    require 'cookie.php';
    $tiempo = cookie();
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
           ?>
           <ul>
                <?php echo "<li>" . $_SESSION['usuario']['nombre'] . "</li>";?>
                <?php echo "<li>" . $_SESSION['usuario']['correo'] . "</li>";?>
                <?php echo "<li>" . $password_hash . "</li>";?>
                <?php echo "<li>" . $_SESSION['usuario']['nacimiento'] . "</li>";?>
                <?php
                    if ( is_array($tiempo) ) {
                        echo "Llevas " . $tiempo[0] . " minutos y " . $tiempo[1] . " segundos de haber iniciado sesión ";
                    } else {
                        echo $tiempo;
                    }
                ?>
           </ul>
           <?php
        }
    ?>
</body>
</html>
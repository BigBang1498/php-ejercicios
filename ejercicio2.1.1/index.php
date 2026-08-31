<?php
    if(isset($_GET['logout']) && $_GET['logout'] === "true") {
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
    <title>Sesiones</title>
</head>
<body>
    <h1>2.1 Sesiones y cockies</h1>
    <form action="controles.php" method="post">
        <label for="name">Name: </label><br>
        <input type="text" name="name" id="name"><br>
        <label for="email">Email: </label><br>
        <input type="email" name="email" id="email"><br>
        <label for="psw">Password: </label><br>
        <input type="password" name="psw" id="psw"><br>
        <label for="birth">Birth: </label><br>
        <input type="date" name="birth" id="birth"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        if(isset($_GET['valores']) && $_GET['valores'] === "false") {
            echo "<p>Todos los campos son obligatios. </p>";
        }
    ?>
</body>
</html>
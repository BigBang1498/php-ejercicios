<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
</head>
<body>
    <h1>Registro de Usuarios</h1>
    <form action="config.php" method="post">
        <label for="user">Usuario: </label><br>
        <input type="text" id="user" name="user"><br>
        <label for="email">Correo: </label><br>
        <input type="email" name="email" id="email"><br>
        <label for="psw">Contraseña: </label><br>
        <input type="password" name="psw" id="psw"><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
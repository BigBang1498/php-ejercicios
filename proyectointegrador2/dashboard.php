
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@!</title>
</head>
<body>
    <h1>Bienvenid@</h1>
    <a href="login.php?logout=true">Cerrar Sesión</a>
    <form action="file.php" method="post" enctype="multipart/form-data">
        <label for="file">Sube tu archivo aqui: </label><br>
        <input type="file" name="file" id="file"><br>
        <button type="submit">Subir</button><br>
    </form>
</body>
</html>
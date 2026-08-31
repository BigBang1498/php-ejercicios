<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos en PHP</title>
</head>
<body>
    <form action="files.php" method="post" enctype="multipart/form-data">
        <label for="label">Selecciona un archivo: </label><br>
        <input type="file" name="file" id="file"><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h1>Formulario para descargar</h1>
    <form action="controller.php" method="post">  
        <label for="">Ingresa el texto a descargar: </label><br>
        <input type="text" name="message">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
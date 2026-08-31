<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <form action="" method="get">
        <label for="nombre">Nombre: </label><br>
        <input type="text" name="nombre" id="nombre"><br>
        <label for="Edad">Edad:</label><br>
        <input type="number" name="Edad" id="Edad"><br>
        <button type="submit">Enviar</button>
    </form>

    <?php
        $nombre = $_GET['nombre'] ?? '';
        $edad = $_GET['Edad'] ?? '';

        if(!empty($nombre) && !empty($edad)){
            if($edad <= 18){
                echo  'Hola ' . $nombre . ' eres un joven'; 
            }
            if($edad > 18 && $edad <= 60){
                echo 'Hola ' . $nombre . ' eres un adulto';
            }
            if($edad > 60){
                echo 'Hola ' . $nombre . ' eres un adulto mayor';
            }
        }else{
            echo "Los campos son obligatorios";
        }
    ?>
</body>
</html>
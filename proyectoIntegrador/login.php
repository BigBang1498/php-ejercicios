<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="email">Email: </label><br>
        <input type="email" name="email" id="email"><br>
        <label for="psw">Password: </label><br>
        <input type="password" name="psw" id="psw"><br>
        <button type="submit">Enviar</button><br>
    </form>

    <?php
        if(isset($_GET['status'])){
            if($_GET['status'] === "empty"){
                echo "Campos vacíos, por favor verificalos.";
            }
            elseif($_GET['status'] === "success"){
                echo "Datos verificaos correctamente.";
            }
            elseif($_GET['status'] === "fail"){
                echo "Datos incorrectos, por favor verificalos";
            }else{
                echo "Condición desconocida, por favor verifica los datos ingresados.";
            }
        } 
    ?>
</body>
</html>
<?php
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$modalidad = $_POST['modalidad'] ?? '';
$cursos = $_POST['curso'];
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
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
    ?>
    <h1>Bienvenido <?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?></h1>
    <main>
        <ul>
            <li>
                <?php
                    if(!empty(htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'))){
                        echo "Nombre: " . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
                    }else{
                        echo "No se ha proporcionado un nombre.";
                    }
                ?>
            </li>
            <li>
                <?php
                    if(!empty($correo)){
                        echo "Correo: " . htmlspecialchars($correo, ENT_QUOTES, 'UTF-8');
                    }else{
                        echo "No se ha proporcionado un correo.";
                    }
                ?>
            </li>
            <li>
                <?php
                    if(!empty($telefono)){
                        echo "Telefono: " . htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8');
                    }else{
                        echo "No se ha proporcionado un telefono.";
                    }
                ?>
            </li>
            <li>
                <?php
                    if(!empty($modalidad)){
                        echo "Modalidad " . htmlspecialchars($modalidad, ENT_QUOTES, 'UTF-8');
                    }else{
                        echo "No se ha proporcionado un modalidad";
                    }
                ?>
            </li>
            <li>
                <?php
                //implode une el contenido de un array con una coma
                    if(!empty($cursos)){
                        echo "Cursos seleccionados: " . htmlspecialchars(implode(", ", $cursos), ENT_QUOTES, 'UTF-8');
                    }else{
                        echo "No se selecciono ninguna opción";
                    }
                ?>
            </li>
        </ul>
    </main>
    <?php
        }
    ?>
</body>
</html>
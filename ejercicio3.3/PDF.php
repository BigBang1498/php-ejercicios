<?php
    //Ejecutar estos comandos en la terminal
   //composer require tecnickcom/tcpdf
   //composer require "tecnickcom/tcpdf:^6.6"
   //composer require phpoffice/phpspreadsheet 
   //composer require phpoffice/phpword
    ini_set('display_errors', 1);

    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);

    require 'vendor/autoload.php';

    function pdf() {
        $file = 'registros.js';
        if( file_exists( $file ) ) {
            $pdf = new TCPDF();
            $pdf->AddPage();
            $pdf->Write(1, 'Usuarios Registrados', '', false, 'C');
            $pdf->Ln();
            $json = file_get_contents($file);
            $usuarios = json_decode($json, true);
            ob_start();
            ?>
            <h1>Registros de usuarios</h1>
            <table border="1px" >
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                </tr>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                   <td> <?php echo htmlspecialchars($usuario['user']); ?> </td>
                   <td> <?php echo htmlspecialchars($usuario['email']); ?> </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php 
            $html = ob_get_clean(); 
            $pdf->WriteHTML($html);
            $pdf->Output('Registros.pdf');
        } else {
            echo "Error: El archivo no existe, por favor verificalo.";
        }
    }
    pdf();
?>

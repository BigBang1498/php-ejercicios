<?php
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Reader\Html;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="registros.xlsx"');

    $registros = 'registros.js';

    if(file_exists($registros)):
        $spreadsheet = new Spreadsheet();
        $data = file_get_contents($registros);
        $usuarios = json_decode($data, true);
        ob_start();
    ?>
    <table border="1px">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
        </tr>
        <?php foreach( $usuarios as $usuario ): ?>
        <tr>
            <td> <?php echo htmlspecialchars( $usuario['user'] ); ?></td>
            <td> <?php echo htmlspecialchars( $usuario['email'] ); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php
    $html = ob_get_clean();
    $reader = new Html();
    $spreadsheet = $reader->loadFromString($html);
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    die;
    endif;
?>
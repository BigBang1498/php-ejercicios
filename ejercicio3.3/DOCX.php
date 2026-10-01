<?php

use PhpOffice\PhpWord\Reader\Word2007;

    require 'vendor/autoload.php';

    $word = new \PhpOffice\PhpWord\PhpWord();
    
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment; filename="prueba.docx"');

    $section = $word->addSection();
    $file = 'registros.js';
    $json = file_get_contents($file);
    $usuarios = json_decode($json, true);
    ob_start();
?>
<h1>Usuarios Registrados</h1>
<table border="1px">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
    </tr>
    <?php foreach( $usuarios as $usuario ): ?>
    <tr>
        <td><?php echo htmlspecialchars($usuario['user']); ?></td>
        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php   
    $html = ob_get_clean();
    \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);
    $objWritter = \PhpOffice\PhpWord\IOFactory::createWriter( $word, 'Word2007');
    $objWritter->save('php://output');
    die;
?>
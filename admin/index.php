<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de artículos</title>
</head>
<body>
    <?php
    require '../comunes/auxiliar.php';
    require 'comunes/auxiliar.php';
    $pdo = conectar();
    $sent = $pdo->query("SELECT * FROM articulos ORDER BY codigo");
    ?>
    <table>
        <thead>
            <th>Código</th>
            <th>Descripción</th>
            <th>Precio</th>
        </thead>
        <tbody>
            <?php foreach ($sent as $fila): ?>
                <tr>
                    <td><?= hh($fila['codigo']) ?></td>
                    <td><?= hh($fila['descripcion']) ?></td>
                    <td><?= hh($fila['precio']) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>

<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <title>Portal</title>
</head>

<body>
    <?php
    require_once '../src/Carrito.php';
    require_once '../src/auxiliar.php';

    $carrito = unserialize(carrito());

    $pdo = conectar();
    $sent = $pdo->query("SELECT * FROM articulos ORDER BY codigo");
    ?>
    <div class="container mx-auto">
        <div class="flex gap-2">
            <main class="grid grid-cols-4 gap-4 justify-center justify-items-center">
                <?php foreach ($sent as $fila) : ?>
                    <div class="p-6 max-w-xs bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= hh($fila['descripcion']) ?></h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= hh($fila['descripcion']) ?></p>
                        <a href="/insertar_en_carrito.php?id=<?= $fila['id'] ?>" class="inline-flex items-center py-2 px-3.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Añadir al carrito
                            <svg aria-hidden="true" class="ml-3 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                <?php endforeach ?>
            </main>

            <?php if (!$carrito->vacio()): ?>
                <aside class="w-64" aria-label="Sidebar">
                    <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
                        <ul class="space-y-2">
                            <?php foreach ($carrito->getArticulos() as $articulo => $cantidad): ?>
                                <li>
                                    <span class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <span class="ml-3"><?= $articulo ?></span>
                                        <span class="ml-3"><?= $cantidad ?></span>
                                    </span>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <a href="/vaciar_carrito.php" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Vaciar carrito</a>
                    </div>
                </aside>
            <?php endif ?>
        </div>
    </div>
</body>

</html>

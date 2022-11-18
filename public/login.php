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
    require_once '../src/auxiliar.php';

    $login = obtener_post('login');
    $password = obtener_post('password');

    if (isset($login, $password)) {
        if ($usuario = Usuario::comprobar($login, $password)) {
            // Loguear al usuario
            $_SESSION['login'] = serialize($usuario);
            return volver();
        } else {
            // Mostrar error de validación

        }
    }
    ?>
    <div class="container mx-auto">
        <?php require '../src/_menu.php' ?>
        <div class="mx-72">
            <form action="" method="POST">
                <div class="mb-6">
                    <label for="login" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Nombre de usuario</label>
                    <input type="text" name="login" id="login" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400">
                    <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">Alright!</span> Username available!</p>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Contraseña</label>
                    <input type="password" name="password" id="password" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400">
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username already taken!</p>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
            </form>
        </div>
    </div>
    <script src="/js/flowbite/flowbite.js"></script>
</body>

</html>

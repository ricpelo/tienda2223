<?php
session_start();

require_once '../src/Carrito.php';
require_once '../src/auxiliar.php';

try {
    $id = obtener_get('id');

    if ($id === null) {
        return volver();
    }

    $carrito = unserialize(carrito());
    $carrito->insertar($id);
    $_SESSION['carrito'] = serialize($carrito);
} catch (ValueError $e) {
    // TODO: mostrar mensaje de error en un Alert
}

volver();

<?php

function conectar()
{
    return new PDO('pgsql:host=localhost,dbname=tienda', 'tienda', 'tienda');
}

function hh($x)
{
    return htmlspecialchars($x, ENT_QUOTES | ENT_SUBSTITUTE);
}

function obtener_get($par)
{
    return obtener_parametro($par, $_GET);
}

function obtener_post($par)
{
    return obtener_parametro($par, $_POST);
}

function obtener_parametro($par, $array)
{
    return isset($array[$par]) ? trim($array[$par]) : null;
}

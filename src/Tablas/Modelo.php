<?php

namespace App\Tablas;

use PDO;

class Modelo
{
    protected static string $tabla;

    public static function obtener(int $id, ?PDO $pdo = null): ?static
    {
        $pdo = $pdo ?? conectar();
        $tabla = static::$tabla;
        $sent = $pdo->prepare("SELECT *
                                 FROM $tabla
                                WHERE id = :id");
        $sent->execute([':id' => $id]);
        $fila = $sent->fetch(PDO::FETCH_ASSOC);

        return $fila ? new static($fila) : null;
    }
}

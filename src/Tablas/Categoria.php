<?php

namespace App\Tablas;

use PDO;

class Categoria extends Modelo
{
    protected static string $tabla = 'categorias';

    public $id;
    private $nombre;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->nombre = $campos['nombre'];
    }

    public static function existe(int $id, ?PDO $pdo = null): bool
    {
        return static::obtener($id, $pdo) !== null;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
}

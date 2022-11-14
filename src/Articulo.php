<?php

require_once 'auxiliar.php';

class Articulo
{
    public $id;
    public $codigo;
    public $descripcion;
    public $precio;

    public function __construct($id, $codigo, $descripcion, $precio)
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    public static function existe(int $id, ?PDO $pdo = null): bool
    {
        $pdo = $pdo ?? conectar();
        $sent = $pdo->prepare('SELECT COUNT(*)
                                 FROM articulos
                                WHERE id = :id');
        $sent->execute([':id' => $id]);
        return $sent->fetchColumn() !== 0;
    }
}

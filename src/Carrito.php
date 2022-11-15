<?php

class Carrito
{
    /**
     * @var array $articulos Los artículos del carrito.
     *                       Las claves son los IDs.
     *                       Los valores son las cantidades.
     */
    public $articulos;

    public function __construct()
    {
        $this->articulos = [];
    }

    public function insertar($id)
    {
        if (!Articulo::existe($id)) {
            throw new ValueError('El artículo no existe.');
        }

        if (isset($this->articulos[$id])) {
            $this->articulos[$id]++;
        } else {
            $this->articulos[$id] = 1;
        }
    }

    public function eliminar($id)
    {
        if (isset($this->articulos[$id])) {
            $this->articulos[$id]--;
            if ($this->articulos[$id] == 0) {
                unset($this->articulos[$id]);
            }
        } else {
            throw new ValueError('Artículo inexistente en el carrito');
        }
    }

    public function vacio(): bool
    {
        return empty($this->articulos);
    }

    public function getArticulos(): array
    {
        return $this->articulos;
    }

    public function articulos(?PDO $pdo = null): array
    {
        $pdo = $pdo ?? conectar();
        $marcadores = implode(',', array_fill(0, count($this->getArticulos()), '?'));
        $sent = $pdo->prepare("SELECT *
                                 FROM articulos
                                WHERE id in ($marcadores)");
        $sent->execute(array_keys($this->getArticulos()));

        $res = [];

        foreach ($sent as $fila) {
            $articulo = new Articulo($fila);
            $id = $articulo->id;
            $res[$id] = [$articulo, $this->getArticulos()[$id]];
        }

        return $res;
    }
}

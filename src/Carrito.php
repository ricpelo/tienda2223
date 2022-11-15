<?php

class Carrito
{
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
}

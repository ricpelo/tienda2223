<?php

class Usuario
{
    public $id;
    public $usuario;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->usuario = $campos['usuario'];
    }

    public static function obtener(int $id, ?PDO $pdo = null): ?static
    {
        $pdo = $pdo ?? conectar();
        $sent = $pdo->prepare('SELECT *
                                 FROM usuarios
                                WHERE id = :id');
        $sent->execute([':id' => $id]);
        $fila = $sent->fetch(PDO::FETCH_ASSOC);

        return $fila ? new static($fila) : null;
    }

    public static function esta_logueado(): bool
    {
        return isset($_SESSION['login']);
    }

    public static function logueado(): ?static
    {
        return isset($_SESSION['login']) ? $_SESSION['login'] : null;
    }

    public static function comprobar($login, $password, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare('SELECT *
                                 FROM usuarios
                                WHERE usuario = :login');
        $sent->execute([':login' => $login]);
        $fila = $sent->fetch(PDO::FETCH_ASSOC);

        if ($fila === false) {
            return false;
        }

        return password_verify($password, $fila['password'])
            ? new static($fila)
            : false;
    }
}

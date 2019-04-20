<?php

require_once 'autoload.php';

use MisClases\Usuario;
use MisClases\Categoria;
use MisClases\Entrada;
use Admin\Usuario as UsuarioAdmin;

class Principal{
    public $usuario;
    public $categoria;
    public $entrada;

    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->categoria = new Categoria();
        $this->entrada = new Entrada();
    }
}

$principal = new Principal();

$usuario = new Usuario();

$admin = new UsuarioAdmin();

echo '<pre>';

var_dump($principal);
var_dump($usuario);
var_dump($admin);

echo '</pre>';
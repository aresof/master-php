<?php

require_once 'models/usuario.php';

class UsuarioController{

    public function listar()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->conseguirTodos('usuarios');

        require_once 'views/usuarios/listar.php';
    }

    public function crear()
    {
        require_once 'views/usuarios/crear.php';
    }

    public function guardar()
    {
        $usuario = new Usuario();
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellidos = $_POST['apellidos'];

        $usuario->guardar();

        header("Location: index_maqueta.php?controller=Usuario&action=listar");
    }
}
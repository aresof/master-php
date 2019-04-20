<?php

require_once 'models/nota.php';

class NotaController{
    public function listar(){

        $nota = new Nota();
        $notas = $nota->conseguirTodos('notas');

        require_once 'views/notas/listar.php';


    }
    public function crear(){

        $nota = new Nota();
        $nota->setUsuarioId(1);
        $nota->setTitulo('Nota desde MVC PHP');
        $nota->setDescripcion('Descripción de mi nota desde MVC PHP');

        $nota->guardar();

        header("Location: index.php?controller=Nota&action=listar");

    }

    public function borrar(){

    }
}
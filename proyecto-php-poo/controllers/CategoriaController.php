<?php

require_once 'models/categoria.php';

class CategoriaController{

    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();

        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST)){
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            if($categoria->save()){
                $_SESSION['registro'] = 'Registro completado';
            }
            else $_SESSION['registro'] = 'Registro fallido';
        }
        else $_SESSION['registro'] = 'Registro fallido';

        Utils::redireccion(base_url.'Categoria/crear');
    }
}
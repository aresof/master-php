<?php

require_once 'models/producto.php';

class ProductoController{

    public function index(){
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/producto/index.php';
    }

    public function destacados(){
        require_once 'views/producto/destacados.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $producto = new Producto();
            $producto->setNombre($_POST['nombre']);
            $producto->setCategoriaId($_POST['categoria']);
            $producto->setPrecio($_POST['precio']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setStock($_POST['stock']);
            $producto->setOferta($_POST['oferta']);
            $producto->setImagen($_POST['imagen']);
            $producto->setFecha(date('Y-m-d'));

            if($producto->save())
                $_SESSION['registro'] = 'Registro completado';

            else $_SESSION['registro'] = 'Registro fallido';
        }
        else $_SESSION['registro'] = 'Registro fallido';

        Utils::redireccion(base_url.'Producto/crear');

    }


}
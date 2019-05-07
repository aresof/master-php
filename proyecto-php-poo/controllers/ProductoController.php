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

        $producto = new Producto();
        $productos = $producto->getRandom(6);

        require_once 'views/producto/destacados.php';
    }

    public function ver(){
        if(isset($_GET['id'])) {
            $edit = true;
            $producto = new Producto();
            $producto->setId($_GET['id']);

            $prod = $producto->getOne();
        }
        require_once 'views/producto/ver.php';
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
            $producto->setFecha(date('Y-m-d'));

            //Guardar imagen
            if(isset($_FILES['imagen'])) {
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if (in_array($mimetype, array("image/jpg", "image/png", "image/jpeg", "image/gif"))) {

                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true); //true es para crear directorios recursivamente
                    }

                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    $producto->setImagen($filename);

                }
            }
            if(isset($_GET['id'])) {
                $producto->setId($_GET['id']);
                if ($producto->update())
                    $_SESSION['registro'] = 'Registro actualizado';
                else $_SESSION['registro'] = 'Registro fallido';
            }else{
                if ($producto->save())
                    $_SESSION['registro'] = 'Registro insertado';
                else $_SESSION['registro'] = 'Registro fallido';
            }
        }
        else $_SESSION['registro'] = 'Registro fallido';

        Utils::redireccion(base_url.'Producto/index');

    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])) {
            $edit = true;
            $producto = new Producto();
            $producto->setId($_GET['id']);

            $prod = $producto->getOne();

            require_once 'views/producto/crear.php';
        }
        else Utils::redireccion(base_url.'Producto/index');

    }


    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $producto = new Producto();
            $producto->setId($_GET['id']);
            if($producto->delete()){
                $_SESSION['registro'] = 'Registro eliminado';
            }
            else $_SESSION['registro'] = 'Eliminado fallido';
        }
        else $_SESSION['registro'] = 'Eliminado fallido';

        Utils::redireccion(base_url.'Producto/index');
    }
}
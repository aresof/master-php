<?php
require_once 'models/producto.php';

class CarritoController
{

    public function index()
    {
        require_once 'views/carrito/index.php';
    }

    public function add()
    {
        if (isset($_GET['id'])) {

            if (isset($_SESSION['carrito'])) {
                $counter = 0;
                foreach ($_SESSION['carrito'] as $indice => $item) {
                    if ($item['id_prod'] == $_GET['id']) {
                        $_SESSION['carrito'][$indice]['unidades']++;
                        $counter++;
                    }
                }
            }

            if (!isset($counter) || $counter == 0) {
                $producto = new Producto();
                $producto->setId($_GET['id']);
                $producto = $producto->getOne();

                if (is_object($producto)) {
                    $_SESSION['carrito'][] = array(
                        "id_prod" => $_GET['id'],
                        "unidades" => 1,
                        "producto" => $producto
                    );
                }
            }

            Utils::redireccion(base_url . "Carrito/index");

        } else {
            Utils::redireccion(base_url);
        }
    }

    public function delete_all(){
        unset($_SESSION['carrito']);
        Utils::redireccion(base_url . "Carrito/index");
    }

    public function delete(){

        if (isset($_GET['indice'])) {
            unset($_SESSION['carrito'][$_GET['indice']]);
        }
        Utils::redireccion(base_url . "Carrito/index");
    }

    public function up(){
        if (isset($_GET['indice'])){
            $_SESSION['carrito'][$_GET['indice']]['unidades']++;
        }

        Utils::redireccion(base_url . "Carrito/index");
    }

    public function down(){
        if (isset($_GET['indice'])){

            $_SESSION['carrito'][$_GET['indice']]['unidades']--;

            if($_SESSION['carrito'][$_GET['indice']]['unidades'] == 0){
                unset($_SESSION['carrito'][$_GET['indice']]);
            }
        }

        Utils::redireccion(base_url . "Carrito/index");
    }

}
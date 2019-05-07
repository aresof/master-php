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

}
<?php

require_once 'models/pedido.php';

class PedidoController
{

    public function hacer()
    {

        require_once 'views/pedido/hacer.php';

    }

    public function add()
    {

        //var_dump($_POST);

        if (isset($_SESSION['identity'])) {

            $stats = Utils::statsCarrito();

            //Guardar datos en la BD
            $pedido = new Pedido();
            $pedido->setUsuarioId($_SESSION['identity']->id);
            $pedido->setProvincia($_POST['provincia']);
            $pedido->setLocalidad($_POST['localidad']);
            $pedido->setDireccion($_POST['direccion']);
            $pedido->setCoste($stats['total']);
            $pedido->setEstado('Confirmado');
            $pedido->setFecha(date('Y-m-d'));
            $pedido->setHora(date('H:i:s'));

            //Insert Pedido
            $save = $pedido->save();

            //Insert Lineas Pedido
            $save_lineas = $pedido->save_lineas();

            if ($save && $save_lineas) {
                $_SESSION['pedido'] = 'Completed';
            } else $_SESSION['pedido'] = 'Failed';

            Utils::redireccion(base_url . 'Pedido/confirmado&id='.$save_lineas);

        } else {
            Utils::redireccion(base_url);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $pedido = new Pedido();
            $pedido->setUsuarioId($_SESSION['identity']->id);
            $pedido->setId($_GET['id']);
            $last_pedido = $pedido->getOnebyUser();

            require_once 'views/pedido/confirmado.php';

        } else {
            Utils::redireccion(base_url);
        }
    }

    public function mis_pedidos(){
        Utils::isIdentity();

        $pedido = new Pedido();
        $pedido->setUsuarioId($_SESSION['identity']->id);
        $pedidos = $pedido->getAllbyUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();

        if (isset($_GET['id'])) {

            //Obtener datos del pedido
            $pedido = new Pedido();
            $pedido->setUsuarioId($_SESSION['identity']->id);
            $pedido->setId($_GET['id']);
            $last_pedido = $pedido->getOnebyUser();

            require_once 'views/pedido/detalle.php';
        }
        else Utils::redireccion(base_url);
    }

    public function gestion(){
        Utils::isAdmin();

        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';

    }

    public function estado(){
        Utils::isAdmin();

        if (isset($_POST['estado']) && isset($_POST['pedido_id'])) {
            $pedido = new Pedido();
            $pedido->setEstado($_POST['estado']);
            $pedido->setId($_POST['pedido_id']);
            $pedido->update();
             Utils::redireccion(base_url.'pedido/detalle&id='.$_POST['pedido_id']);
        }
        else Utils::redireccion(base_url);
    }
}
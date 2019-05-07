<?php

class Utils{

    public static function deleteSession($session){
        if(isset($_SESSION[$session]))
            $_SESSION[$session] = null;

        return true;
    }

    public static function redireccion($url){
        ?><script> window.location.href = '<?=$url?>'; </script><?php
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])) {
            self::redireccion(base_url);
        }
    }

    public static function NumberFormat($num){
        return number_format($num, 2, ',', '.');
    }

    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    public static function statsCarrito(){
        $stats = array (
                "count" => 0,
                "total" => 0
        );

        if(isset($_SESSION['carrito'])){
            $counter = 0;
            $total = 0;
            foreach ($_SESSION['carrito'] as $item){
                $counter += $item['unidades'];
                $total += $item['unidades'] * $item['producto']->precio;
            }
            $stats['count'] = $counter;
            $stats['total'] = $total;
        }

        return $stats;
    }
}
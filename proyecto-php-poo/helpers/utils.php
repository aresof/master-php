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
}
<?php

class Database{

    //Conexion
    private static $server = 'localhost:8889';
    private static $username = 'artu';
    private static $password = 'artu';
    private static $database = 'notas_master';


    public static function conectar(){
        $conexion = new mysqli(self::$server, self::$username, self::$password, self::$database);
        $conexion->query("SET NAMES 'utf8'");

        return $conexion;
    }

}
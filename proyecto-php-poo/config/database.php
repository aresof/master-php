<?php

class Database{

    //Conexion
    private static $server = 'localhost:8889';
    private static $username = 'artu';
    private static $password = 'artu';
    private static $database = 'tienda_master';


    public static function connect(){
        $db = new mysqli(self::$server, self::$username, self::$password, self::$database);
        $db->query("SET NAMES 'utf8'");

        return $db;
    }

}
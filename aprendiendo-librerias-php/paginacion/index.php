<?php

error_reporting(E_ALL);
ini_set("display_errors", "on");

require_once '../vendor/autoload.php';

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



$db = Database::conectar();

$result = $db->query("SELECT * FROM notas");
$num = $result->num_rows;
$num_pag = 2;

//Hacer paginacion
$pagination = new Zebra_Pagination();

//Total a paginar
$pagination->records($num);

//Numero de elementos por pagina
$pagination->records_per_page($num_pag);

$page = $pagination->get_page();
$page_actual = (($page-1)*$num_pag);
$sql = "SELECT * FROM notas LIMIT $page_actual, $num_pag";
$notas = $db->query($sql);

while($nota = $notas->fetch_object()){
    echo "<h1>{$nota->titulo}</h1>";
    echo "<h3>{$nota->descripcion}</h3></hr>";
}

//Hoja estilos paginacion
echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css">';

$pagination->render();
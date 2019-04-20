<?php

//Capturar excepciones, en codigo susceptible a errores

try{

    if(isset($_GET['id']))
        echo "<h1>El parámetro es: {$_GET['id']}</h1>";
    else throw new Exception('Faltan parámetros por la URL');

} catch (Exception $exception){

    echo "Error tipo: ".$exception->getMessage();

}
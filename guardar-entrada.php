<?php


if (isset($_POST)) {

    //Conexión a la BD
    require_once 'includes/conexion.php';

    if(!isset($_SESSION))
        session_start();

    //Recoger los valores del formulario de registro
    $titulo = isset($_POST["titulo"]) ? mysqli_real_escape_string($db, $_POST["titulo"]) : false;
    $descripcion = isset($_POST["descripcion"]) ? mysqli_real_escape_string($db, $_POST["descripcion"]) : false;
    $categoria = isset($_POST["categoria"]) ? mysqli_real_escape_string($db, $_POST["categoria"]) : false;
    $usuario = $_SESSION["usuario"]["id"];

    $errores = array();

    //Validar los datos
    if (empty($titulo)) {
        $errores["titulo"] = "El título no es válido";
    }
    if (empty($descripcion)) {
        $errores["descripcion"] = "La descripción no es válida";
    }
    if (empty($categoria) && !is_numeric($categoria)) {
        $errores["categoria"] = "La categoría no es válida";
    }


    if(count($errores) == 0){

        //INSERTAR CATEGORIA
        $sql = "INSERT INTO entradas VALUES (null, '$titulo', '$descripcion', $usuario, $categoria, CURDATE(),'');";
        $query = mysqli_query($db, $sql) or die('Error: '.mysqli_error($db));
        header('Location: index.php');

    }else{
        $_SESSION["errores_entrada"] = $errores;
        header('Location: crear-entrada.php');

    }


}


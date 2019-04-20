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
        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria ".
                   "WHERE id=$entrada_id AND usuario_id = $usuario_id";
        }
        else{
            //INSERTAR ENTRADA
            $sql = "INSERT INTO entradas VALUES (null, '$titulo', '$descripcion', $usuario, $categoria, CURDATE(),'');";
        }
        $query = mysqli_query($db, $sql) or die('Error: '.mysqli_error($db));
        header('Location: index.php');

    }else{
        $_SESSION["errores_entrada"] = $errores;
        if(isset($_GET['editar'])){
            header("Location: editar-entrada.php?id=".$_GET['editar']);
        }
        else {
            header('Location: crear-entrada.php');
        }

    }


}


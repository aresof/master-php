<?php


if (isset($_POST)) {

    //Conexión a la BD
    require_once 'includes/conexion.php';

    if(!isset($_SESSION))
        session_start();

    //Recoger los valores del formulario de registro
    $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST["nombre"]) : false;

    $errores = array();

    //Validar los datos
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores["nombre"] = "El nombre no es válido";
    }

    $guardar_categoria =  false;

    if(count($errores) == 0){
        $guardar_categoria = true;

        //INSERTAR CATEGORIA
        $sql = "INSERT INTO categorias VALUES (null, '$nombre');";
        $query = mysqli_query($db, $sql) or die('Error: '.mysqli_error($db));

        if($query){
            $_SESSION["completado"] = "El registro se ha completado con éxito";
        }
        else {
            $_SESSION["errores"]["general"] = "Fallo al guardar categoría!!";

        }

    }else{
        $_SESSION["errores"] = $errores;

    }

    header('Location: index.php');
}


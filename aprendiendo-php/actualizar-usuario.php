<?php

if (isset($_POST)) {

    //Conexión a la BD
    require_once 'includes/conexion.php';

    if(!isset($_SESSION))
        session_start();


    //Recoger los valores del formulario de registro
    $nombre = isset($_POST["nombre"]) ? mysqli_real_escape_string($db, $_POST["nombre"]) : false;
    $apellidos = isset($_POST["apellidos"]) ? mysqli_real_escape_string($db, $_POST["apellidos"]) : false;
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($db, $_POST["email"]) : false;

    $errores = array();

    //Validar los datos
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores["nombre"] = "El nombre no es válido";
    }

    //Validar los datos
    if (!empty($apellidos && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos))){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores["apellidos"] = "Los apellidos no son válidos";
    }

    //Validar los datos
    if (!empty($email)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores["email"] = "El email no es válido";
    }

    $guardar_usuario =  false;

    if(count($errores) == 0){
        $guardar_usuario = true;

        $usuario = $_SESSION["usuario"];

        //ACTUALIZAR USUARIO
        $sql = "UPDATE usuarios SET ".
               "nombre = '$nombre', ".
               "apellidos = '$apellidos', ".
               "email = '$email' ".
               "WHERE id = ".$usuario['id'];
        $query = mysqli_query($db, $sql) or die('Error: '.mysqli_error($db));

        if($query){
            $_SESSION["usuario"]["nombre"] = $nombre;
            $_SESSION["usuario"]["apellidos"] = $apellidos;
            $_SESSION["usuario"]["email"] = $email;

            $_SESSION["completado"] = "Tus datos se han actualizado con éxito";
        }
        else {
            $_SESSION["errores"]["general"] = "Fallo al actualizar tus datos!!";

        }


    }else{
        $_SESSION["errores"] = $errores;

    }

    header('Location: mis-datos.php');
}
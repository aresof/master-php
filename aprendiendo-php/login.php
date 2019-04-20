<?php

if(isset($_POST)){

    require_once 'includes/conexion.php';
    require_once 'includes/helpers.php';

    if(isset($_SESSION["error_login"])){
        session_unset($_SESSION["error_login"]);
    }


    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if($login){

        $usuario = mysqli_fetch_assoc($login);

        if(password_verify($password, $usuario["password"])){

            $_SESSION["usuario"] = $usuario;

        }
        else{
            $_SESSION["error_login"] = "Login incorrecto!!";
        }

    }
    else{
        $_SESSION["error_login"] = "Login incorrecto!!";
    }

}

header('Location: index.php');
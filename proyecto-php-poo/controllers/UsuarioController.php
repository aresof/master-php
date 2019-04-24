<?php

require_once 'models/usuario.php';

class UsuarioController
{

    public function index()
    {
        echo "Controlador Usuarios, Accion index";
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function save()
    {
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            if($usuario->save()){
                $_SESSION['registro'] = 'Registro completado';
            }
            else $_SESSION['registro'] = 'Registro fallido';
        }
        else $_SESSION['registro'] = 'Registro fallido';

        Utils::redireccion(base_url.'Usuario/registro');

    }

    public function login(){
        if(isset($_POST)){
            //Consulta usuario
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity =  $usuario->login();

            if(is_object($identity)){
                //Inicio de sesion
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin')
                    $_SESSION['admin'] = true;
            }
            else{
                $_SESSION['error_login'] = 'Identificación fallida!!';
            }

        }
        Utils::redireccion(base_url);
    }

    public function logout(){
        if(isset($_SESSION['identity']))
            $_SESSION['identity'] = null;
        if(isset($_SESSION['admin']))
            $_SESSION['admin'] = null;

        Utils::redireccion(base_url);
    }

}
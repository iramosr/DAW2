<?php

namespace controllers;

use dao\RolesDao;
use dao\UsuariosDao;
use libs\Controller;

class   LoginController extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('public/login');
    }

    function in()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usuariosDao = new UsuariosDao();
        $usuario = $usuariosDao->getByUsername($_POST['username']);

        //Comprobar contraseña
        if ($usuario != null && password_verify($password, $usuario['password'])) {
            $this->data['result']['type'] = 'info';
            $this->data['result']['msg'] = 'Usuario identificado';

            $rolesDao = new RolesDao();
            $roles = $rolesDao->roles($usuario['id']);
            $usuario['roles'] = $roles;
            $_SESSION['usuario'] = $usuario;
        } else {
            $this->data['result']['type'] = 'error';
            $this->data['result']['msg'] = 'Usuario no identificado';
            unset($_SESSION['usuario']); //Elimina el login del usuario
        }

        $this->view->render('public/home', $this->data);
        $_SESSION['result'] = $this->data['result'];


    }

    function out()
    {
        unset($_SESSION['usuario']); //Elimina el login del usuario
        $this->data['result']['type'] = 'info';
        $this->data['result']['msg'] = 'Sesión cerrada';
//      $this->view->render('public/home', $this->data);
        $_SESSION['result'] = $this->data['result'];
        header("Location: " . BASE_URL);
    }
}
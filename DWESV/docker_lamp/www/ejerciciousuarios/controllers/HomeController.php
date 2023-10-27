<?php

namespace controllers;
use dao\UsuariosDao;
use libs\Controller;
class HomeController extends Controller
{

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $this->home();
    }

    function home()
    {
        $this->view->render('public/home');
    }

    public function login(){
        $this->view->render('public/login');
    }

    public function login_verify(){
        // Falta acabarlo
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usuariosDao = new UsuariosDao();
        $usuario = $usuariosDao->getByUsername($_POST['username']);
        dep($usuario);

        //Comprobar contraseña
        if ($usuario != null && password_verify($password, $usuario->password)){
            echo "Contraseña correcta";
        } else {
            echo "Contraseña incorrecta";
        }

        $this->view->render('public/home');
    }


}
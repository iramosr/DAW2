<?php

namespace controllers;

use dao\RolesDao;
use dao\UsuariosDao;
use dao\UsuariosRolesDao;
use libs\Controller;
use services\LogService;

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

    function registro()
    {
        $usuario = [];
        if (isset($_POST['username'])) {
            $usuario['username'] = strtolower($_POST['username']);
        } else {
            $usuario['username'] = null;
        }
        if (isset($_POST['password'])) {
            $usuario['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }
        $usuario['email'] = $_POST['email'] ?? null;
        $usuario['nombre'] = $_POST['nombre'] ?? null;
        $usuario['apellido1'] = $_POST['apellido1'] ?? null;
        $usuario['apellido2'] = $_POST['apellido2'] ?? null;
        if ($_FILES['foto'] && $_FILES['foto']['name'] != '') {
            $foto = $_FILES['foto'];
            $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
            $nameFoto = uniqid() . '-' . $usuario['username'] . "." . $extension;
            $localPathImagen = fullPath(UPLOAD_FOTOS_USUARIOS, $nameFoto);
            move_uploaded_file($foto['tmp_name'], $localPathImagen);
            $usuario['foto'] = $nameFoto;
        }
        $usuario['activo'] = 1;
        $usuario['bloqueado'] = 0;

        $rolCliente = 1;

        $usuario['num_intentos'] = $_POST['num_intentos'] ?? 0;
        $usuario['ultimo_acceso'] = $_POST['ultimo_acceso'] ?? date("Y-m-d");


        $dao = new UsuariosDao();
        $usuarioId = $dao->add($usuario);
        if ($usuarioId != null) {
            $this->data['result']['type'] = 'success';
            $this->data['result']['msg'] = "Usuario guardado";

            $usuarioRolesDao = new UsuariosRolesDao();
            $rolesDao = new RolesDao();

            if ($rolCliente != null) {
                $rol = $rolesDao->getByRol("CLIENTE");
                $rol = ['rol_id' => $rol['id'], 'usuario_id' => $usuarioId];
                $usuarioRolesDao->add($rol);
            }

            LogService::info("Usuario creado: " . $usuario['username']);
        } else {
            $this->data['result']['type'] = 'error';
            $this->data['result']['msg'] = "Usuario no guardado";
            LogService::error("Usuario NO creado: " . $usuario['username']);
        }

        $usuario = $dao->getByUsername($_POST['username']);
        $rolesDao = new RolesDao();
        $roles = $rolesDao->roles($usuario['id']);
        $usuario['roles'] = $roles;
        $_SESSION['usuario'] = $usuario;
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
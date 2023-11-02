<?php

namespace controllers;

use dao\UsuariosDao;
use dao\UsuariosRolesDao;
use dao\RolesDao;
use libs\Controller;
use services\LogService;


class UsuariosController extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){

        $dao = new UsuariosDao();
        $usuarios = $dao->listAll();
        $this->data['usuarios'] = $usuarios;
        $this->view->render('admin/usuarios/index', $this->data);

    }

    public function add(){
        $this->data['accion'] = BASE_URL."/usuarios/store";
        $this->data['boton'] = 'Insertar';
        $this->view->render('admin/usuarios/add', $this->data);
    }

    public function store(){
        $usuario = [];

        if (isset($_POST['username'])){
            $usuario['username'] = strtolower($_POST['username']);
        } else {
            $usuario['username'] = null;
        }
        if(isset($_POST['password'])){
            $usuario['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }
        $usuario['email'] = $_POST['email'] ?? null;
        $usuario['nombre'] = $_POST['nombre'] ?? null;
        $usuario['apellido1'] = $_POST['apellido1'] ?? null;
        $usuario['apellido2'] = $_POST['apellido2'] ?? null;
        if ($_FILES['foto'] && $_FILES['foto']['name'] != '') {
            $foto = $_FILES['foto'];
            $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
            $nameFoto = uniqid() . '-' . $usuario['username'].".".$extension;
            $localPathImagen = fullPath(UPLOAD_FOTOS_USUARIOS, $nameFoto);
            move_uploaded_file($foto['tmp_name'], $localPathImagen);
            $usuario['foto'] = $nameFoto;
        }
        if (isset($_POST['activo'])){
            $usuario['activo'] = 1;
        }
        if (isset($_POST['bloqueado'])){
            $usuario['bloqueado'] = 1;
        }
        $rolAdmin = $_POST['rolAdmin'] ?? null;
        $rolEmple = $_POST['rolEmpleado'] ?? null;
        $rolCliente = $_POST['rolCliente'] ?? null;

        $usuario['num_intentos'] = $_POST['num_intentos'] ?? 0;
        $usuario['ultimo_acceso'] = $_POST['ultimo_acceso'] ?? date("Y-m-d");


        $dao = new UsuariosDao();
        $usuarioId = $dao->add($usuario);
        if ($usuarioId != null) {
            $this->data['result']['type'] = 'success';
            $this->data['result']['msg'] = "Usuario guardada";

            $usuarioRolesDao = new UsuariosRolesDao();
            $rolesDao = new RolesDao();

            if ($rolAdmin != null){
                $rol = $rolesDao->getByRol("ADMIN");
                $rol = ['rol_id'=>$rol['id'], 'usuario_id'=>$usuarioId];
                $usuarioRolesDao->add($rol);
            }
            if ($rolEmple != null){
                $rol = $rolesDao->getByRol("EMPLE");
                $rol = ['rol_id'=>$rol['id'], 'usuario_id'=>$usuarioId];
                $usuarioRolesDao->add($rol);
            }
            if ($rolCliente != null){
                $rol = $rolesDao->getByRol("CLIENTE");
                $rol = ['rol_id'=>$rol['id'], 'usuario_id'=>$usuarioId];
                $usuarioRolesDao->add($rol);
            }

            LogService::info("Usuario creado: ".$usuario['username']);
        } else {
            $this->data['result']['type'] = 'error';
            $this->data['result']['msg'] = "Usuario no guardada";
            LogService::error("Usuario NO creado: ".$usuario['username']);
        }
        $this->index();
    }

    public function show($values){
        $dao = new UsuariosDao();
        $usuario = $dao->get($values[0]);
        $this->data['usuario'] = $usuario;
        $this->data['readonly'] = 'readonly';
        $this->data['disabled'] = 'disabled';
        $this->data['accion'] = BASE_URL."/usuarios/index/";
        $this->data['boton'] = 'Volver';
        $this->view->render('admin/usuarios/show', $this->data);
    }

    public function delete($values){
        {
            $id = $values[0];

            $dao = new UsuariosDao();

            if ($dao->delete($id)) {
                $this->data['result']['type'] = 'success';
                $this->data['result']['msg'] = "Usuario eliminado";
                LogService::info("Usuario borrado: ".$id);
            } else {
                $this->data['result']['type'] = 'error';
                $this->data['result']['msg'] = "Usuario no eliminado";
                LogService::info("Usuario NO borrado: ".$id);
            }
            $this->index();
        }
    }
    public function update($values)
    {
        $id = $values[0];
        $dao = new UsuariosDao();
        $usuarioBD = $dao->get($id);
        if ($_SERVER['REQUEST_METHOD']=== 'POST'){

            $usuario = [];
            $usuario['username'] = $_POST['username'] ?? null;
            if (isset($_POST['password']) && $_POST['password'] != '') {
                $usuario['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
            } else {
                $usuario['password'] = $usuarioBD['password'];
            }
            $usuario['email'] = $_POST['email'] ?? null;
            $usuario['nombre'] = $_POST['nombre'] ?? null;
            $usuario['apellido1'] = $_POST['apellido1'] ?? null;
            $usuario['apellido2'] = $_POST['apellido2'] ?? null;

            if (isset($_POST['activo'])){
                $usuario['activo'] = 1;
            } else{
                $usuario['activo'] = 0;
            }
            if (isset($_POST['bloqueado'])){
                $usuario['bloqueado'] = 1;
            } else{
                $usuario['bloqueado'] = 0;
            }
            $usuario['num_intentos'] = $_POST['num_intentos'] ?? 0;
            $usuario['ultimo_acceso'] = $_POST['ultimo_acceso'] ?? date("Y-m-d");


            if ($dao->update($id, $usuario)) {
                $this->data['result']['type'] = 'success';
                $this->data['result']['msg'] = 'Usuario actualizado';

            } else {
                $this->data['result']['type'] = 'error';
                $this->data['result']['msg'] = 'No se pudo actualizar el usuario';
            }
        }

        $usuario=$dao->get($id);
        if ($usuario) {
            $this->data['usuario'] = $usuario;
            LogService::info("Usuario actializado: ".$usuario['username']);
        }
        $this->data['accion'] = BASE_URL."/usuarios/update/".$id;
        $this->data['boton'] = 'Cambiar';
        $this->view->render('admin/usuarios/update', $this->data);
    }

}
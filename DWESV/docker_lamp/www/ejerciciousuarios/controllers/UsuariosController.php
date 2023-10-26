<?php

namespace controllers;

use dao\UsuariosDao;
use libs\Controller;


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
        $this->view->render('admin/usuarios/add');
    }

    public function store(){
        $usuario = [];

        $usuario['username'] = $_POST['username'] ?? null;
        $usuario['password'] = $_POST['password'] ?? null;
        $usuario['email'] = $_POST['email'] ?? null;
        $usuario['nombre'] = $_POST['nombre'] ?? null;
        $usuario['apellido1'] = $_POST['apellido1'] ?? null;
        $usuario['apellido2'] = $_POST['apellido2'] ?? null;
        if ($_FILES['foto'] && $_FILES['foto']['name'] != '') {
            $foto = $_FILES['foto'];
            $nameFoto = uniqid() . '-' . $foto['name'];
            $localPathImagen = fullPath(UPLOAD_FOTOS, $nameFoto);
            move_uploaded_file($foto['tmp_name'], $localPathImagen);
            $usuario['foto'] = $nameFoto;
        }
        if (isset($_POST['activo'])){
            $usuario['activo'] = 1;
        }
        if (isset($_POST['bloqueado'])){
            $usuario['bloqueado'] = 1;
        }
        $usuario['num_intentos'] = $_POST['num_intentos'] ?? null;
        $usuario['ultimo_acceso'] = $_POST['ultimo_acceso'] ?? null;


        $dao = new UsuariosDao();
        if ($dao->add($usuario)) {
            $this->data['result']['type'] = 'success';
            $this->data['result']['msg'] = "Usuario guardada";
        } else {
            $this->data['result']['type'] = 'error';
            $this->data['result']['msg'] = "Usuario no guardada";
        }
        $this->index();
    }

    public function show($values)
    {
        echo "<h2>Método show</h2>";
        $this->view->render('admin/usuarios/show');
    }

    public function delete($values){
        $this->view->render('admin/usuarios/delete');
    }

}
<?php

namespace controllers;

use dao\UsuariosDao;
use libs\Controller;

class UsuariosController extends Controller {
    private $dao;

    public function __construct() {
        parent::__construct();
        $this->dao = new UsuariosDao();
    }

    public function index() {
        $usuarios = $this->dao->listAll();
        $this->data['usuarios'] = $usuarios;
        $this->view->render('admin/usuarios/index', $this->data);
    }

    public function add() {
        $this->view->render('admin/usuarios/add');
    }

    public function store(){
        $usuario = [];
        $usuario['username']= $_POST['username'] ?? null;
        $usuario['password']= $_POST['password'] ?? null;
        $usuario['email']= $_POST['email'] ?? null;
        $usuario['nombre']= $_POST['nombre'] ?? null;
        $usuario['apellido1']= $_POST['apellido1'] ?? null;
        $usuario['apellido2']= $_POST['apellido2'] ?? null;
        $usuario['activo'] = ($_POST['estado'] === 'activo') ? 1 : 0;
        $usuario['bloqueado'] = ($_POST['estado'] === 'bloqueado') ? 1 : 0;
        $usuario['num_intentos'] = $_POST['num_intentos'] ?? null;
        //$encuesta['foto'] = $_FILES['foto']['name'];

        if ($_FILES['foto'] && $_FILES['foto']['name'] != '') {
            $foto = $_FILES['foto'];
            $nameFoto = uniqid() . '-' . $foto['name'];
            $localPathImagen = fullPath(UPLOAD_FOTOS, $nameFoto);
            move_uploaded_file($foto['tmp_name'], $localPathImagen);
            $usuario['foto'] = $nameFoto;
        }

        $dao = new UsuariosDao();

        if ($dao->add($usuario)) {
            $this->data['result']['type'] = 'success';
            $this->data['result']['msg'] = "Encuesta guardada";
        } else {
            $this->data['result']['type'] = 'error';
            $this->data['result']['msg'] = "Encuesta no guardada";
        }
        $this->index();
    }

    public function show($values) {
        echo "<h2>Método show</h2>";
        $this->view->render('admin/usuarios/show');
    }

    public function edit($values){
        $this->view->render('admin/usuarios/update');
    }
    public function update($values)
    {
        $id = $values[0];
        $dao = new UsuariosDao();
        // Verifica si se ha proporcionado un ID de usuario
      if ($_SERVER['REQUEST_METHOD']=== 'POST'){

          $usuario = [];
          $usuario['username'] = $_POST['username'] ?? null;
          $usuario['password'] = $_POST['password'] ?? null;
          $usuario['email'] = $_POST['email'] ?? null;
          $usuario['nombre'] = $_POST['nombre'] ?? null;
          $usuario['apellido1'] = $_POST['apellido1'] ?? null;
          $usuario['apellido2'] = $_POST['apellido2'] ?? null;
          $usuario['activo'] = ($_POST['estado'] === 'activo') ? 1 : 0;
          $usuario['bloqueado'] = ($_POST['estado'] === 'bloqueado') ? 1 : 0;
          $usuario['num_intentos'] = $_POST['num_intentos'] ?? null;


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
      }
        $this->view->render('admin/usuarios/update', $this->data);

    }

    public function delete($values)
    {
        $id = $values[0];
        $dao = new UsuariosDao();

        if ($dao->delete($id)) {
            $this->data['result']['type'] = 'success';
            $this->data['result']['msg'] = "Usuario eliminado";
        } else {
            $this->data['result']['type'] = 'error';
            $this->data['result']['msg'] = "Usuario no eliminado";
        }
        $this->index();
    }
}

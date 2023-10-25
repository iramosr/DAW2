<?php

namespace controllers;

use dao\EncuestasDao;
use libs\Controller;


class EncuestasController extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){

        $dao = new EncuestasDao();
        $encuestas = $dao->listAll();
        $this->data['encuestas'] = $encuestas;
        $this->view->render('admin/encuestas/index', $this->data);

    }

    public function add(){
        $this->view->render('admin/encuestas/add');
    }

    public function store(){
        $encuesta = [];
        $encuesta['nombre'] = $_POST['nombre'] ?? null;
        $encuesta['apellidos'] = $_POST['apellidos'] ?? null;
        $encuesta['email'] = $_POST['email'] ?? null;
        $encuesta['fecha_nacimiento'] = $_POST['fecha_nacimiento'] ?? null;
        $encuesta['sexo'] = $_POST['sexo'] ?? null;
        if (isset($_POST['aficiones'])){
            $encuesta['aficiones'] = implode(",", $_POST['aficiones']);
        }
        $encuesta['estudios'] = $_POST['estudios'] ?? null;
        $encuesta['observaciones'] = $_POST['observaciones'] ?? null;
        //$encuesta['foto'] = $_FILES['foto']['name'];

        if ($_FILES['foto'] && $_FILES['foto']['name'] != '') {
            $foto = $_FILES['foto'];
            $nameFoto = uniqid() . '-' . $foto['name'];
                $localPathImagen = fullPath(UPLOAD_FOTOS, $nameFoto);
            move_uploaded_file($foto['tmp_name'], $localPathImagen);
            $encuesta['foto'] = $nameFoto;
        }
        $dao = new EncuestasDao();
        if ($dao->add($encuesta)) {
            $this->data['result']['type'] = 'success';
            $this->data['result']['msg'] = "Encuesta guardada";
        } else {
            $this->data['result']['type'] = 'error';
            $this->data['result']['msg'] = "Encuesta no guardada";
        }
        $this->index();
    }

    public function show($values)
    {
        echo "<h2>Método show</h2>";
        $this->view->render('admin/encuestas/show');
    }
}
<?php

namespace controllers;

use dao\EncuestasDao;
use libs\Controller;
require_once (__DIR__ . "/../libs/Controller.php");

class EncuestasController extends Controller
{

    function __construct(){
        parent::__construct();
    }
    public function index(){
        $dao = new EncuestasDao();
        $encuestas = $dao->listAll();
        dep($encuestas);
        $this->view->render('encuestas/index');
    }

    //carga formulario (en el formulario action encuestas/save)
    public function add(){
        echo "<h2>Método add</h2>";
        $this->view->render('encuestas/add');
    }

    public function show($values){
        echo "<h2>Método show</h2>";
        $this->view->render('encuestas/show');
    }

    public function save(){
        echo "<h2>Método save</h2>";
        $this->view->render('encuestas/save');
    }
}
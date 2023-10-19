<?php

namespace controllers;

use dao\EncuestasDao;
use libs\Controller;


class EncuestasController extends Controller
{

    function __construct() {
        parent::__construct();
    }

    function index() {

    $dao = new EncuestasDao();
    $encuestas = $dao->listAll();
        $this->data['encuestas'] = $encuestas;
        $this->view->render('admin/encuestas/index', $this->data);

    }

    public function add() {
        echo "<h2>Método add</h2>";
        $this->view->render('encuestas/add');
    }

    public function show($values) {
        echo "<h2>Método show</h2>";
        $this->view->render('encuestas/show');
    }
}
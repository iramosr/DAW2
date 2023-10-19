<?php

namespace controllers;
use dao\EncuestasDao;
use libs\Controller;
class EncuestasController extends Controller
{

    function __construct()
    {
        parent::__construct();

    }

    function index()
    {
        $dao = new EncuestasDao();
        $encuestas = $dao->listAll();
        dev($encuestas);
        $this->view->render("encuestas/index");
    }

    function add()
    {
        echo "<h2>METODO add</h2>";
        $this->view->render("encuestas/add");
    }

    function show($values)
    {
        echo "<h2>METODO show</h2>";
        //dev($values);
        $this->view->render("encuestas/show");
    }



}
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

}
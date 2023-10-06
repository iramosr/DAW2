<?php

namespace controllers;

class HomeController
{

    function __construct(){
    }

    function index(){
        $this->home();
    }

    function home(){
        echo "<h1>INICIO</h1>";
    }
}
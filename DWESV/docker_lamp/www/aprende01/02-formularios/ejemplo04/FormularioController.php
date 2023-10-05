<?php

class FormularioController
{
    public function __construct(){
    }

    public function add($usuario, $errors=[]){
        require "formulario.view.php";
    }
}
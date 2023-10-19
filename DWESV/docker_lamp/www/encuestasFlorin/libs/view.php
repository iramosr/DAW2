<?php

namespace libs;

class view
{
    function __construct()
    {

    }
    function render($view, $data ="",$mensaje=""){
        require 'views/'.$view.'.php';
    }
}
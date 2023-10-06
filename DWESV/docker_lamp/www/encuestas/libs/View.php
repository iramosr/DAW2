<?php

namespace libs;

class View{
    function __construct(){
    }

    function render($view, $data='', $message=''){
        require 'views/'.$view.'.php';
    }
}
<?php

namespace libs;

require_once __DIR__ . "../../config/config.php";
require_once "View.php";

class Controller
{
    protected $view;
    protected $data;

    function __construct(){
        #Configura valores por defecto para las views.
        $this->data['page_tag'] = APP_NAME;
        $this->data['page_title'] = '';
        $this->view = new View();
    }
}
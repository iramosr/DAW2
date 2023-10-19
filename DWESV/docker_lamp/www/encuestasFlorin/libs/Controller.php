<?php

namespace libs;

class Controller
{

    protected $view;

    protected $data;
    function __construct()
    {
        $this->data['page_tag']= APP_NAME;
        $this->data['page_title']= '';
        $this->view = new View();
    }
}
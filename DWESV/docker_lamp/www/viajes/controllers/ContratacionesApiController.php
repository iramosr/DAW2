<?php

namespace controllers;
use dao\ContratacionesDao;
use libs\Controller;
use services\LogService;

class ContratacionesApiController extends Controller
{

    function __construct() {
        parent::__construct();
    }

    public function get($values){
        $contratacion=$_POST["id"] ?? null;
        LogService::debug("Acceso a endpoint: contrataciones-api/get ".$contratacion);
        $dao = new ContratacionesDao();
        $contratacion = $dao->get($contratacion);
        if ($contratacion != null) {
            LogService::info("Acceso a endpoint: contrataciones-api/get ".$contratacion['id']);
            echo json_encode($contratacion, JSON_UNESCAPED_UNICODE);
        } else {
            LogService::error("Acceso a endpoint: contrataciones-api/get ".$contratacion);
            header('HTTP/1.0 400 Bad Request');
        }
    }

}
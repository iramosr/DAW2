<?php

namespace controllers;
use dao\ViajesDao;
use libs\Controller;
use services\LogService;

class ViajesApiController extends Controller
{

    function __construct() {
        parent::__construct();
    }

    public function get_by_codigo($values){
        $viaje=$_POST["codigo"] ?? null;
        LogService::debug("Acceso a endpoint: viajes-api/get_by_codigo ".$viaje);
        $dao = new ViajesDao();
        $viaje = $dao->getByCodigo($viaje);
        if ($viaje != null) {
            LogService::info("Acceso a endpoint: viajes-api/get_by_codigo ".$viaje['codigo']);
            echo json_encode($viaje, JSON_UNESCAPED_UNICODE);
        } else {
            LogService::error("Acceso a endpoint: viajes-api/get_by_codigo ".$viaje);
            header('HTTP/1.0 400 Bad Request');
        }
    }

}
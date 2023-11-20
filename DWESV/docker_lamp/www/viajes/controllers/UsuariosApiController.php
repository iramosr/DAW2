<?php

namespace controllers;
use dao\UsuariosDao;
use libs\Controller;
use services\LogService;

class UsuariosApiController extends Controller
{

    function __construct() {
        parent::__construct();
    }

    public function get_by_username($values){
        $username=$_POST["username"] ?? null;
        LogService::debug("Acceso a endpoint: usuarios-api/get_by_username ".$username);
        $dao = new UsuariosDao();
        $usuario = $dao->getByUsername($username);
        if ($usuario != null) {
            LogService::info("Acceso a endpoint: usuarios-api/get_by_username ".$username);
            echo json_encode($usuario, JSON_UNESCAPED_UNICODE);
        } else {
            LogService::error("Acceso a endpoint: usuarios-api/get_by_username ".$username);
            header('HTTP/1.0 400 Bad Request');
        }
    }

}
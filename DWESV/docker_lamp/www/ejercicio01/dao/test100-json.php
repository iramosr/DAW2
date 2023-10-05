<?php
require_once "ViajesDao.php";

$dao = new ViajesDao();

$viaje = $dao->get(1);

//var_dump($viaje);
//OPCION BASICA
header('Content-Type: application/json');
echo json_encode($viaje);

//OPCION SIN CAMPOS NULL
$viaje = array_map(function ($item){
    return array_filter($item,function ($value){
        return $value!==null;
    });
},$viaje);
echo json_encode($viaje);

//OPCION CON TILDES
echo json_encode($viaje,JSON_UNESCAPED_UNICODE);
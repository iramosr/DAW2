<?php
require_once "ViajesDao.php";

$dao = new ViajesDao;
$viaje = [
    "codigo"=>"V01",
    "descripcion"=>"Viaje a Madrid",
    "precio"=>100,
    "salida"=>'2023/12/01 10:30:23',
    "llegada"=>'2023/12/02 12:00:00'
];
$id = $dao->add($viaje);
if (!is_null($id))
    echo "Viaje añadido. ID=".$id."<br>";
else
    echo "Viaje no añadido";

$result = $dao->listAll();
echo "<pre>";
var_dump($result);
echo "</pre>";
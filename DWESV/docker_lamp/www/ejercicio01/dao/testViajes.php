<?php
require_once "ViajesDao.php";

$dao = new ViajesDao;
$viaje = [
    "codigo"=>"Vl".rand(10000,99999),
    "descripcion"=>"Viaje a Madrid",
    "precio"=>300.0,
    "salida"=>'2023-12-01 10:30:23',
    "llegada"=>'2023-12-02 12:00:00',
    "foto"=>'fotos/foto'.rand(10000,99999).'.jpg'
];
$id = $dao->add($viaje);
if (!is_null($id))
    echo "Viaje añadido. ID=".$id."<br>";
else
    echo "Viaje no añadido";

$result = $dao->getByCodigo("Vl64394");
echo "<pre>";
var_dump($result);
echo "</pre>";
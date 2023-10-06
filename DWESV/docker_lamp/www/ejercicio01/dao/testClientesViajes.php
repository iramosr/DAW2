<?php
require_once "ClientesDao.php";
require_once "ViajesDao.php";
require_once "ClientesViajesDao.php";

$daoclientes = new ClientesDao;
$daoviajes = new ViajesDao;
$daoclientesviajes = new ClientesViajesDao();
$cliente = [
    "nif"=>rand(10000,99999)."A",
    "nombre"=>"Pepito",
    "apellido1"=>'Pérez',
    "apellido2"=>'Gómez',
    "email"=>'pepito01@gmail.com'.rand(0,100),
    "foto"=>'fotos/foto'.rand(10000,99999).'.jpg'
];
$idcliente = $daoclientes->add($cliente);
if (!is_null($idcliente))
    echo "Cliente añadido. ID=".$idcliente."<br>";
else
    echo "Cliente no añadido";

$viaje = [
    "codigo"=>"Vl".rand(10000,99999),
    "descripcion"=>"Viaje a Madrid",
    "precio"=>300.0,
    "salida"=>'2023-12-01 10:30:23',
    "llegada"=>'2023-12-02 12:00:00',
    "foto"=>'fotos/foto'.rand(10000,99999).'.jpg'
];
$idviaje = $daoviajes->add($viaje);
if (!is_null($idviaje))
    echo "Viaje añadido. ID=".$idviaje."<br>";
else
    echo "Viaje no añadido";

$clienteviaje = [
    "cliente_id"=>2,
    "viaje_id"=>3,
    "pagado"=>300.0,
    "salida"=>'2023-12-01 10:30:23',
    "llegada"=>'2023-12-02 12:00:00'
];
$idclienteviaje = $daoclientesviajes->add($clienteviaje);
if (!is_null($idclienteviaje))
    echo "Cliente-viaje añadido. ID=".$idclienteviaje."<br>";
else
    echo "Cliente-viaje no añadido";

$result = $daoclientesviajes->listAll();
echo "<pre>";
//var_dump($result);
echo "</pre>";

$clientesviaje = $daoclientesviajes->getClientesByViajeId(3);
echo "<pre>";
var_dump($clientesviaje);
echo "</pre>";
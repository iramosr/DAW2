<?php
require_once "ClientesDao.php";

$dao = new ClientesDao;
$cliente = [
    "nif"=>rand(10000,99999)."A",
    "nombre"=>"Pepito",
    "apellido1"=>'Pérez',
    "apellido2"=>'Gómez',
    "email"=>'pepito01@gmail.com'.rand(0,100),
    "foto"=>'fotos/foto'.rand(10000,99999).'.jpg'
];
$id = $dao->add($cliente);
if (!is_null($id))
    echo "Cliente añadido. ID=".$id."<br>";
else
    echo "Cliente no añadido";

$result = $dao->last(5);
echo "<pre>";
var_dump($result);
echo "</pre>";
<?php
require_once "ClientesDao.php";

$dao = new ClientesDao;
$cliente = [
    "nif"=>"12345678A",
    "nombre"=>"Pepito",
    "apellido1"=>'Pérez',
    "apellido2"=>'Gómez',
    "email"=>'pepito01@gmail.com'
];
$id = $dao->add($cliente);
if (!is_null($id))
    echo "Cliente añadido. ID=".$id."<br>";
else
    echo "Cliente no añadido";

$result = $dao->listAll();
echo "<pre>";
var_dump($result);
echo "</pre>";
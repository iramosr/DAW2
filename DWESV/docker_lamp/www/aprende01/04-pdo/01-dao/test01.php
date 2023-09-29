<?php
require_once "EncuestasDao.php";

$dao = new EncuestasDao;
$encuesta = [
    "nombre"=>"Pepito01",
    "apellidos"=>'Pérez López01',
    "email"=>'pepito01@gmail.com'
];
$id = $dao->add($encuesta);
if (!is_null($id))
    echo "Encuesta añadida. ID=".$id."<br>";
else
    echo "Encuesta no añadida";

$result = $dao->listAll();
echo "<pre>";
var_dump($result);
echo "</pre>";
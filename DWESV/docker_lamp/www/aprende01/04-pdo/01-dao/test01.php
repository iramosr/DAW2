<?php
require_once "EncuestasDao.php";

$dao = new EncuestasDao;
$encuesta = [
    "nombre"=>"Pepito01",
    "apellidos"=>'Pérez López01',
    "email"=>'pepito02@gmail.com',
    "fechaNacimiento"=>'2001-01-01',
    "sexo"=>'H',
    "aficiones"=>'INF',
    "estudios"=>'grad',
    "observaciones"=>'Observaciones01',
    "foto"=>'/aprende01/imagenes/imagen01.jpg'
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
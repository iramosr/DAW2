<h1>SAVE</h1>
<?php

use dao\EncuestasDao;

require_once "../layouts/head.php";
require_once "../layouts/main-menu.php";
require_once "../../dao/EncuestasDao.php";

$encuestasDao = new EncuestasDao();


$imagen = $_FILES['imagen'];
$path = $_SERVER['DOCUMENT_ROOT'];
$localPathImagen = '/upload/' . $imagen['name'] . date("YmdHis");
$pathImagenes = $_SERVER['DOCUMENT_ROOT'] . $localPathImagen;
move_uploaded_file($imagen["tmp_name"], $pathImagenes);


$encuesta = [
    "nombre" => $_POST['nombre'] ?? null,
    "apellidos" => $_POST['apellidos'] ?? null,
    "email" => $_POST['email'] ?? null,
    "fecha_nacimiento" => $_POST['fechaNacimiento'] ?? null,
    "sexo" => $_POST['sexo'] ?? null,
    "aficiones" => implode(",", ($_POST['aficiones'] ?? [])),
    "estudios" => $_POST['estudios'] ?? null,
    "observaciones" => $_POST['observaciones'] ?? null,
    "imagen" => $localPathImagen ?? null,
    "created_at" => date('Y-m-d H:i:s'),
    "update_at" => date('Y-m-d H:i:s')
];



if($encuestasDao->add($encuesta)){
    echo "Encuesta guardada";
};

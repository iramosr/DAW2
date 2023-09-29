<?php

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$sexo = $_POST['sexo'] ?? null;
$aficiones = $_POST['aficiones'] ?? [];
$estudios = $_POST['estudios'];
$observaciones = $_POST['observaciones'];
$imagen = $_FILES['imagen'];

$path = $_SERVER['DOCUMENT_ROOT'];
$localPathImagen = '/aprende01/imagenes/'.$imagen['name'];
$pathImagenes = $_SERVER['DOCUMENT_ROOT'].$localPathImagen;
move_uploaded_file($imagen["tmp_name"], $pathImagenes);

require_once "ficha.view.php";
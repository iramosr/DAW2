<?php
require_once "helpers.php";
$errors=[];
//$nombre = $_POST['nombre'];
$nombre = receiveValidateString('nombre', "Debe indicar el nombre", $errors);
$apellidos = receiveValidateString('apellidos', "Debe indicar los apellidos", $errors);
$email = receiveValidateString('email', "Debe indicar el email", $errors);
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
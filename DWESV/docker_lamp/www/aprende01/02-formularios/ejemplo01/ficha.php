<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$sexo = $_POST['sexo'] ?? null;
$aficiones = $_POST['aficiones'] ?? [];
$estudios = $_POST['estudios'];
$observaciones = $_POST['observaciones'];
$imagen = $_FILES['imagen'];

echo "<p>Nombre: $nombre</p>";
echo "<p>Fecha nacimiento: $fechaNacimiento</p>";
echo "<p>Sexo: $sexo</p>";
echo "<p>Aficiones";
echo '<ul>';
foreach ($aficiones as $aficion){
    echo "<li>$aficion</li>";
}
echo '</ul>';
echo '</p>';

var_dump($imagen);
$path = $_SERVER['DOCUMENT_ROOT'];
echo "<br>DOCUMENT_ROOT: $path";
$localPathImagen = '/aprende01/imagenes/'.$imagen['name'];
$pathImagenes = $_SERVER['DOCUMENT_ROOT'].$localPathImagen;
echo "<br>Path imagenes: $pathImagenes";

move_uploaded_file($imagen["tmp_name"], $pathImagenes);
echo "<p><img src=\"$localPathImagen\"></p>";
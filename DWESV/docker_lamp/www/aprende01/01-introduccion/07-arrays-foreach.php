<?php

define('DIAS', ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo']);
var_dump(DIAS);

# Crear un array
$nombres = []; #Creamos un array vacio
$nombres = ["Pepito", "Juanita"];

echo "<hr>";

#Añadir
$nombres[] = "Anita";
$nombres[3] = "Luisito";
var_dump($nombres);

echo "<hr>";

$nombres[1] = "Manolito";
var_dump($nombres);

echo "<hr>";

foreach ($nombres as $nombre) {
    echo $nombre . "<br>";
}

foreach ($nombres as $key => $nombre) {
    echo $key . " - " . $nombre . "<br>";
}

echo "<hr>";

foreach ($nombres as $key => $nombre) {
    echo $key . " - " . $nombre . "<br>";
    $nombre .= "-NO MODIFICADO";
}
var_dump($nombres);

echo "<hr>";

foreach ($nombres as $key => &$nombre) {
    echo $key . " - " . $nombre . "<br>";
    $nombre .= "-MODIFICADO";
}
var_dump($nombres);

echo "<hr>";

for ($i = 0; $i < count($nombres); $i++) {
    echo $i . " - " . $nombres[$i] . "<br>";
}

echo "<hr>";

echo in_array('Pepito', $nombres) ? 'Encontrado' : 'No encontrado';

echo "<hr>";

#borra un elemento
unset($nombres[0]);
var_dump($nombres);

echo "<hr>";

#Convierte a cadena
$cadena = implode(",", $nombres);
echo $cadena;
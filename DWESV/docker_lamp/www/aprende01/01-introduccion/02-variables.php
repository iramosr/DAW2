<?php
# Variables
$nombre = 'Ismael';
$apellido1 = 'Ramos';
$apellido2 = 'Rodríguez';

echo "Nombre: ".$nombre." ".$apellido1." ".$apellido2."<br>";
echo "Nombre: $nombre $apellido1 $apellido2<br>";
echo 'Nombre: $nombre $apellido1 $apellido2<br>';

# Para saber si una variable existe
if (isset($nombre)){
    echo 'La variable nombre existe <br>';
} else {
    echo 'La variable nombre NO existe <br>';
}
if (isset($apellido3)){
    echo 'La variable apellido3 existe <br>';
} else {
    echo 'La variable apellido3 NO existe <br>';
}

echo $nombre ?? 'No existe $nombre';

#Tipos de datos
$entero = 5;
$double = 4.5;
$cadena1 = "Esto es un string";
$cadena2 = 'Esto es un string';
$booleano = true; #true=1,false=0
$array1 = array("Lunes", "Martes", "Miércoles");    # Versiones anteriores a 5.4
$array2 = ["Lunes", "Martes", "Miércoles"];         # Cualquier versión
$array3 = [];

echo " <br>";
echo gettype($entero).'<br>';
<?php
$usuarios=['nombre'=>'Pepito', 'apellido1'=>'Pérez', 'apellido2'=>'López'];
$usuarios['email'] = 'pepito@gmail.com';

var_dump($usuarios);

echo "<hr>";

echo $usuarios['nombre'];

echo "<hr>";

foreach ($usuarios as $key=>$usuario){
    echo $key." - ".$usuario."<br>";
}
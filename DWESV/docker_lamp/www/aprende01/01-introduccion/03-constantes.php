<?php
define ('NOMBRE_BD', 'daw2_aprende');
const VERSION = '3.2.4';

echo 'Nombre de la BD: '.NOMBRE_BD.'<br>';
echo "Versión: VERSION <br>";
echo 'Versión. '.VERSION.'<br>';

if(defined('NOMBRE_BD'))
    echo 'La constante NOMBRE_BD ha sido definida';
else
    echo 'La constante NOMBRE_BD NO ha sido definida';
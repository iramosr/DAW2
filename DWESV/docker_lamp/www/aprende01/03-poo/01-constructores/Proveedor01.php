<?php

class Proveedor01
{
    public $id;
    public $nif;
}

$proveedor = new Proveedor01();
$proveedor->id = 1;
$proveedor->nif = "123456";
echo "El nif es ".$proveedor->nif;
echo "<hr>";
var_dump($proveedor);
$proveedor = new Proveedor01;
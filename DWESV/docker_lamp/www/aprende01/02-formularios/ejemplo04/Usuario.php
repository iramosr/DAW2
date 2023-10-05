<?php

class Usuario
{
    public $nombre;
    public $apellidos;
    public $email;
    public $fechaNacimiento;
    public $sexo;
    public $aficiones;
    public $estudios;
    public $observaciones;
    public $imagen;

    public function __construct(){
        $this->aficiones = [];
    }
}
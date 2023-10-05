<?php
require_once "helpers.php";
require_once "Usuario.php";
require_once "FormularioController.php";

$usuario = new Usuario;
$errors=[];

$formularioController = new FormularioController;
$formularioController->add($usuario);
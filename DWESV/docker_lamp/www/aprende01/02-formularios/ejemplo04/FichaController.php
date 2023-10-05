<?php
require_once "helpers.php";
require_once "Usuario.php";
require_once "FormularioController.php";

class FichaController
{
    public function __construct(){
        $errors = [];
        $usuario = new Usuario;

        $usuario->nombre = receiveValidateString('nombre', "Debe indicar el nombre", $errors);
        $usuario->apellidos = receiveValidateString('apellidos', "Debe indicar los apellidos", $errors);
        $usuario->email = receiveValidateString('email', "Debe indicar el email", $errors);
        $usuario->fechaNacimiento = $_POST['fechaNacimiento'];
        $usuario->sexo = $_POST['sexo'] ?? null;
        $usuario->aficiones = $_POST['aficiones'] ?? [];
        $usuario->estudios = $_POST['estudios'];
        $usuario->observaciones = $_POST['observaciones'];

        $imagen = $_FILES['imagen'];
        $path = $_SERVER['DOCUMENT_ROOT'];
        $localPathImagen = '/aprende01/imagenes/' . $imagen['name'];
        $pathImagenes = $_SERVER['DOCUMENT_ROOT'] . $localPathImagen;
        move_uploaded_file($imagen["tmp_name"], $pathImagenes);
        $usuario->imagen = $localPathImagen;

        if (empty($errors)) {
            require "ficha.view.php";
        } else {
            $formularioController = new FormularioController();
            $formularioController->add($usuario, $errors);
        }
    }
}
<h1>Añadir</h1>
<?php

use dao\EncuestasDao;

require_once "../../dao/EncuestasDao.php";


    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $email = $_POST['email'] ?? null;
    $fechaNacimiento = $_POST['fecha_nacimiento'] ?? null;
    $sexo = $_POST['sexo'] ?? null;
    $aficiones = $_POST['aficiones'] ?? [];
    $estudios = $_POST['estudios'] ?? null;
    $observaciones = $_POST['observaciones'] ?? null;
    $imagen = $_FILES['imagen'];

    $encuesta = [
        "nombre" => $nombre,
        "apellidos" => $apellido,
        "email" => $email,
        "fecha_nacimiento" => $fechaNacimiento,
        "sexo" => $sexo,
        "aficiones" => implode(",", $aficiones),
        "estudios" => $estudios,
        "observaciones" => $observaciones,
        "foto" => $imagen['name'],
        "created_at" => date('Y-m-d H:i:s'),
        "update_at" => date('Y-m-d H:i:s')
    ];



    $path = $_SERVER['DOCUMENT_ROOT'];
    $localPathImagen = '/encuestas/upload'.$imagen['name'];
    $pathImagenes = $_SERVER['DOCUMENT_ROOT'].$localPathImagen;
    move_uploaded_file($imagen["tmp_name"], $pathImagenes);

    $dao = new EncuestasDao();
    $id = $dao->add($encuesta);





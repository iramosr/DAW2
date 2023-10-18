<h2>INDEX</h2>
<?php

use controllers\EncuestasController;

require_once "../../helpers/helpers.php";
require_once "Encuesta.php";
require_once "../../controllers/EncuestasController.php";

$encuesta = new Encuesta();
$errors=[];

$encuestasController = new EncuestasController();
$encuestasController->add($encuesta);
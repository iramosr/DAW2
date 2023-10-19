<?php

use controllers\EncuestasController;

require_once "../layouts/head.php";
require_once "../layouts/main-menu.php";
require_once "../../controllers/EncuestasController.php";

$encuestasController = new EncuestasController;
$encuestasController->add();

?>

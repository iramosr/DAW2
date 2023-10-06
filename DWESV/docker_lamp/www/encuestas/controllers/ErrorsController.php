<?php

namespace controllers;

class ErrorsController{

    public function notMethod(){
        echo "<h2>Función incorrecta</h2>";
    }

    public function notFound(){
        echo "<h2>Página no encontrada</h2>";
    }
}
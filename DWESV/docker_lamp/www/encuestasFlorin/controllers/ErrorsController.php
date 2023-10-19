<?php

namespace controllers;

class ErrorsController
{
    public function notFound()
    {
        echo "Error 404: Página no encontrada";
    }

    public function notMethod()
    {
        echo "Error: Método no encontrado";
    }

}
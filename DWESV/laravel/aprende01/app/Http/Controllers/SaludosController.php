<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludosController extends Controller
{
    public function hola2()
    {
        return view('hola-mundo');
    }

    public function saludo2()
    {
        return view('saludo')->with('nombre', 'Pepito Pérez López');
    }

    public function saludo3($nombre)
    {
        return view('saludo')->with('nombre', $nombre);
    }
}

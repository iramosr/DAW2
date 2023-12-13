<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;

class HomeController extends Controller
{
    public function index()
    {
        //obtiene todas las peliculas que tienen portada y ordena por titulo
        $peliculas = Pelicula::whereNotNull('portada')
            ->orderBy('titulo')->paginate(10);

        return view('welcome')
            ->with('peliculas', $peliculas);

    }
}

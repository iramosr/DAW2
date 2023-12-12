<?php

namespace App\Http;

use App\Http\Controllers\Controller;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::orderBy('titulo')->paginate(10);
        return view('welcome')
            ->with('peliculas', $peliculas);

    }
}

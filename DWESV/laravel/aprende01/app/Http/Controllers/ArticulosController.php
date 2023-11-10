<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
/*    public function index()
    {
        $articulos = Articulo::all();

//        var_dump($articulos);
//        dd($articulos);
//        dump($articulos);
        return view('articulos.index')->with("articulos", $articulos);
//        return view('articulos.index', ["articulos" => $articulos]);
//        return view('articulos.index', compact('articulos'));
    }
*/
    public function index()
    {
        $articulos = Articulo::paginate(10);
        return view('articulos.index')->with("articulos", $articulos);
    }
    public function create(){
        $articulos = Articulo::simplePaginate(10);
        return view('articulos.create')->with("articulos", $articulos);
    }

    public function store(Request $request)
    {
        $articulo = new Articulo();
        $articulo->nombre = $request->nombre;
        $articulo->precio = $request->precio;
        $articulo->stock = $request->stock;
        $articulo->save();

        return redirect()->route("articulos.index");
    }
}

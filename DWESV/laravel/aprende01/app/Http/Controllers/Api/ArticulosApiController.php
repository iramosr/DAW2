<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticulosApiController extends Controller
{
    public function index()
    {
        $articulos = Articulo::all();
        return $articulos;
    }

    public function guarda()
    {
        $articulo = new Articulo();
        $articulo->ref = "REF-" . rand(1000, 9999);
        $articulo->descripcion = 'Martillo';
        $articulo->precio = 10;
        $articulo->save();
        return $articulo;
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $articulo = $request->all();
            $articuloBD = new Articulo();
            $articuloBD->ref = $articulo['ref'] ?? null;
            $articuloBD->descripcion = $articulo['descripcion'] ?? null;
            $articuloBD->precio = $articulo['precio'] ?? null;
            $articuloBD->observaciones = $articulo['observaciones'] ?? null;
            $articuloBD->save();
            DB::commit();
            return $articuloBD;
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'No se pudo guardar el artículo.'], 400);
        }
    }
//    public function show(string $id){
//        $articulo = Articulo::find($id);
//        return $articulo;
//    }

//    public function show(Articulo $articulo)
//    {
//        return $articulo;
//    }

    public function show($id)
    {
        $articulo = Articulo::find($id);
        if ($articulo != null) {
            return $articulo;
        } else {
            return response()->json(['error' => 'No se encontró el artículo.'], 404);
        }
    }

    public function showByRef($ref)
    {
        $articulo = Articulo::where('ref', $ref)->first();
        return $articulo;
    }
}

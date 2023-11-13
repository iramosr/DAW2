<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $articulos = Articulo::orderBy('id')->paginate(10);
        return view('articulos.index')->with("articulos", $articulos);
    }

    public function create()
    {
        $articulos = Articulo::orderBy('id')->paginate(10);
        return view('articulos.create')->with("articulos", $articulos);
    }

    /*
        public function store(Request $request){
        DB::BeginTransaction();
        try {
            Articulo::create($request->all());
            DB::commit();
        }catch (Exception $e){
            Log::error("No se puede dar de alta. Referencia " . $request->input('ref') . " repetida");
        }
        return to_route('articulos.index');
    }
    */
    public function store(Request $request)
    {
        //Articulo::create($request->all());
        DB::BeginTransaction();
        try {
            $data = $request->all();
            $articulo = new Articulo();
            $articulo->ref = $data['ref']; #$request->input('ref');
            $articulo->precio = $data['precio'];
            $articulo->descripcion = $data['descripcion'];
            $articulo->observaciones = $data['observaciones'];
            $articulo->save();
            DB::commit();
        } catch (Exception $e) {
            Log::error("No se puede dar de alta. Referencia " . $data['ref'] . " repetida");
        }
        return to_route('articulos.index');
    }
}

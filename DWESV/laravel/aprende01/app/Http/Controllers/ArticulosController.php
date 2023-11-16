<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Proveedor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $proveedores = Proveedor::orderBy('razon_social')->get();
        return view('articulos.create')
            ->with("articulos", $articulos)
            ->with("proveedores", $proveedores);
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
    public function store(Request $request){
        $validated = $request->validate([
            'ref' => 'required|unique:articulos|min:3|max:15',
            'descripcion' => 'required',
            'precio' => 'numeric',
            'observaciones' => '',
            'proveedor_id' => 'required | integer'
        ],[
            'ref.required' => 'El campo referencia es obligatorio',
            'ref.unique' => 'El campo referencia no debe estar repetido',
            'ref.min' => 'La referencia debe tener al menos 3 caracteres',
            'ref.max' => 'La referencia debe tener como máximo 15 caracteres',
            'descripcion.required' => 'El campo descripción es obligatorio',
            'precio.numeric' => 'El campo precio debe ser un numero',
            'proveedor_id.required' => 'Es necesario especificar un proveedor',
        ]);


        //Articulo::create($request->all());
        DB::BeginTransaction();
        try {
            $data = $request->all();
            $articulo = new Articulo();
            $articulo->ref = $data['ref']; #$request->input('ref');
            $articulo->precio = $data['precio'];
            $articulo->descripcion = $data['descripcion'];
            $articulo->observaciones = $data['observaciones'];
            $articulo->proveedor_id = $data['proveedor_id'];
            $articulo->save();
            DB::commit();
        } catch (Exception $e) {
            Log::error("No se puede dar de alta. Referencia " . $data['ref'] . " repetida");
        }
        return to_route('articulos.index');
    }
}

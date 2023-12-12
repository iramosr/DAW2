<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::orderBy('nombre')->paginate(10);
        return view('categorias.index')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create')->with('categoria', new Categoria());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:20',
        ]);

        try {
            Categoria::create($request->all());
            return redirect()->route('categorias.index')->with('success', 'La categoría ha sido guardada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['error' => 'Error al guardar la categoría']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        $categorias = Categoria::orderBy('nombre')->paginate(10);
        return view('categorias.show')->with('categorias', $categorias)->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        $categorias = Categoria::orderBy('updated_at', 'desc')->paginate(10);
        return view('categorias.edit')->with('categorias', $categorias)->with('categoria', $categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:20',
        ]);

        try {
            $categoria->update($request->all());
            return redirect()->route('categorias.index')->with('success', 'La categoría ha sido modificada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['error' => 'Error al modificar la categoría']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        try {
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', 'La categoría ha sido eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->route('categorias.index')->with('error', 'Error al eliminar la categoría');
        }
    }
}

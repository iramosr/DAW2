<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directores = Director::orderBy('nombre')->paginate(10);
        return view('directores.index')->with('directores', $directores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directores = Director::orderBy('nombre')->paginate(10);
        return view('directores.create')
            ->with('directores', $directores)
            ->with('director', new Director());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:20',
            'apellidos' => 'required|min:3|max:45',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        try {
            Director::create($request->all());
            return redirect()->route('directores.index')->with('success', 'El director ha sido guardado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['error' => 'Error al guardar el director']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        $directores = Director::orderBy('nombre')->paginate(10);
        return view('directores.show')
            ->with('directores', $directores)
            ->with('director', $director);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        $directores = Director::orderBy('updated_at', 'desc')->paginate(10);
        return view('directores.edit')
            ->with('directores', $directores)
            ->with('director', $director);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:20',
            'apellidos' => 'required|min:3|max:45',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        try {
            $director->update($request->all());
            return redirect()->route('directores.index')->with('success', 'El director ha sido modificado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['error' => 'Error al modificar el director']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        try {
            $director->delete();
            return redirect()->route('directores.index')->with('success', 'El director ha sido eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('directores.index')->with('error', 'Error al eliminar el director');
        }
    }

    //----------------------------------------
    public function filtro(Request $request)
    {
        $requestData = $request->all();
        $directores = Director::orderBy('nombre');
        if (isset($requestData['filtroNombre'])) {
            $directores = $directores
                ->where('nombre', 'like', '%' . $requestData['filtroNombre'] . '%');
        }
        if (isset($requestData['filtroApellidos'])) {
            $directores = $directores
                ->where('apellidos', 'like', '%' . $requestData['filtroApellidos'] . '%');
        }
        $directores = $directores->paginate(10);
        return view('directores.index')
            ->with('directores', $directores);
    }
}

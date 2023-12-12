<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Exception;
use Illuminate\Http\Request;

class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socios = Socio::orderBy('nombre')->paginate(10);
        return view('socios.index')->with('socios', $socios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('socios.create')->with('socio', new Socio());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:20',
            'apellido1' => 'required|min:3|max:20',
            'apellido2' => 'nullable|max:20',
            'email' => 'required|email|unique:socios|max:50',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        try {
            Socio::create($request->all());
            return redirect()->route('socios.index')->with('alert-success', 'El socio ha sido guardado');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with(['alert-error' => 'Error al guardar el socio']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Socio $socio)
    {
        $socios = Socio::orderBy('nombre')->paginate(10);
        return view('socios.show')->with('socios', $socios)->with('socio', $socio);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Socio $socio)
    {
        $socios = Socio::orderBy('updated_at', 'desc')->paginate(10);
        return view('socios.edit')->with('socios', $socios)->with('socio', $socio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Socio $socio)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:20',
            'apellido1' => 'required|min:3|max:20',
            'apellido2' => 'nullable|max:20',
            'email' => 'required|email|unique:socios|max:50',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        try {
            $socio->update($request->all());
            return redirect()->route('socios.index')->with('success', 'El socio ha sido modificado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['error' => 'Error al modificar el socio']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Socio $socio)
    {
        try {
            $socio->delete();
            return redirect()->route('socios.index')->with('success', 'El socio ha sido eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('socios.index')->with('error', 'Error al eliminar el socio');
        }
    }
}

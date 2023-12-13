<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use Illuminate\Http\Request;

class AlquileresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alquileres = Alquiler::orderBy('fecha_alquiler')->paginate(10);
        return view('alquileres.index')->with('alquileres', $alquileres);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alquileres = Alquiler::latest()->paginate(10);
        return view('alquileres.create')
            ->with('alquileres', $alquileres)
            ->with('alquiler', new Alquiler());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_alquiler' => 'required|date',
            'fecha_devolucion' => 'nullable|date',
            'socio_id' => 'required|exists:socios,id',
            'pelicula_id' => 'required|exists:peliculas,id',
        ]);

        try {
            Alquiler::create($request->all());
            return redirect()->route('alquileres.index')->with('success', 'El alquiler ha sido guardado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['error' => 'Error al guardar el alquiler']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Alquiler $alquiler)
    {
        $alquileres = Alquiler::orderBy('fecha_alquiler')->paginate(10);
        return view('alquileres.show')->with('alquileres', $alquileres)->with('alquiler', $alquiler);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alquiler $alquiler)
    {
        $alquileres = Alquiler::orderBy('updated_at', 'desc')->paginate(10);
        return view('alquileres.edit')->with('alquileres', $alquileres)->with('alquiler', $alquiler);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alquiler $alquiler)
    {
        $request->validate([
            'fecha_alquiler' => 'required|date',
            'fecha_devolucion' => 'nullable|date',
            'socio_id' => 'required|exists:socios,id',
            'pelicula_id' => 'required|exists:peliculas,id',
        ]);

        try {
            $alquiler->update($request->all());
            return redirect()->route('alquileres.index')->with('success', 'El alquiler ha sido modificado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['error' => 'Error al modificar el alquiler']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alquiler $alquiler)
    {
        try {
            $alquiler->delete();
            return redirect()->route('alquileres.index')->with('success', 'El alquiler ha sido eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('alquileres.index')->with('error', 'Error al eliminar el alquiler');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;

class ClientesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nif')->paginate(10);
        return view('admin.clientes.index')->with('clientes', $clientes);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::latest()->paginate(10);
        return view('admin.clientes.create')
            ->with('clientes', $clientes)
            ->with('cliente', new Cliente());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request->validate();

        $requestData = $request->all();
        if ($request->hasFile('foto')) {
            //
        }
        try {
            $cliente = Cliente::create($requestData);
            return to_route('admin.clientes.create')
                ->with('alert-success', 'El cliente ha sido guardado');
        } catch (Exception $e){
            return to_route('admin.clientes.create')
                ->with('alert-error', 'El cliente no ha sido guardado');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //----------------------------------------
    public function filtro(Request $request)
    {
        $requestData = $request->all();
        $clientes = Cliente::orderBy('nif');
        if (isset($requestData['filtroNombre'])) {
            $clientes = $clientes
                ->where('nombre', 'like', '%' . $requestData['filtroNombre'] . '%');
        }
        if (isset($requestData['filtroApellido1'])) {
            $clientes = $clientes
                ->where('apellido1', 'like', '%' . $requestData['filtroApellido1'] . '%');
        }
        if (isset($requestData['filtroApellido2'])) {
            $clientes = $clientes
                ->where('apellido2', 'like', '%' . $requestData['filtroApellido2'] . '%');
        }
        $clientes = $clientes->paginate(10);
        return view('admin.clientes.index')
            ->with('clientes', $clientes);
    }
}

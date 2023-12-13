<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Director;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::orderBy('titulo')->paginate(10);
        return view('peliculas.index')->with('peliculas', $peliculas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peliculas = Pelicula::latest()->paginate(10);
        $directores = Director::all();
        $categorias = Categoria::all();
        return view('peliculas.create')
            ->with('directores', $directores)
            ->with('categorias', $categorias)
            ->with('peliculas', $peliculas)
            ->with('pelicula', new Pelicula());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'titulo' => 'required|max:200',
            'fecha_estreno' => 'required|date',
            'director_id' => 'required|exists:directores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'portada' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sinopsis' => 'nullable',
        ]);

        $requestData = $request->all();


        if ($request->hasFile('portada')) {
            $file = $request->file('portada');
            $destino = env('DIR_UPLOAD_PELICULAS');
            $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            $fileName = $uuid . '_' . $requestData['titulo'] . '.png';
            $uploaded = $request->file('portada')->move($destino, $fileName);
            $requestData['portada'] = $destino . $fileName;
        }


        Pelicula::create($requestData);

        return redirect()->route('peliculas.index')->with('success', 'La película ha sido creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        $peliculas = Pelicula::orderBy('titulo')->paginate(10);
        $directores = Director::all();
        $categorias = Categoria::all();
        return view('peliculas.show')
            ->with('directores', $directores)
            ->with('categorias', $categorias)
            ->with('peliculas', $peliculas)
            ->with('pelicula', $pelicula);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        $peliculas = Pelicula::orderBy('updated_at', 'desc')->paginate(10);
        $directores = Director::all();
        $categorias = Categoria::all();
        return view('peliculas.edit')
            ->with('directores', $directores)
            ->with('categorias', $categorias)
            ->with('peliculas', $peliculas)
            ->with('pelicula', $pelicula);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate(
            [
                'titulo' => 'required|max:200',
                'portada' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'fecha_estreno' => 'required|date',
                'sinopsis' => 'nullable',
                'director_id' => 'required|exists:directores,id',
                'categoria_id' => 'required|exists:categorias,id',
            ]);

        $requestData = $request->all();

        if ($request->hasFile('portada')) {
            $file = $request->file('portada');
            $destino = env('DIR_UPLOAD_PELICULAS');
            $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            $fileName = $uuid . '_' . $requestData['titulo'] . '.png';
            $uploaded = $request->file('portada')->move($destino, $fileName);
            $requestData['portada'] = $destino . $fileName;
        }

        try {
            $pelicula->update($requestData);
            return redirect()->route('peliculas.index')->with('success', 'La película ha sido modificada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['error' => 'Error al modificar la película']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        try {
            $pelicula->delete();
            return redirect()->route('peliculas.index')->with('success', 'La película ha sido eliminada correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Error al eliminar la película']);
        }
    }

    /**
     * Filter the specified resource.
     */
    public function filtro(Request $request)
    {
        $requestData = $request->all();
        $peliculas = Pelicula::orderBy('titulo');

        if (isset($requestData['filtroTitulo'])) {
            $peliculas = $peliculas->where('titulo', 'like', '%' . $requestData['filtroTitulo'] . '%');
        }

        // Otros filtros según sea necesario

        $peliculas = $peliculas->paginate(10);
        return view('peliculas.index')->with('peliculas', $peliculas);
    }
}

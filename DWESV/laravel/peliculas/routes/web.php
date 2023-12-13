<?php

use App\Http\Controllers\AlquileresController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DirectoresController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SociosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('socios', SociosController::class)->names('socios');
    Route::post('socios/filtro',[SociosController::class,"filtro"])->name('socios.filtro');
    Route::resource('directores', DirectoresController::class)->names('directores')->parameters(['directores' => 'director']);
    Route::post('directores/filtro',[DirectoresController::class,"filtro"])->name('directores.filtro');
    Route::resource('categorias', CategoriasController::class)->names('categorias');
    Route::post('categorias/filtro',[CategoriasController::class,"filtro"])->name('categorias.filtro');
    Route::resource('peliculas', PeliculasController::class)->names('peliculas');
    Route::post('peliculas/filtro',[PeliculasController::class,"filtro"])->name('peliculas.filtro');
    Route::resource('alquileres', AlquileresController::class)->names('alquileres')->parameters(['alquileres' => 'alquiler']);
    Route::post('alquileres/filtro',[AlquileresController::class,"filtro"])->name('alquileres.filtro');
});


require __DIR__.'/auth.php';

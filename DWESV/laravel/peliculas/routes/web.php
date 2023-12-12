<?php

use App\Http\Controllers\AlquileresController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DirectoresController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SociosController;
use App\Http\HomeController;
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
});

Route::get('socios', [SociosController::class,"index"])->name('socios');
Route::get('directores', [DirectoresController::class,"index"])->name('directores');
Route::get('categorias', [CategoriasController::class,"index"])->name('categorias');
Route::get('peliculas', [PeliculasController::class,"index"])->name('peliculas');
Route::get('alquileres', [AlquileresController::class,"index"])->name('alquileres');

require __DIR__.'/auth.php';

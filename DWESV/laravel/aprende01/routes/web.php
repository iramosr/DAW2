<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\SaludosController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola-mundo', function () {
    return view('hola-mundo');
});

Route::get('/saludo', function () {
    return view('saludo')->with('nombre', 'Pepito Pérez López');
});

Route::get('/hola-mundo2', [SaludosController::class,'hola2']);
Route::get('/saludo2', [SaludosController::class,'saludo2']);
Route::get('/saludo3/{nombre}', [SaludosController::class,'saludo3']);

Route::get('/articulos', [ArticulosController::class,'index'])->name("articulos.index");
Route::get('/articulos/create', [ArticulosController::class,'create'])->name("articulos.create");
Route::post('/articulos/store', [ArticulosController::class,'store'])->name("articulos.store");

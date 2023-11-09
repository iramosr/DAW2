<?php

use App\Http\Controllers\Api\ArticulosApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articulos', [ArticulosApiController::class, 'index']);
Route::get('/articulo/guarda', [ArticulosApiController::class, 'guarda']);
Route::post('/articulo/store', [ArticulosApiController::class, 'store']);
Route::get('/articulo/{id}', [ArticulosApiController::class, 'show']);
Route::get('/articulo/ref/{ref}', [ArticulosApiController::class, 'showByRef']);

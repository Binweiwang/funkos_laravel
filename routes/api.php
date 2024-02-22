<?php

use App\Http\Controllers\CategoriasApiController;
use App\Http\Controllers\FunkosApiController;
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
// api funkos
Route::get('funkos', [FunkosApiController::class, 'index']);
Route::post('funkos', [FunkosApiController::class, 'store']);
Route::get('funkos/{id}', [FunkosApiController::class, 'show']);
Route::put('funkos/{id}', [FunkosApiController::class, 'update']);
Route::delete('funkos/{id}', [FunkosApiController::class, 'destroy']);
// api categorias
Route::get('categorias', [CategoriasApiController::class, 'index']);
Route::post('categorias', [CategoriasApiController::class, 'store']);
Route::get('categorias/{id}', [CategoriasApiController::class, 'show']);
Route::put('categorias/{id}', [CategoriasApiController::class, 'update']);
Route::delete('categorias/{id}', [CategoriasApiController::class, 'destroy']);

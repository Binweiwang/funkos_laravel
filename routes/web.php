<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FunkoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// No Auth Route
Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
// Auth Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return Inertia::render('Home');
    })->name('home');
    // Categorias Routes
    Route::resource('categorias', CategoriaController::class);
    // Funkos Routes
    Route::resource('funkos', FunkoController::class);
    // Roles Routes
    Route::resource('roles', RoleController::class);

    // Update Imagen
    Route::get('/funkos/{id}/edit-imagen', [FunkoController::class, 'editImagen'])->name('funkos.editImagen');
    Route::post('/funkos/{id}/update-imagen', [FunkoController::class, 'updateImagen'])->name('funkos.updateImagen');
});

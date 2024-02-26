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
//    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index')->middleware('auth');
//    Route::get('/categorias/{id}', [CategoriaController::class, 'show'])->name('categorias.show')->middleware('auth');
//    Route::post('/categorias/store', [CategoriaController::class, 'store'])->name('categorias.store')->middleware('role:admin');
//    Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit')->middleware('role:admin');
//    Route::put('/categorias/{id}/update', [CategoriaController::class, 'update'])->name('categorias.update')->middleware('role:admin');
//    Route::delete('/categorias/{id}/destroy', [CategoriaController::class, 'destroy'])->name('categorias.destroy')->middleware('role:admin');
    // Funkos Routes
    Route::resource('funkos', FunkoController::class);
//    Route::post('/funkos/store', [FunkoController::class, 'store'])->name('funkos.store')->middleware('role:admin');
//    Route::get('/funkos/{id}/edit', [FunkoController::class, 'edit'])->name('funkos.edit')->middleware('role:admin');
//    Route::put('/funkos/{id}/update', [FunkoController::class, 'update'])->name('funkos.update')->middleware('role:admin');
//    Route::delete('/funkos/{id}/destroy', [FunkoController::class, 'destroy'])->name('funkos.destroy')->middleware('role:admin');
    // Roles Routes
    Route::resource('roles', RoleController::class);
//    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store')->middleware('role:admin');
//    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit')->middleware('role:admin');
//    Route::put('/roles/{id}/update', [RoleController::class, 'update'])->name('roles.update')->middleware('role:admin');
//    Route::delete('/roles/{id}/destroy', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('role:admin');

    // Update Imagen
    Route::get('/funkos/{id}/edit-imagen', [FunkoController::class, 'editImagen'])->name('funkos.editImagen');
    Route::post('/funkos/{id}/update-imagen', [FunkoController::class, 'updateImagen'])->name('funkos.updateImagen')->middleware('role:admin');
});

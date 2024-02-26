<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Constante para definir el número de la paginación
    const NUM_PAGINATION = 6;

    /**
     * Display a listing of the resource.d
     */
    public function index()
    {
        //
        $categorias = Categoria::orderBy('created_at','desc')->paginate(self::NUM_PAGINATION);
        return inertia('Categorias/Index', ['categorias' => $categorias]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return inertia('Categorias/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        //
        Categoria::create($request->validated());
        return redirect()->route('categorias.index');

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
    public function edit(Categoria $categoria)
    {
        //
        return inertia('Categorias/Edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        //
        $categoria->update($request->validated());
        return redirect()->route('categorias.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}

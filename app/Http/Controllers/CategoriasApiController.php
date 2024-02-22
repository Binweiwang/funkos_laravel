<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all categories
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //guardar una nueva categoria
        $categoria = Categoria::create($request->all());
        return response()->json($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //mostrar una categoria especifica
        $categoria = Categoria::find($id);
        return response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //actualizar una categoria especifica
        $categoria = Categoria::find($id);
        $categoria->update($request->all());
        return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //borrar una categoria especifica
        $categoria = Categoria::find($id);
        $categoria->delete();
        return response()->json(null);
    }
}

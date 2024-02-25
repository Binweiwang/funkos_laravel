<?php

namespace App\Http\Controllers;

use App\Http\Requests\FunkoRequest;
use App\Models\Categoria;
use App\Models\Funko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FunkoController extends Controller
{
    // Constante para el número de la página
    const NUM_PAGINATION = 5;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $funkos = Funko::orderBy('created_at','desc')->paginate(self::NUM_PAGINATION);
        return inertia('Funkos/Index', ['funkos' => $funkos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return inertia('Funkos/Create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FunkoRequest $request)
    {
        //
        Funko::create($request->validated());
        return redirect()->route('funkos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return inertia('Funkos/Detail', ['funko' => Funko::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $funko = Funko::find($id);
        $categorias = Categoria::all();
        return inertia('Funkos/Edit', ['funko' => $funko, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FunkoRequest $request, Funko $funko)
    {
        //
        $funko->update($request->validated());
        return redirect()->route('funkos.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Funko $funko)
    {
        //
        if($funko->imagen != Funko::$IMAGE_DEFAULT && Storage::exists($funko->imagen)){
            Storage::delete($funko->imagen);
        }
        $funko->delete();
        return redirect()->route('funkos.index');
    }
    public function editImagen(string $id)
    {
        $funko = Funko::find($id);
        return inertia('Funkos/EditImagen', ['funko' => $funko]);
    }
    public function updateImagen(Request $request,$id)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $funko = Funko::find($id);
        if ($funko->imagen != Funko::$IMAGE_DEFAULT && Storage::exists($funko->imagen)) {
            Storage::delete($funko->imagen);
        }
        $imagen = $request->file('imagen');
        $extension = $imagen->getClientOriginalExtension();
        $nombre = $funko->uuid . '.' . $extension;
        $funko->imagen = $imagen->storeAs('funkos', $nombre,'public');
        $funko->save();
        return redirect()->route('funkos.index');
    }
}

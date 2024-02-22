<?php

namespace App\Http\Controllers;

use App\Models\Funko;
use Illuminate\Http\Request;

class FunkosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all funkos
        $funkos = Funko::all();
        return response()->json($funkos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //post a new funko
        $funko = Funko::create($request->all());
        return response()->json($funko);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get a specific funko
        $funko = Funko::find($id);
        return response()->json($funko);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update a specific funko
        $funko = Funko::find($id);
        $funko->update($request->all());
        return response()->json($funko);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete a specific funko
        $funko = Funko::find($id);
        $funko->delete();
        return response()->json(null);
    }
}

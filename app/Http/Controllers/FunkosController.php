<?php

namespace App\Http\Controllers;

use App\Models\Funko;
use Illuminate\Http\Request;

class FunkosController extends Controller
{
    //
    public function index()
    {
        $funkos = Funko::all();
        return view('funkos.index');
    }
}

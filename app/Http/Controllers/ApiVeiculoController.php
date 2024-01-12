<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiVeiculoController extends Controller
{
    public function show($car)
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas'));
    }
}

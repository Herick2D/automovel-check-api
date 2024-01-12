<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoa = Pessoa::all();
        return response()->json($pessoa);
    }

    public function show($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return response()->json($pessoa);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'idade' => 'required|integer',
            'sexo' => 'required',
        ]);

        $pessoa = Pessoa::create($request->all());
        return response()->json($person, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'idade' => 'required|integer',
        ]);

        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update($request->all());

        return response()->json($pessoa, 200);
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();

        return response()->json(null, 204);
    }
}

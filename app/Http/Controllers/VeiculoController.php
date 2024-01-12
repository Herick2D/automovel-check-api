<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::all();
        return response()->json($veiculos);
    }

    public function show($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        return response()->json($veiculo);
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required|integer',
            'idPessoa' => 'required|exists:pessoas,idPessoa',
        ]);

        $veiculo = Veiculo::create($request->all());
        return response()->json($veiculo, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required|integer',
            'idPessoa' => 'required|exists:pessoas,idPessoa',
        ]);

        $veiculo = Veiculo::findOrFail($id);
        $veiculo->update($request->all());

        return response()->json($veiculo, 200);
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return response()->json(null, 204);
    }

    public function showPessoa($idPessoa)
    {
        $veiculos = Veiculo::where('idPessoa', $idPessoa)->get();
        return response()->json($veiculos);
    }
}

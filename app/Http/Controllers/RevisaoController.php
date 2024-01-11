<?php

namespace App\Http\Controllers;

use App\Models\Revisao;
use Illuminate\Http\Request;

class RevisaoController extends Controller
{
    public function index()
    {
        $revisoes = Revisao::with('veiculo', 'pessoa')->get();
        return response()->json($revisoes);
    }

    public function show($id)
    {
        $revisao = Revisao::with('veiculo', 'pessoa')->findOrFail($id);
        return response()->json($revisao);
    }

    public function store(Request $request)
    {
        $request->validate([
            'custo' => 'required',
            'descricao' => 'required',
            'data_agendamento' => 'required',
            'idVeiculo' => 'required|exists:veiculos,idVeiculo',
            'idPessoa' => 'required|exists:pessoas,idPessoa',
        ]);

        $revisao = Revisao::create($request->all());
        return response()->json($revisao, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'custo' => 'required',
            'descricao' => 'required',
            'data_agendamento' => 'required',
            'idVeiculo' => 'required|exists:veiculos,idVeiculo',
            'idPessoa' => 'required|exists:pessoas,idPessoa',
        ]);

        $revisao = Revisao::findOrFail($id);
        $revisao->update($request->all());

        return response()->json($revisao, 200);
    }

    public function destroy($id)
    {
        $revisao = Revisao::findOrFail($id);
        $revisao->delete();

        return response()->json(null, 204);
    }
}

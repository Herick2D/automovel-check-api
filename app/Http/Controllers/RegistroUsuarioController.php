<?php

namespace App\Http\Controllers;

use App\Models\RegistroUsuario;
use Illuminate\Http\Request;

class RegistroUsuarioController extends Controller
{
    public function index()
    {
        $usuarios = RegistroUsuario::all();
        return response()->json($usuarios);
    }

    public function show($id)
    {
        $usuario = RegistroUsuario::findOrFail($id);
        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:registro_usuario,email',
            'senha' => 'required|min:6',
        ]);

        $usuario = RegistroUsuario::create($request->all());
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:registro_usuario,email,' . $id,
            'senha' => 'required|min:6',
        ]);

        $usuario = RegistroUsuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }

    public function destroy($id)
    {
        $usuario = RegistroUsuario::findOrFail($id);
        $usuario->delete();

        return response()->json(null, 204);
    }
}

<?php

use App\Http\Controllers\PessoaController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\RevisaoController;
use App\Http\Controllers\RegistroUsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/pessoa', [PessoaController::class, 'index']);
Route::get('/pessoa/{id}', [PessoaController::class, 'show']);
Route::post('/pessoa', [PessoaController::class, 'store']);
Route::put('/pessoa/{id}', [PessoaController::class, 'update']);
Route::delete('/pessoa/{id}', [PessoaController::class, 'destroy']);

Route::get('/veiculo', [VeiculoController::class, 'index']);
Route::get('/veiculo/{id}', [VeiculoController::class, 'show']);
Route::get('/veiculo/pessoa/{idPessoa}', [VeiculoController::class, 'showPessoa']);
Route::post('/veiculo', [VeiculoController::class, 'store']);
Route::put('/veiculo/{id}', [VeiculoController::class, 'update']);
Route::delete('/veiculo/{id}', [VeiculoController::class, 'destroy']);

Route::get('/revisao', [RevisaoController::class, 'index']);
Route::get('/revisao/{id}', [RevisaoController::class, 'show']);
Route::post('/revisao', [RevisaoController::class, 'store']);
Route::put('/revisao/{id}', [RevisaoController::class, 'update']);
Route::delete('/revisao/{id}', [RevisaoController::class, 'destroy']);

Route::get('/registro-usuario', [RegistroUsuarioController::class, 'index']);
Route::get('/registro-usuario/{id}', [RegistroUsuarioController::class, 'show']);
Route::post('/registro-usuario', [RegistroUsuarioController::class, 'store']);
Route::put('/registro-usuario/{id}', [RegistroUsuarioController::class, 'update']);
Route::delete('/registro-usuario/{id}', [RegistroUsuarioController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

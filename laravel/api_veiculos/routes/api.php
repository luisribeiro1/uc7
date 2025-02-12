<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# http://localhost:8000/api/categorias
# Criar a rota genérica para categoria
Route::apiResource('categorias', CategoriaController::class);

# http://localhost:8000/api/veiculos
Route::apiResource('veiculos',  VeiculoController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

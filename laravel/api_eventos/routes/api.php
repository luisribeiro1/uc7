<?php

use App\http\Controllers\ContatosController;
use App\Http\Controllers\ConvitesController;
use App\Http\Controllers\EventosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('contatos', ContatosController::class);
Route::apiResource('eventos', EventosController::class);
Route::apiResource('convites', ConvitesController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

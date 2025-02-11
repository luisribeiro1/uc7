<?php

use illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::apiResource("/categorias", [CategoriaController::class]);


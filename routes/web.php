<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AspirasisController;
use App\Http\Controllers\InputAspirasisController;
use App\Http\Controllers\KategorisController;
use App\Http\Controllers\SiswasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('admins', AdminsController::class)->parameters([
    'admins' => 'admins',
]);

Route::apiResource('siswas', SiswasController::class)->parameters([
    'siswas' => 'siswas',
]);

Route::apiResource('kategoris', KategorisController::class)->parameters([
    'kategoris' => 'kategoris',
]);

Route::apiResource('input-aspirasis', InputAspirasisController::class)->parameters([
    'input-aspirasis' => 'input_aspirasis',
]);

Route::apiResource('aspirasis', AspirasisController::class)->parameters([
    'aspirasis' => 'aspirasis',
]);

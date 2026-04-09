<?php

use App\Http\Controllers\AdminsController;
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

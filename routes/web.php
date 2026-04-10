<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AspirasisController;
use App\Http\Controllers\InputAspirasisController;
use App\Http\Controllers\KategorisController;
use App\Http\Controllers\SiswasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('siswa.index');
})->name('siswa.index');

Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/success', function () {
        return view('siswa.success');
    })->name('success');

    Route::get('/cek-status', function () {
        return view('siswa.cek-status');
    })->name('cek-status');

    Route::get('/history', function () {
        return view('siswa.history');
    })->name('history');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', function () {
            return view('auth.login');
        })->name('login.form');

        Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/me', [AdminAuthController::class, 'me'])->name('me');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/aspirasi', function () {
            return view('admin.aspirasi.index');
        })->name('aspirasi.index.page');

        Route::get('/aspirasi/{id}', function (int $id) {
            return view('admin.aspirasi.show', ['id' => $id]);
        })->name('aspirasi.show.page');

        Route::get('/aspirasi/{id}/edit', function (int $id) {
            return view('admin.aspirasi.edit', ['id' => $id]);
        })->name('aspirasi.edit.page');

        Route::get('/kategori', function () {
            return view('admin.kategori.index');
        })->name('kategori.index.page');

        Route::get('/kategori/create', function () {
            return view('admin.kategori.create');
        })->name('kategori.create.page');

        Route::get('/kategori/{id}/edit', function (int $id) {
            return view('admin.kategori.edit', ['id' => $id]);
        })->name('kategori.edit.page');

        Route::get('/laporan', function () {
            return view('admin.laporan.index');
        })->name('laporan.index');
    });
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

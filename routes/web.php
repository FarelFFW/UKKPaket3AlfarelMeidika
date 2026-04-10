<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AspirasisController;
use App\Http\Controllers\InputAspirasisController;
use App\Http\Controllers\KategorisController;
use App\Http\Controllers\SiswasController;
use App\Models\aspirasis;
use App\Models\kategoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $aspirasis = aspirasis::query()
        ->with(['inputAspirasi'])
        ->latest('id')
        ->get();

    $completedAspirasis = $aspirasis->where('status', 'selesai');
    $processingAspirasis = $aspirasis->where('status', 'proses');
    $totalAspirasi = $aspirasis->count();
    $completionRate = $totalAspirasi > 0 ? round(($completedAspirasis->count() / $totalAspirasi) * 100, 1) : 0;
    $averageResponseHours = $completedAspirasis
        ->filter(function ($aspirasi) {
            return $aspirasi->inputAspirasi?->created_at && $aspirasi->updated_at;
        })
        ->map(function ($aspirasi) {
            return $aspirasi->inputAspirasi->created_at->diffInMinutes($aspirasi->updated_at) / 60;
        })
        ->avg();

    return view('siswa.index', [
        'totalSelesai' => $completedAspirasis->count(),
        'totalProses' => $processingAspirasis->count(),
        'completionRate' => $completionRate,
        'averageResponseHours' => $averageResponseHours,
    ]);
})->name('siswa.index');

Route::get('/login', function () {
    return redirect()->route('admin.login.form');
})->name('login');

Route::prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/success', function () {
        return view('siswa.success');
    })->name('success');

    Route::get('/cek-status', function (Request $request) {
        $search = $request->string('search')->trim()->toString();
        $status = $request->string('status')->trim()->toString();

        $aspirasis = aspirasis::query()
            ->with(['inputAspirasi.siswa', 'inputAspirasi.kategori'])
            ->when(in_array($status, ['menunggu', 'proses', 'selesai'], true), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($nestedQuery) use ($search) {
                    $nestedQuery->whereHas('inputAspirasi.siswa', function ($siswaQuery) use ($search) {
                        $siswaQuery->where('nis', 'like', "%{$search}%");
                    })->orWhere('lokasi', 'like', "%{$search}%");
                });
            })
            ->latest('id')
            ->get();

        return view('siswa.cek-status', [
            'aspirasis' => $aspirasis,
            'search' => $search,
            'status' => $status,
        ]);
    })->name('cek-status');

    Route::get('/cek-status/{aspirasi}', function (aspirasis $aspirasi) {
        $aspirasi->load(['inputAspirasi.siswa', 'inputAspirasi.kategori']);

        return view('siswa.feedback', [
            'aspirasi' => $aspirasi,
        ]);
    })->name('feedback.show');

    Route::get('/history', function () {
        return view('siswa.history', [
            'kategoris' => kategoris::query()->orderBy('ket_kategori')->get(),
        ]);
    })->name('history');

    Route::post('/aspirasi', [InputAspirasisController::class, 'submitFromSiswa'])->name('aspirasi.store');
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
            $aspirasis = aspirasis::query()
                ->with(['inputAspirasi.siswa', 'inputAspirasi.kategori'])
                ->latest('id')
                ->get();

            return view('admin.dashboard', [
                'totalAspirasi' => $aspirasis->count(),
                'totalMenunggu' => $aspirasis->where('status', 'menunggu')->count(),
                'totalProses' => $aspirasis->where('status', 'proses')->count(),
                'totalSelesai' => $aspirasis->where('status', 'selesai')->count(),
                'latestAspirasis' => $aspirasis->take(5),
            ]);
        })->name('dashboard');

        Route::get('/aspirasi', function (Request $request) {
            $status = $request->string('status')->trim()->toString();
            $kategoriId = $request->string('kategori_id')->trim()->toString();
            $tanggal = $request->string('tanggal')->trim()->toString();

            $aspirasis = aspirasis::query()
                ->with(['inputAspirasi.siswa', 'inputAspirasi.kategori'])
                ->when(in_array($status, ['menunggu', 'proses', 'selesai'], true), function ($query) use ($status) {
                    $query->where('status', $status);
                })
                ->when($kategoriId !== '', function ($query) use ($kategoriId) {
                    $query->whereHas('inputAspirasi', function ($inputAspirasiQuery) use ($kategoriId) {
                        $inputAspirasiQuery->where('kategori_id', $kategoriId);
                    });
                })
                ->when($tanggal !== '', function ($query) use ($tanggal) {
                    $query->whereHas('inputAspirasi', function ($inputAspirasiQuery) use ($tanggal) {
                        $inputAspirasiQuery->whereDate('created_at', $tanggal);
                    });
                })
                ->latest('id')
                ->get();

            return view('admin.aspirasi.index', [
                'aspirasis' => $aspirasis,
                'kategoris' => kategoris::query()->orderBy('ket_kategori')->get(),
                'status' => $status,
                'kategoriId' => $kategoriId,
                'tanggal' => $tanggal,
                'totalMenunggu' => $aspirasis->where('status', 'menunggu')->count(),
                'totalProses' => $aspirasis->where('status', 'proses')->count(),
                'totalSelesai' => $aspirasis->where('status', 'selesai')->count(),
            ]);
        })->name('aspirasi.index.page');

        Route::get('/aspirasi/{aspirasi}', function (aspirasis $aspirasi) {
            return view('admin.aspirasi.show', [
                'aspirasi' => $aspirasi->load(['inputAspirasi.siswa', 'inputAspirasi.kategori']),
            ]);
        })->name('aspirasi.show.page');

        Route::get('/aspirasi/{aspirasi}/edit', function (aspirasis $aspirasi) {
            return view('admin.aspirasi.edit', [
                'aspirasi' => $aspirasi->load(['inputAspirasi.siswa', 'inputAspirasi.kategori']),
            ]);
        })->name('aspirasi.edit.page');

        Route::patch('/aspirasi/{aspirasi}', [AspirasisController::class, 'updateFromAdmin'])->name('aspirasi.update');

        Route::get('/kategori', function () {
            return view('admin.kategori.index', [
                'kategoris' => kategoris::query()->latest('id')->get(),
            ]);
        })->name('kategori.index.page');

        Route::get('/kategori/create', function () {
            return view('admin.kategori.create');
        })->name('kategori.create.page');

        Route::get('/kategori/{id}/edit', function (int $id) {
            return view('admin.kategori.edit', [
                'kategori' => kategoris::query()->findOrFail($id),
            ]);
        })->name('kategori.edit.page');

        Route::get('/laporan', function () {
            $aspirasis = aspirasis::query()
                ->with(['inputAspirasi.siswa', 'inputAspirasi.kategori'])
                ->where('status', 'selesai')
                ->latest('id')
                ->get();

            return view('admin.laporan.index', [
                'aspirasis' => $aspirasis,
                'totalSelesai' => $aspirasis->count(),
            ]);
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeinput_aspirasisRequest;
use App\Http\Requests\SubmitSiswaAspirasiRequest;
use App\Http\Requests\Updateinput_aspirasisRequest;
use App\Models\aspirasis;
use App\Models\input_aspirasis;
use App\Models\siswas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class InputAspirasisController extends Controller
{
    public function submitFromSiswa(SubmitSiswaAspirasiRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            $createdInputAspirasi = DB::transaction(function () use ($validated): input_aspirasis {
                $siswa = siswas::query()->firstOrCreate(
                    ['nis' => $validated['nis']],
                    ['kelas' => '-']
                );

                $inputAspirasi = input_aspirasis::query()->create([
                    'siswa_id' => $siswa->nis,
                    'kategori_id' => $validated['kategori_id'],
                    'lokasi' => $validated['lokasi'],
                    'keterangan' => $validated['keterangan'],
                ]);

                aspirasis::query()->create([
                    'status' => 'menunggu',
                    'input_aspirasi_id' => $inputAspirasi->id,
                    'lokasi' => $inputAspirasi->lokasi,
                    'feedback' => 'Belum ada tanggapan.',
                ]);

                return $inputAspirasi;
            });

            return redirect()
                ->route('siswa.success')
                ->with('success', 'Aspirasi berhasil dikirim.')
                ->with('laporan_id', $createdInputAspirasi->id);
        } catch (\Throwable $throwable) {
            report($throwable);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Aspirasi gagal dikirim. Silakan coba lagi.');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            input_aspirasis::query()
                ->with(['siswa', 'kategori'])
                ->latest('id')
                ->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeinput_aspirasisRequest $request)
    {
        $inputAspirasi = input_aspirasis::query()->create($request->validated());

        return response()->json($inputAspirasi->load(['siswa', 'kategori']), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(input_aspirasis $input_aspirasis)
    {
        return response()->json($input_aspirasis->load(['siswa', 'kategori']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(input_aspirasis $input_aspirasis)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateinput_aspirasisRequest $request, input_aspirasis $input_aspirasis)
    {
        $input_aspirasis->update($request->validated());

        return response()->json($input_aspirasis->refresh()->load(['siswa', 'kategori']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(input_aspirasis $input_aspirasis)
    {
        $input_aspirasis->delete();

        return response()->noContent();
    }
}

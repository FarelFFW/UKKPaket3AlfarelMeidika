<?php

use App\Models\aspirasis;
use App\Models\input_aspirasis;
use App\Models\kategoris;
use App\Models\siswas;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function createInputAspirasiForAspirasiTest(): input_aspirasis
{
    $siswa = siswas::query()->create(['kelas' => 'XII-RPL2']);
    $kategori = kategoris::query()->create(['ket_kategori' => 'Infrastruktur']);

    return input_aspirasis::query()->create([
        'siswa_id' => $siswa->nis,
        'kategori_id' => $kategori->id,
        'lokasi' => 'Perpustakaan',
        'keterangan' => 'Rak buku rusak',
    ]);
}

test('it creates an aspirasi with default status', function () {
    $input = createInputAspirasiForAspirasiTest();

    $response = $this->postJson('/aspirasis', [
        'input_aspirasi_id' => $input->id,
        'lokasi' => 'Perpustakaan',
        'feedback' => 'Akan ditindaklanjuti',
    ]);

    $response
        ->assertCreated()
        ->assertJsonPath('status', 'menunggu')
        ->assertJsonPath('input_aspirasi_id', $input->id);

    $aspirasi = aspirasis::query()->firstOrFail();

    expect($aspirasi->status)->toBe('menunggu');
});

test('it validates aspirasi status value', function () {
    $input = createInputAspirasiForAspirasiTest();

    $response = $this->postJson('/aspirasis', [
        'status' => 'invalid-status',
        'input_aspirasi_id' => $input->id,
        'lokasi' => 'Perpustakaan',
        'feedback' => 'Cek validasi',
    ]);

    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['status']);
});

test('it updates an aspirasi', function () {
    $input = createInputAspirasiForAspirasiTest();
    $aspirasi = aspirasis::query()->create([
        'status' => 'menunggu',
        'input_aspirasi_id' => $input->id,
        'lokasi' => 'Perpustakaan',
        'feedback' => 'Menunggu teknisi',
    ]);

    $response = $this->putJson("/aspirasis/{$aspirasi->id}", [
        'status' => 'proses',
        'input_aspirasi_id' => $input->id,
        'lokasi' => 'Perpustakaan Lantai 2',
        'feedback' => 'Sedang diperbaiki',
    ]);

    $response
        ->assertOk()
        ->assertJsonPath('status', 'proses')
        ->assertJsonPath('lokasi', 'Perpustakaan Lantai 2');

    $aspirasi->refresh();

    expect($aspirasi->status)->toBe('proses');
});

test('it deletes an aspirasi', function () {
    $input = createInputAspirasiForAspirasiTest();
    $aspirasi = aspirasis::query()->create([
        'status' => 'menunggu',
        'input_aspirasi_id' => $input->id,
        'lokasi' => 'Perpustakaan',
        'feedback' => 'Akan diproses',
    ]);

    $response = $this->deleteJson("/aspirasis/{$aspirasi->id}");

    $response->assertNoContent();

    expect(aspirasis::query()->find($aspirasi->id))->toBeNull();
});

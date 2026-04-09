<?php

use App\Models\input_aspirasis;
use App\Models\kategoris;
use App\Models\siswas;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it creates an input aspirasi', function () {
    $siswa = siswas::query()->create(['kelas' => 'XII-RPL1']);
    $kategori = kategoris::query()->create(['ket_kategori' => 'Fasilitas']);

    $response = $this->postJson('/input-aspirasis', [
        'siswa_id' => $siswa->nis,
        'kategori_id' => $kategori->id,
        'lokasi' => 'Lab Komputer',
        'keterangan' => 'AC tidak dingin',
    ]);

    $response
        ->assertCreated()
        ->assertJsonPath('siswa_id', $siswa->nis)
        ->assertJsonPath('kategori_id', $kategori->id)
        ->assertJsonPath('lokasi', 'Lab Komputer');

    expect(input_aspirasis::query()->count())->toBe(1);
});

test('it validates related ids on input aspirasi', function () {
    $response = $this->postJson('/input-aspirasis', [
        'siswa_id' => 9999,
        'kategori_id' => 9999,
        'lokasi' => 'Aula',
        'keterangan' => 'Kursi rusak',
    ]);

    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['siswa_id', 'kategori_id']);
});

test('it updates an input aspirasi', function () {
    $siswa = siswas::query()->create(['kelas' => 'XI-RPL1']);
    $kategori = kategoris::query()->create(['ket_kategori' => 'Kebersihan']);
    $input = input_aspirasis::query()->create([
        'siswa_id' => $siswa->nis,
        'kategori_id' => $kategori->id,
        'lokasi' => 'Kantin',
        'keterangan' => 'Lantai licin',
    ]);

    $response = $this->putJson("/input-aspirasis/{$input->id}", [
        'siswa_id' => $siswa->nis,
        'kategori_id' => $kategori->id,
        'lokasi' => 'Kantin Baru',
        'keterangan' => 'Lantai perlu anti-slip',
    ]);

    $response
        ->assertOk()
        ->assertJsonPath('lokasi', 'Kantin Baru');

    $input->refresh();

    expect($input->lokasi)->toBe('Kantin Baru');
});

test('it deletes an input aspirasi', function () {
    $siswa = siswas::query()->create(['kelas' => 'X-RPL1']);
    $kategori = kategoris::query()->create(['ket_kategori' => 'Keamanan']);
    $input = input_aspirasis::query()->create([
        'siswa_id' => $siswa->nis,
        'kategori_id' => $kategori->id,
        'lokasi' => 'Gerbang',
        'keterangan' => 'Lampu redup',
    ]);

    $response = $this->deleteJson("/input-aspirasis/{$input->id}");

    $response->assertNoContent();

    expect(input_aspirasis::query()->find($input->id))->toBeNull();
});

<?php

use App\Models\kategoris;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it creates a kategori', function () {
    $response = $this->postJson('/kategoris', [
        'ket_kategori' => 'Infrastruktur',
    ]);

    $response
        ->assertCreated()
        ->assertJsonPath('ket_kategori', 'Infrastruktur');

    $kategori = kategoris::query()->firstOrFail();

    expect($kategori->ket_kategori)->toBe('Infrastruktur');
});

test('it validates ket_kategori must be unique', function () {
    kategoris::query()->create([
        'ket_kategori' => 'Keamanan',
    ]);

    $response = $this->postJson('/kategoris', [
        'ket_kategori' => 'Keamanan',
    ]);

    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['ket_kategori']);
});

test('it updates a kategori', function () {
    $kategori = kategoris::query()->create([
        'ket_kategori' => 'Kebersihan',
    ]);

    $response = $this->putJson("/kategoris/{$kategori->id}", [
        'ket_kategori' => 'Kebersihan Sekolah',
    ]);

    $response
        ->assertOk()
        ->assertJsonPath('ket_kategori', 'Kebersihan Sekolah');

    $kategori->refresh();

    expect($kategori->ket_kategori)->toBe('Kebersihan Sekolah');
});

test('it deletes a kategori', function () {
    $kategori = kategoris::query()->create([
        'ket_kategori' => 'Fasilitas',
    ]);

    $response = $this->deleteJson("/kategoris/{$kategori->id}");

    $response->assertNoContent();

    expect(kategoris::query()->find($kategori->id))->toBeNull();
});

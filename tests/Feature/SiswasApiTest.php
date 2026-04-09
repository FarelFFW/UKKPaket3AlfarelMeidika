<?php

use App\Models\siswas;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it creates a siswa', function () {
    $response = $this->postJson('/siswas', [
        'kelas' => 'XII-RPL1',
    ]);

    $response
        ->assertCreated()
        ->assertJsonPath('kelas', 'XII-RPL1');

    $siswa = siswas::query()->firstOrFail();

    expect($siswa->kelas)->toBe('XII-RPL1');
});

test('it validates kelas is required', function () {
    $response = $this->postJson('/siswas', []);

    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['kelas']);
});

test('it updates a siswa', function () {
    $siswa = siswas::query()->create([
        'kelas' => 'XI-RPL1',
    ]);

    $response = $this->putJson("/siswas/{$siswa->nis}", [
        'kelas' => 'XI-RPL2',
    ]);

    $response
        ->assertOk()
        ->assertJsonPath('kelas', 'XI-RPL2');

    $siswa->refresh();

    expect($siswa->kelas)->toBe('XI-RPL2');
});

test('it deletes a siswa', function () {
    $siswa = siswas::query()->create([
        'kelas' => 'X-RPL1',
    ]);

    $response = $this->deleteJson("/siswas/{$siswa->nis}");

    $response->assertNoContent();

    expect(siswas::query()->find($siswa->nis))->toBeNull();
});

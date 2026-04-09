<?php

use App\Models\admins;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('it creates an admin', function () {
    $response = $this->postJson('/admins', [
        'username' => 'admin-utama',
        'password' => 'password123',
    ]);

    $response
        ->assertCreated()
        ->assertJsonPath('username', 'admin-utama')
        ->assertJsonMissingPath('password');

    $admin = admins::query()->firstOrFail();

    expect($admin->username)->toBe('admin-utama')
        ->and(Hash::check('password123', $admin->getRawOriginal('password')))->toBeTrue();
});

test('it validates unique username on create', function () {
    admins::query()->create([
        'username' => 'admin-utama',
        'password' => 'password123',
    ]);

    $response = $this->postJson('/admins', [
        'username' => 'admin-utama',
        'password' => 'password123',
    ]);

    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['username']);
});

test('it updates an admin without changing password when password is not sent', function () {
    $admin = admins::query()->create([
        'username' => 'admin-lama',
        'password' => 'password123',
    ]);

    $oldPasswordHash = $admin->getRawOriginal('password');

    $response = $this->putJson("/admins/{$admin->id}", [
        'username' => 'admin-baru',
    ]);

    $response
        ->assertOk()
        ->assertJsonPath('username', 'admin-baru')
        ->assertJsonMissingPath('password');

    $admin->refresh();

    expect($admin->username)->toBe('admin-baru')
        ->and($admin->getRawOriginal('password'))->toBe($oldPasswordHash);
});

test('it deletes an admin', function () {
    $admin = admins::query()->create([
        'username' => 'admin-hapus',
        'password' => 'password123',
    ]);

    $response = $this->deleteJson("/admins/{$admin->id}");

    $response->assertNoContent();

    expect(admins::query()->find($admin->id))->toBeNull();
});

<?php

use App\Models\admins;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('admin can login and access profile', function () {
    $admin = admins::query()->create([
        'username' => 'admin1',
        'password' => 'password123',
    ]);

    $loginResponse = $this->postJson('/admin/login', [
        'username' => 'admin1',
        'password' => 'password123',
    ]);

    $loginResponse
        ->assertOk()
        ->assertJsonPath('admin.username', 'admin1')
        ->assertJsonMissingPath('admin.password');

    $this->assertAuthenticatedAs($admin, 'admin');

    $this->getJson('/admin/me')
        ->assertOk()
        ->assertJsonPath('admin.username', 'admin1');
});

test('admin login fails with invalid password', function () {
    admins::query()->create([
        'username' => 'admin1',
        'password' => 'password123',
    ]);

    $response = $this->postJson('/admin/login', [
        'username' => 'admin1',
        'password' => 'salah1234',
    ]);

    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['username']);
});

test('guest cannot access admin profile endpoint', function () {
    $this->getJson('/admin/me')->assertUnauthorized();
});

test('admin can logout', function () {
    admins::query()->create([
        'username' => 'admin1',
        'password' => 'password123',
    ]);

    $this->postJson('/admin/login', [
        'username' => 'admin1',
        'password' => 'password123',
    ])->assertOk();

    $this->postJson('/admin/logout')->assertOk();

    $this->getJson('/admin/me')->assertUnauthorized();
});

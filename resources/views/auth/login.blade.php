@extends('layouts.app')

@section('title', 'Login Admin')

@section('body-class', 'bg-gradient-to-br from-slate-100 via-slate-200 to-slate-300')

@section('content')
    <section class="mx-auto mt-14 max-w-md">
        <div class="mb-10 text-center">
            <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-blue-700 text-xl font-bold text-white">LF</div>
            <h1 class="text-4xl font-extrabold tracking-tight">LaporFasilitas</h1>
            <p class="mt-2 text-sm text-slate-600">Sistem Aspirasi Sekolah</p>
        </div>

        <div class="lf-card p-6 md:p-7">
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="username" class="mb-2 block text-sm font-semibold">Username Admin</label>
                    <input id="username" name="username" type="text" class="lf-input" placeholder="Masukkan username admin" value="{{ old('username') }}" required>
                    @error('username')
                        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="mb-2 flex items-center justify-between">
                        <label for="password" class="text-sm font-semibold">Password</label>
                        <a href="#" class="text-xs font-medium text-blue-700">Lupa Password?</a>
                    </div>
                    <input id="password" name="password" type="password" class="lf-input" placeholder="Masukkan password" required>
                    @error('password')
                        <p class="mt-1 text-xs text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="lf-btn-primary w-full">Masuk</button>
            </form>
        </div>
    </section>
@endsection

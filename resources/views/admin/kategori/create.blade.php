@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <h1 class="mb-4 text-2xl font-semibold">Tambah Kategori</h1>

    @if ($errors->any())
        <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('kategoris.store') }}" class="space-y-4 rounded-xl border border-slate-200 bg-white p-6">
        @csrf

        <div>
            <label class="mb-1 block text-sm font-medium">Nama Kategori</label>
            <input type="text" name="ket_kategori" value="{{ old('ket_kategori') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" placeholder="Contoh: Kebersihan" required>
        </div>

        <button type="submit" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white">Simpan</button>
    </form>
@endsection

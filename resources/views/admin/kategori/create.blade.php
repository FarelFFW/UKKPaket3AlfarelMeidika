@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <h1 class="mb-4 text-2xl font-semibold">Tambah Kategori</h1>

    <form class="space-y-4 rounded-xl border border-slate-200 bg-white p-6">
        <div>
            <label class="mb-1 block text-sm font-medium">Nama Kategori</label>
            <input type="text" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm" placeholder="Contoh: Kebersihan">
        </div>

        <button type="submit" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white">Simpan</button>
    </form>
@endsection

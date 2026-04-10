@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
    @if (session('success'))
        <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Kategori</h1>
        <a href="{{ route('admin.kategori.create.page') }}" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white">Tambah Kategori</a>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-4 py-3">Nama Kategori</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $kategori)
                    <tr class="border-t border-slate-100">
                        <td class="px-4 py-3">{{ $kategori->ket_kategori }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.kategori.edit.page', ['id' => $kategori->id]) }}" class="rounded-lg bg-blue-100 px-3 py-2 text-xs font-semibold text-blue-700">Edit</a>
                                <form method="POST" action="{{ route('kategoris.destroy', ['kategoris' => $kategori->id]) }}" onsubmit="return confirm('Hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="border-t border-slate-100">
                        <td class="px-4 py-3 text-slate-500">Belum ada data kategori.</td>
                        <td class="px-4 py-3"></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

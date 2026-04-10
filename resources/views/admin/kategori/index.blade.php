@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Kategori</h1>
        <a href="#" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white">Tambah Kategori</a>
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
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-3">-</td>
                    <td class="px-4 py-3">Edit</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

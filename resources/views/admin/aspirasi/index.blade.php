@extends('layouts.admin')

@section('title', 'Daftar Aspirasi')

@section('content')
    <div class="mb-4 grid grid-cols-1 gap-3 md:grid-cols-6">
        <select class="lf-input"><option>Semua Status</option></select>
        <select class="lf-input"><option>Per Tanggal</option></select>
        <select class="lf-input"><option>Per Bulan</option></select>
        <select class="lf-input"><option>Per Kategori</option></select>
        <button class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-sm font-semibold">Export</button>
        <button class="lf-btn-primary">Perbarui</button>
    </div>

    <div class="lf-card overflow-x-auto">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-4 py-3 font-semibold">ID</th>
                    <th class="px-4 py-3 font-semibold">Tanggal</th>
                    <th class="px-4 py-3 font-semibold">NIS</th>
                    <th class="px-4 py-3 font-semibold">Kategori</th>
                    <th class="px-4 py-3 font-semibold">Lokasi</th>
                    <th class="px-4 py-3 font-semibold">Status</th>
                    <th class="px-4 py-3 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-4 font-semibold text-blue-700">#ASP-8821</td>
                    <td class="px-4 py-4">24 Okt 2023</td>
                    <td class="px-4 py-4">21090123</td>
                    <td class="px-4 py-4"><span class="rounded-md bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-700">Infrastruktur</span></td>
                    <td class="px-4 py-4">Gedung B, Lantai 2</td>
                    <td class="px-4 py-4"><x-status-badge status="proses" /></td>
                    <td class="px-4 py-4"><a href="{{ route('admin.aspirasi.show.page', ['id' => 1]) }}" class="text-blue-700">Lihat</a></td>
                </tr>
                <tr class="border-t border-slate-100">
                    <td class="px-4 py-4 font-semibold text-blue-700">#ASP-8819</td>
                    <td class="px-4 py-4">23 Okt 2023</td>
                    <td class="px-4 py-4">21090455</td>
                    <td class="px-4 py-4"><span class="rounded-md bg-emerald-100 px-2 py-1 text-xs font-semibold text-emerald-700">Kebersihan</span></td>
                    <td class="px-4 py-4">Kantin Sekolah</td>
                    <td class="px-4 py-4"><x-status-badge status="selesai" /></td>
                    <td class="px-4 py-4"><a href="{{ route('admin.aspirasi.show.page', ['id' => 2]) }}" class="text-blue-700">Lihat</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-3">
        <article class="lf-card border-l-4 border-l-blue-700 p-5">
            <p class="lf-label">Total Menunggu</p>
            <p class="mt-2 text-4xl font-extrabold text-blue-700">24</p>
            <p class="mt-2 text-sm text-slate-500">+2 dari kemarin</p>
        </article>
        <article class="lf-card border-l-4 border-l-amber-500 p-5">
            <p class="lf-label">Sedang Diproses</p>
            <p class="mt-2 text-4xl font-extrabold text-amber-600">12</p>
            <p class="mt-2 text-sm text-slate-500">Rata-rata 2 hari</p>
        </article>
        <article class="lf-card border-l-4 border-l-emerald-500 p-5">
            <p class="lf-label">Selesai (Minggu Ini)</p>
            <p class="mt-2 text-4xl font-extrabold text-emerald-600">48</p>
            <p class="mt-2 text-sm text-slate-500">94% penyelesaian</p>
        </article>
    </div>
@endsection

@extends('layouts.guest')

@section('title', 'Data Aspirasi Publik')

@section('guest-content')
    <section>
        <h1 class="text-5xl font-extrabold tracking-tight">Data Aspirasi Publik</h1>
        <p class="mt-3 max-w-3xl text-lg text-slate-600">Daftar laporan fasilitas sekolah yang diajukan oleh siswa. Transparansi untuk kenyamanan belajar bersama.</p>

        <div class="mt-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <input type="text" class="lf-input max-w-lg" placeholder="Cari ID atau lokasi...">
            <div class="flex items-center gap-2 text-sm">
                <button class="rounded-lg bg-blue-100 px-4 py-2 font-semibold text-blue-700">Semua</button>
                <button class="rounded-lg bg-white px-4 py-2 text-slate-700">Terbaru</button>
                <button class="rounded-lg bg-white px-4 py-2 text-slate-700">Prioritas Tinggi</button>
            </div>
        </div>

        <div class="lf-card mt-6 overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-4 font-semibold">ID Laporan</th>
                        <th class="px-5 py-4 font-semibold">Tanggal</th>
                        <th class="px-5 py-4 font-semibold">Kategori</th>
                        <th class="px-5 py-4 font-semibold">Lokasi</th>
                        <th class="px-5 py-4 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-slate-100">
                        <td class="px-5 py-4 font-semibold text-blue-700">#LP-2024-001</td>
                        <td class="px-5 py-4">12 Okt 2024</td>
                        <td class="px-5 py-4">Kebersihan</td>
                        <td class="px-5 py-4">Kantin Tengah</td>
                        <td class="px-5 py-4"><x-status-badge status="menunggu" /></td>
                    </tr>
                    <tr class="border-t border-slate-100">
                        <td class="px-5 py-4 font-semibold text-blue-700">#LP-2024-002</td>
                        <td class="px-5 py-4">11 Okt 2024</td>
                        <td class="px-5 py-4">Sarana Prasarana</td>
                        <td class="px-5 py-4">Lab Komputer 3</td>
                        <td class="px-5 py-4"><x-status-badge status="proses" /></td>
                    </tr>
                    <tr class="border-t border-slate-100">
                        <td class="px-5 py-4 font-semibold text-blue-700">#LP-2024-003</td>
                        <td class="px-5 py-4">10 Okt 2024</td>
                        <td class="px-5 py-4">Kelistrikan</td>
                        <td class="px-5 py-4">Ruang Kelas 12-A</td>
                        <td class="px-5 py-4"><x-status-badge status="selesai" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection

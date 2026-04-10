@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        <article class="lf-card p-5">
            <p class="lf-label">Total Aspirasi</p>
            <p class="mt-2 text-5xl font-extrabold">1,284</p>
            <p class="mt-3 text-xs font-semibold text-blue-700">+12% vs bulan lalu</p>
        </article>
        <article class="lf-card p-5">
            <p class="lf-label">Menunggu</p>
            <p class="mt-2 text-5xl font-extrabold">42</p>
            <p class="mt-3 text-xs text-slate-500">Perlu verifikasi</p>
        </article>
        <article class="lf-card p-5">
            <p class="lf-label">Proses</p>
            <p class="mt-2 text-5xl font-extrabold">156</p>
            <p class="mt-3 text-xs text-slate-500">Dalam pengerjaan</p>
        </article>
        <article class="lf-card p-5">
            <p class="lf-label">Selesai</p>
            <p class="mt-2 text-5xl font-extrabold">1,086</p>
            <p class="mt-3 text-xs font-semibold text-emerald-600">Resolusi 85%</p>
        </article>
    </div>

    <section class="lf-card mt-6 overflow-x-auto">
        <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
            <h2 class="text-sm font-bold uppercase tracking-wider">Aspirasi Terbaru</h2>
            <a href="{{ route('admin.aspirasi.index.page') }}" class="text-sm font-semibold text-blue-700">Lihat Semua</a>
        </div>
        <table class="min-w-full text-sm">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-5 py-4 text-left font-semibold">Pelapor</th>
                    <th class="px-5 py-4 text-left font-semibold">Kategori</th>
                    <th class="px-5 py-4 text-left font-semibold">Deskripsi</th>
                    <th class="px-5 py-4 text-left font-semibold">Status</th>
                    <th class="px-5 py-4 text-left font-semibold">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t border-slate-100">
                    <td class="px-5 py-4">Rizky Kurniawan</td>
                    <td class="px-5 py-4">Lab Komputer</td>
                    <td class="px-5 py-4">AC Ruang Lab 2 tidak dingin...</td>
                    <td class="px-5 py-4"><x-status-badge status="menunggu" /></td>
                    <td class="px-5 py-4 text-slate-500">12 menit lalu</td>
                </tr>
                <tr class="border-t border-slate-100">
                    <td class="px-5 py-4">Anita Sari</td>
                    <td class="px-5 py-4">Toilet Siswa</td>
                    <td class="px-5 py-4">Kran air di toilet lantai 2 patah...</td>
                    <td class="px-5 py-4"><x-status-badge status="proses" /></td>
                    <td class="px-5 py-4 text-slate-500">1 jam lalu</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="lf-card mt-6 p-5">
        <h2 class="mb-4 text-sm font-bold uppercase tracking-wider">Aktivitas Terbaru</h2>
        <ul class="space-y-4 text-sm text-slate-600">
            <li>[Baru] Pak Agus menandai <span class="font-semibold text-blue-700">#ASP-882</span> sebagai selesai.</li>
            <li>[Update] Ibu Maya menambahkan komentar pada laporan Lab Komputer.</li>
            <li>[Masuk] Laporan baru "Jendela Rusak" telah diterima dari Budi Antoro.</li>
        </ul>
    </section>
@endsection

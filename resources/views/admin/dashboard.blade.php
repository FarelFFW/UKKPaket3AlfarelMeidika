@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        <article class="lf-card p-5">
            <p class="lf-label">Total Aspirasi</p>
            <p class="mt-2 text-5xl font-extrabold">{{ $totalAspirasi }}</p>
            <p class="mt-3 text-xs font-semibold text-blue-700">Data saat ini</p>
        </article>
        <article class="lf-card p-5">
            <p class="lf-label">Menunggu</p>
            <p class="mt-2 text-5xl font-extrabold">{{ $totalMenunggu }}</p>
            <p class="mt-3 text-xs text-slate-500">Perlu verifikasi</p>
        </article>
        <article class="lf-card p-5">
            <p class="lf-label">Proses</p>
            <p class="mt-2 text-5xl font-extrabold">{{ $totalProses }}</p>
            <p class="mt-3 text-xs text-slate-500">Dalam pengerjaan</p>
        </article>
        <article class="lf-card p-5">
            <p class="lf-label">Selesai</p>
            <p class="mt-2 text-5xl font-extrabold">{{ $totalSelesai }}</p>
            <p class="mt-3 text-xs font-semibold text-emerald-600">Status selesai</p>
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
                @forelse ($latestAspirasis as $aspirasi)
                    <tr class="border-t border-slate-100">
                        <td class="px-5 py-4">NIS {{ $aspirasi->inputAspirasi?->siswa?->nis ?? '-' }}</td>
                        <td class="px-5 py-4">{{ $aspirasi->inputAspirasi?->kategori?->ket_kategori ?? '-' }}</td>
                        <td class="px-5 py-4">{{ $aspirasi->inputAspirasi?->keterangan ?? '-' }}</td>
                        <td class="px-5 py-4"><x-status-badge :status="$aspirasi->status" /></td>
                        <td class="px-5 py-4 text-slate-500">{{ optional($aspirasi->inputAspirasi?->created_at)->format('d M Y H:i') ?? '-' }}</td>
                    </tr>
                @empty
                    <tr class="border-t border-slate-100">
                        <td colspan="5" class="px-5 py-8 text-center text-slate-500">Belum ada aspirasi terbaru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <section class="lf-card mt-6 p-5">
        <h2 class="mb-4 text-sm font-bold uppercase tracking-wider">Aktivitas Terbaru</h2>
        <ul class="space-y-4 text-sm text-slate-600">
            @forelse ($latestAspirasis->take(3) as $aspirasi)
                <li>[Update] Laporan <span class="font-semibold text-blue-700">#ASP-{{ str_pad((string) $aspirasi->id, 5, '0', STR_PAD_LEFT) }}</span> saat ini berstatus <strong>{{ strtoupper($aspirasi->status) }}</strong>.</li>
            @empty
                <li>Belum ada aktivitas terbaru.</li>
            @endforelse
        </ul>
    </section>
@endsection

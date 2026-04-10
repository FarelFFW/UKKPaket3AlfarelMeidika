@extends('layouts.guest')

@section('title', 'Feedback Aspirasi')

@section('guest-content')
    <section class="mx-auto max-w-4xl">
        <div class="lf-card space-y-6 p-7 md:p-8">
            <div class="flex flex-wrap items-start justify-between gap-3">
                <div>
                    <p class="lf-label">Detail Aspirasi</p>
                    <h1 class="mt-2 text-4xl font-extrabold tracking-tight">{{ $aspirasi->inputAspirasi?->keterangan ?? '-' }}</h1>
                    <p class="mt-2 text-sm text-slate-500">Laporan ID: #LP-{{ str_pad((string) $aspirasi->id, 5, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="text-right">
                    <p class="lf-label">Status</p>
                    <p class="mt-2"><x-status-badge :status="$aspirasi->status" /></p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <p class="lf-label">NIS</p>
                    <p class="mt-2 text-2xl font-semibold">{{ $aspirasi->inputAspirasi?->siswa?->nis ?? '-' }}</p>
                </div>
                <div>
                    <p class="lf-label">Kategori</p>
                    <p class="mt-2 text-2xl font-semibold">{{ $aspirasi->inputAspirasi?->kategori?->ket_kategori ?? '-' }}</p>
                </div>
                <div>
                    <p class="lf-label">Lokasi</p>
                    <p class="mt-2 text-2xl font-semibold">{{ $aspirasi->lokasi }}</p>
                </div>
                <div>
                    <p class="lf-label">Dikirim Pada</p>
                    <p class="mt-2 text-2xl font-semibold">{{ optional($aspirasi->inputAspirasi?->created_at)->format('d M Y H:i') ?? '-' }}</p>
                </div>
            </div>

            <div>
                <p class="lf-label">Feedback Admin</p>
                <div class="mt-3 rounded-xl bg-blue-50 p-4 text-base leading-relaxed text-slate-700">
                    {{ $aspirasi->feedback ?: 'Belum ada feedback dari admin.' }}
                </div>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('siswa.cek-status') }}" class="lf-btn-primary">Kembali ke Data Aspirasi</a>
                <a href="{{ route('siswa.history') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium">Buat Aspirasi Baru</a>
            </div>
        </div>
    </section>
@endsection
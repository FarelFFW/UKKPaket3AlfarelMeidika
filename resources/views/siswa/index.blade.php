@extends('layouts.guest')

@section('title', 'Beranda Aspirasi')

@section('guest-content')
    <section class="mx-auto max-w-4xl py-6 text-center md:py-10">
        <h1 class="text-4xl font-extrabold leading-tight tracking-tight text-slate-900 md:text-6xl">Suarakan Aspirasimu untuk Fasilitas Sekolah yang Lebih Baik</h1>
        <p class="mx-auto mt-6 max-w-3xl text-lg text-slate-600">Platform digital transparan untuk melaporkan kerusakan atau memberikan saran perbaikan fasilitas sekolah demi kenyamanan belajar bersama.</p>
    </section>

    <section class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <article class="lf-card p-8 text-center">
            <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-xl">A</div>
            <h2 class="text-3xl font-bold">Ajukan Aspirasi</h2>
            <p class="mx-auto mt-4 max-w-sm text-sm text-slate-600">Laporkan kerusakan fasilitas atau berikan ide konstruktif untuk pengembangan lingkungan sekolah kita.</p>
            <a href="{{ route('siswa.history') }}" class="lf-btn-success mt-8">Isi Form Aspirasi</a>
        </article>

        <article class="lf-card p-8 text-center">
            <div class="mx-auto mb-5 flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-xl">D</div>
            <h2 class="text-3xl font-bold">Data Aspirasi</h2>
            <p class="mx-auto mt-4 max-w-sm text-sm text-slate-600">Pantau status laporan dan lihat rangkuman aspirasi yang sedang diproses oleh pihak manajemen sekolah.</p>
            <a href="{{ route('siswa.cek-status') }}" class="lf-btn-primary mt-8">Lihat Data Aspirasi</a>
        </article>
    </section>

    <section class="mt-12 rounded-2xl border border-slate-200 bg-white p-8">
        <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
            <div>
                <p class="text-5xl font-extrabold text-blue-700">{{ $totalSelesai }}</p>
                <p class="mt-2 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">Laporan Selesai</p>
            </div>
            <div>
                <p class="text-5xl font-extrabold text-blue-700">{{ $totalProses }}</p>
                <p class="mt-2 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">Dalam Proses</p>
            </div>
            <div>
                <p class="text-5xl font-extrabold text-blue-700">{{ $completionRate }}%</p>
                <p class="mt-2 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">Indeks Kepuasan</p>
            </div>
            <div>
                <p class="text-5xl font-extrabold text-blue-700">{{ $averageResponseHours !== null ? number_format($averageResponseHours, 1) . 'h' : '-' }}</p>
                <p class="mt-2 text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">Respon Cepat</p>
            </div>
        </div>
    </section>
@endsection

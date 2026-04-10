@extends('layouts.guest')

@section('title', 'Aspirasi Berhasil Dikirim')

@section('guest-content')
    <section class="mx-auto mt-10 max-w-xl text-center">
        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-emerald-100 text-2xl">✓</div>
        <h1 class="text-4xl font-extrabold tracking-tight">Aspirasi Berhasil Dikirim</h1>
        <p class="mt-3 text-slate-600">Terima kasih. Laporan Anda telah diterima dan akan ditinjau admin secepatnya.</p>

        <div class="lf-card mt-7 p-6 text-left text-sm text-slate-600">
            Simpan ID laporan Anda untuk memudahkan proses pengecekan status pada halaman data aspirasi publik.
        </div>

        <div class="mt-6 flex justify-center gap-3">
            <a href="{{ route('siswa.cek-status') }}" class="lf-btn-primary">Lihat Data Aspirasi</a>
            <a href="{{ route('siswa.history') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium">Buat Laporan Lagi</a>
        </div>
    </section>
@endsection

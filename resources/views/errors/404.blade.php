@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
    <section class="mx-auto max-w-xl rounded-xl border border-slate-200 bg-white p-8 text-center shadow-sm">
        <p class="mb-2 text-sm font-medium uppercase tracking-wide text-slate-500">404</p>
        <h1 class="mb-3 text-2xl font-semibold">Halaman Tidak Ditemukan</h1>
        <p class="mb-6 text-sm text-slate-600">Halaman yang Anda cari tidak tersedia atau sudah dipindahkan.</p>
        <a href="/" class="inline-flex rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white">Kembali ke Beranda</a>
    </section>
@endsection

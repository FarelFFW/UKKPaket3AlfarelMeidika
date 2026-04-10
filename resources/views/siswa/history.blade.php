@extends('layouts.guest')

@section('title', 'Ajukan Aspirasi')

@section('guest-content')
    <section class="mx-auto max-w-3xl py-3">
        <h1 class="text-5xl font-extrabold tracking-tight">Sampaikan Aspirasi Anda</h1>
        <p class="mt-3 text-xl text-slate-600">Bantu kami menjaga kenyamanan belajar dengan melaporkan kerusakan fasilitas secara cepat dan transparan.</p>

        <form class="lf-card mt-8 space-y-5 p-7 md:p-8">
            <div>
                <label class="mb-2 block text-sm font-semibold">Nama (Opsional)</label>
                <input type="text" class="lf-input" placeholder="Contoh: Budi Santoso">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Kategori Kerusakan</label>
                <select class="lf-input">
                    <option>Pilih kategori...</option>
                    <option>Infrastruktur</option>
                    <option>Kebersihan</option>
                    <option>Sarana Prasarana</option>
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Lokasi Kerusakan</label>
                <input type="text" class="lf-input" placeholder="Contoh: Ruang Lab Kimia, Lantai 2">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Detail Keluhan</label>
                <textarea rows="5" class="lf-input" placeholder="Deskripsikan kerusakan secara mendetail agar memudahkan perbaikan..."></textarea>
            </div>

            <button type="submit" class="lf-btn-success w-full">Kirim Aspirasi</button>
        </form>

        <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-2">
            <div class="lf-card p-5">
                <p class="text-sm font-bold">Estimasi Respon</p>
                <p class="mt-2 text-sm text-slate-600">Tim sarana prasarana akan meninjau laporan Anda dalam waktu maksimal 2x24 jam kerja.</p>
            </div>
            <div class="lf-card p-5">
                <p class="text-sm font-bold">Privasi Terjaga</p>
                <p class="mt-2 text-sm text-slate-600">Laporan dapat dikirim secara anonim tanpa perlu melakukan login terlebih dahulu.</p>
            </div>
        </div>
    </section>
@endsection

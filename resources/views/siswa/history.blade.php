@extends('layouts.guest')

@section('title', 'Ajukan Aspirasi')

@section('guest-content')
    <section class="mx-auto max-w-3xl py-3">
        <h1 class="text-5xl font-extrabold tracking-tight">Sampaikan Aspirasi Anda</h1>
        <p class="mt-3 text-xl text-slate-600">Bantu kami menjaga kenyamanan belajar dengan melaporkan kerusakan fasilitas secara cepat dan transparan.</p>

        @if (session('success'))
            <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mt-6 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mt-6 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-900">
                <p class="font-semibold">Aspirasi belum terkirim:</p>
                <ul class="mt-2 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('siswa.aspirasi.store') }}" class="lf-card mt-8 space-y-5 p-7 md:p-8">
            @csrf

            <div>
                <label class="mb-2 block text-sm font-semibold">NIS</label>
                <input name="nis" type="text" inputmode="numeric" maxlength="8" pattern="[0-9]{8}" class="lf-input" placeholder="Contoh: 21090123" value="{{ old('nis') }}" required>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Kategori Kerusakan</label>
                <select name="kategori_id" class="lf-input" required>
                    <option value="">Pilih kategori...</option>
                    @forelse ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" @selected((int) old('kategori_id') === $kategori->id)>
                            {{ $kategori->ket_kategori }}
                        </option>
                    @empty
                        <option value="" disabled>Belum ada kategori tersedia</option>
                    @endforelse
                </select>

                @if ($kategoris->isEmpty())
                    <p class="mt-2 text-xs text-amber-700">Kategori belum tersedia. Hubungi admin untuk menambahkan data kategori terlebih dahulu.</p>
                @endif
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Lokasi Kerusakan</label>
                <input name="lokasi" type="text" class="lf-input" placeholder="Contoh: Ruang Lab Kimia, Lantai 2" value="{{ old('lokasi') }}" required>
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Detail Keluhan</label>
                <textarea name="keterangan" rows="5" class="lf-input" placeholder="Deskripsikan kerusakan secara mendetail agar memudahkan perbaikan..." required>{{ old('keterangan') }}</textarea>
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

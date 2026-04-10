@extends('layouts.admin')

@section('title', 'Detail Aspirasi')

@section('content')
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <section class="lf-card space-y-6 border-l-4 border-l-orange-600 p-6 xl:col-span-2">
            @if (session('success'))
                <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-wrap items-start justify-between gap-3">
                <div>
                    <p class="inline-flex rounded-md bg-orange-100 px-2 py-1 text-[11px] font-bold uppercase tracking-wide text-orange-700">Aspirasi Siswa</p>
                    <h2 class="mt-3 text-4xl font-extrabold leading-tight">{{ $aspirasi->inputAspirasi?->keterangan ?? 'Tanpa deskripsi' }}</h2>
                    <p class="mt-2 text-slate-500">Laporan ID: #ASP-{{ str_pad((string) $aspirasi->id, 5, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="text-right">
                    <p class="lf-label">Dikirim Pada</p>
                    <p class="text-2xl font-bold">{{ optional($aspirasi->inputAspirasi?->created_at)->format('d F Y H:i') ?? '-' }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <p class="lf-label">Nama Pelapor</p>
                    <p class="mt-2 text-2xl font-semibold">NIS {{ $aspirasi->inputAspirasi?->siswa?->nis ?? '-' }} ({{ $aspirasi->inputAspirasi?->siswa?->kelas ?? '-' }})</p>
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
                    <p class="lf-label">Status Saat Ini</p>
                    <p class="mt-2"><x-status-badge :status="$aspirasi->status" /></p>
                </div>
            </div>

            <div>
                <p class="lf-label">Deskripsi Keluhan</p>
                <p class="mt-3 rounded-xl bg-slate-100 p-4 text-base leading-relaxed text-slate-700">{{ $aspirasi->inputAspirasi?->keterangan ?? '-' }}</p>
            </div>
        </section>

        <aside class="space-y-5">
            <section class="lf-card p-6">
                <h3 class="text-3xl font-bold">Tindak Lanjut Admin</h3>
                <p class="mt-2 text-sm text-slate-500">Berikan respon dan update status aspirasi</p>

                <form method="POST" action="{{ route('admin.aspirasi.update', ['aspirasi' => $aspirasi->id]) }}" class="mt-5 space-y-4">
                    @csrf
                    @method('PATCH')

                    @if ($errors->any())
                        <div class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div>
                        <label class="lf-label">Update Status Aspirasi</label>
                        <select name="status" class="lf-input mt-2" required>
                            <option value="proses" @selected(old('status', $aspirasi->status) === 'proses')>Sedang Diproses</option>
                            <option value="menunggu" @selected(old('status', $aspirasi->status) === 'menunggu')>Menunggu</option>
                            <option value="selesai" @selected(old('status', $aspirasi->status) === 'selesai')>Selesai</option>
                        </select>
                    </div>
                    <div>
                        <label class="lf-label">Pesan Umpan Balik ke Siswa</label>
                        <textarea name="feedback" class="lf-input mt-2" rows="5" placeholder="Tuliskan alasan atau instruksi lebih lanjut untuk siswa..." required>{{ old('feedback', $aspirasi->feedback) }}</textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Kirim Notifikasi Email</span>
                        <button type="button" class="h-7 w-12 rounded-full bg-blue-600 text-xs font-semibold text-white">ON</button>
                    </div>
                    <button type="submit" class="lf-btn-primary w-full">Simpan Perubahan</button>
                </form>
            </section>

            <section class="lf-card p-5">
                <h3 class="lf-label">Aktivitas Terakhir</h3>
                <ul class="mt-3 space-y-3 text-sm text-slate-600">
                    <li>[Validasi] Admin Sarpras memvalidasi lokasi.</li>
                    <li>[Sistem] Sistem membuat tiket laporan.</li>
                </ul>
            </section>
        </aside>
    </div>
@endsection

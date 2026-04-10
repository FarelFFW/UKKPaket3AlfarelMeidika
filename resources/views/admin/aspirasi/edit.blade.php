@extends('layouts.admin')

@section('title', 'Tindak Lanjut Aspirasi')

@section('content')
    <section class="mx-auto max-w-4xl">
        <form method="POST" action="{{ route('admin.aspirasi.update', ['aspirasi' => $aspirasi->id]) }}" class="lf-card space-y-6 p-7">
            @csrf
            @method('PATCH')

            @if (session('success'))
                <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <p class="lf-label">Laporan</p>
                <h2 class="mt-2 text-3xl font-extrabold">#ASP-{{ str_pad((string) $aspirasi->id, 5, '0', STR_PAD_LEFT) }} - {{ $aspirasi->lokasi }}</h2>
            </div>

            <div>
                <label class="lf-label">Status Aspirasi</label>
                <select name="status" class="lf-input mt-2" required>
                    <option value="menunggu" @selected(old('status', $aspirasi->status) === 'menunggu')>Menunggu</option>
                    <option value="proses" @selected(old('status', $aspirasi->status) === 'proses')>Proses</option>
                    <option value="selesai" @selected(old('status', $aspirasi->status) === 'selesai')>Selesai</option>
                </select>
            </div>

            <div>
                <label class="lf-label">Umpan Balik untuk Siswa</label>
                <textarea name="feedback" rows="6" class="lf-input mt-2" placeholder="Tuliskan update perbaikan, estimasi selesai, atau arahan tambahan..." required>{{ old('feedback', $aspirasi->feedback) }}</textarea>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-3 text-sm text-slate-600">
                    <input type="checkbox" checked>
                    Kirim notifikasi ke pelapor
                </label>
                <button type="submit" class="lf-btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </section>
@endsection

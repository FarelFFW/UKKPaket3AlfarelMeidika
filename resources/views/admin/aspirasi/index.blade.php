@extends('layouts.admin')

@section('title', 'Daftar Aspirasi')

@section('content')
    <form method="GET" action="{{ route('admin.aspirasi.index.page') }}" class="mb-4 grid grid-cols-1 gap-3 md:grid-cols-5">
        <select name="status" class="lf-input">
            <option value="">Semua Status</option>
            <option value="menunggu" @selected(($status ?? '') === 'menunggu')>Menunggu</option>
            <option value="proses" @selected(($status ?? '') === 'proses')>Proses</option>
            <option value="selesai" @selected(($status ?? '') === 'selesai')>Selesai</option>
        </select>

        <select name="kategori_id" class="lf-input">
            <option value="">Semua Kategori</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" @selected((string) $kategoriId === (string) $kategori->id)>{{ $kategori->ket_kategori }}</option>
            @endforeach
        </select>

        <input type="date" name="tanggal" value="{{ $tanggal ?? '' }}" class="lf-input">

        <a href="{{ route('admin.aspirasi.index.page') }}" class="rounded-xl border border-slate-300 bg-white px-4 py-2 text-center text-sm font-semibold">Reset</a>
        <button type="submit" class="lf-btn-primary">Terapkan</button>
    </form>

    <div class="lf-card overflow-x-auto">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-4 py-3 font-semibold">ID</th>
                    <th class="px-4 py-3 font-semibold">Tanggal</th>
                    <th class="px-4 py-3 font-semibold">NIS</th>
                    <th class="px-4 py-3 font-semibold">Kategori</th>
                    <th class="px-4 py-3 font-semibold">Lokasi</th>
                    <th class="px-4 py-3 font-semibold">Status</th>
                    <th class="px-4 py-3 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aspirasis as $aspirasi)
                    <tr class="border-t border-slate-100">
                        <td class="px-4 py-4 font-semibold text-blue-700">#ASP-{{ str_pad((string) $aspirasi->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-4 py-4">{{ optional($aspirasi->inputAspirasi?->created_at)->format('d M Y H:i') ?? '-' }}</td>
                        <td class="px-4 py-4">{{ $aspirasi->inputAspirasi?->siswa?->nis ?? '-' }}</td>
                        <td class="px-4 py-4">{{ $aspirasi->inputAspirasi?->kategori?->ket_kategori ?? '-' }}</td>
                        <td class="px-4 py-4">{{ $aspirasi->lokasi }}</td>
                        <td class="px-4 py-4"><x-status-badge :status="$aspirasi->status" /></td>
                        <td class="px-4 py-4"><a href="{{ route('admin.aspirasi.show.page', ['aspirasi' => $aspirasi->id]) }}" class="text-blue-700">Lihat</a></td>
                    </tr>
                @empty
                    <tr class="border-t border-slate-100">
                        <td colspan="7" class="px-4 py-8 text-center text-slate-500">Belum ada data aspirasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-3">
        <article class="lf-card border-l-4 border-l-blue-700 p-5">
            <p class="lf-label">Total Menunggu</p>
            <p class="mt-2 text-4xl font-extrabold text-blue-700">{{ $totalMenunggu }}</p>
            <p class="mt-2 text-sm text-slate-500">Status menunggu</p>
        </article>
        <article class="lf-card border-l-4 border-l-amber-500 p-5">
            <p class="lf-label">Sedang Diproses</p>
            <p class="mt-2 text-4xl font-extrabold text-amber-600">{{ $totalProses }}</p>
            <p class="mt-2 text-sm text-slate-500">Status proses</p>
        </article>
        <article class="lf-card border-l-4 border-l-emerald-500 p-5">
            <p class="lf-label">Selesai (Minggu Ini)</p>
            <p class="mt-2 text-4xl font-extrabold text-emerald-600">{{ $totalSelesai }}</p>
            <p class="mt-2 text-sm text-slate-500">Status selesai</p>
        </article>
    </div>
@endsection

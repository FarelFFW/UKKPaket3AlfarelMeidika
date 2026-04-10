@extends('layouts.guest')

@section('title', 'Data Aspirasi Publik')

@section('guest-content')
    <section>
        <h1 class="text-5xl font-extrabold tracking-tight">Data Aspirasi Publik</h1>
        <p class="mt-3 max-w-3xl text-lg text-slate-600">Daftar laporan fasilitas sekolah yang diajukan oleh siswa. Transparansi untuk kenyamanan belajar bersama.</p>

        <form method="GET" action="{{ route('siswa.cek-status') }}" class="mt-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <input type="text" name="search" value="{{ $search ?? '' }}" class="lf-input max-w-lg" placeholder="Cari NIS atau lokasi...">
            <select name="status" class="lf-input max-w-xs">
                <option value="" @selected(empty($status))>Semua Status</option>
                <option value="menunggu" @selected(($status ?? '') === 'menunggu')>Menunggu</option>
                <option value="proses" @selected(($status ?? '') === 'proses')>Proses</option>
                <option value="selesai" @selected(($status ?? '') === 'selesai')>Selesai</option>
            </select>
            <div class="flex items-center gap-2 text-sm">
                <button type="submit" class="rounded-lg bg-blue-100 px-4 py-2 font-semibold text-blue-700">Terapkan</button>
                <a href="{{ route('siswa.cek-status') }}" class="rounded-lg bg-white px-4 py-2 text-slate-700">Reset</a>
            </div>
        </form>

        <div class="lf-card mt-6 overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-4 font-semibold">ID Laporan</th>
                        <th class="px-5 py-4 font-semibold">Tanggal</th>
                        <th class="px-5 py-4 font-semibold">NIS</th>
                        <th class="px-5 py-4 font-semibold">Kategori</th>
                        <th class="px-5 py-4 font-semibold">Lokasi</th>
                        <th class="px-5 py-4 font-semibold">Status</th>
                        <th class="px-5 py-4 font-semibold">Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($aspirasis as $aspirasi)
                        <tr class="border-t border-slate-100">
                            <td class="px-5 py-4 font-semibold text-blue-700">#LP-{{ str_pad((string) $aspirasi->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-5 py-4">{{ optional($aspirasi->inputAspirasi?->created_at)->format('d M Y H:i') ?? '-' }}</td>
                            <td class="px-5 py-4">{{ $aspirasi->inputAspirasi?->siswa?->nis ?? '-' }}</td>
                            <td class="px-5 py-4">{{ $aspirasi->inputAspirasi?->kategori?->ket_kategori ?? '-' }}</td>
                            <td class="px-5 py-4">{{ $aspirasi->lokasi }}</td>
                            <td class="px-5 py-4"><x-status-badge :status="$aspirasi->status" /></td>
                            <td class="px-5 py-4">
                                @if ($aspirasi->status === 'selesai')
                                    <a href="{{ route('siswa.feedback.show', ['aspirasi' => $aspirasi->id]) }}" class="rounded-lg bg-blue-700 px-3 py-2 text-xs font-semibold text-white">Lihat Feedback</a>
                                @else
                                    <span class="text-xs text-slate-400">Tersedia setelah selesai</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr class="border-t border-slate-100">
                            <td colspan="7" class="px-5 py-8 text-center text-slate-500">Belum ada data aspirasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection

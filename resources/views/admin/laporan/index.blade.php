@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold">Umpan Balik Aspirasi Selesai</h1>
            <p class="mt-1 text-sm text-slate-500">Daftar aspirasi yang sudah selesai dan feedback yang diberikan admin.</p>
        </div>
        <div class="rounded-xl bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">
            Total selesai: {{ $totalSelesai }}
        </div>
    </div>

    <div class="lf-card overflow-x-auto">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="px-5 py-4 font-semibold">ID</th>
                    <th class="px-5 py-4 font-semibold">NIS</th>
                    <th class="px-5 py-4 font-semibold">Kategori</th>
                    <th class="px-5 py-4 font-semibold">Lokasi</th>
                    <th class="px-5 py-4 font-semibold">Dikirim Pada</th>
                    <th class="px-5 py-4 font-semibold">Feedback Admin</th>
                    <th class="px-5 py-4 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aspirasis as $aspirasi)
                    <tr class="border-t border-slate-100 align-top">
                        <td class="px-5 py-4 font-semibold text-blue-700">#ASP-{{ str_pad((string) $aspirasi->id, 5, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-5 py-4">{{ $aspirasi->inputAspirasi?->siswa?->nis ?? '-' }}</td>
                        <td class="px-5 py-4">{{ $aspirasi->inputAspirasi?->kategori?->ket_kategori ?? '-' }}</td>
                        <td class="px-5 py-4">{{ $aspirasi->lokasi }}</td>
                        <td class="px-5 py-4 text-slate-500">{{ optional($aspirasi->inputAspirasi?->created_at)->format('d M Y H:i') ?? '-' }}</td>
                        <td class="px-5 py-4">
                            <div class="max-w-md rounded-xl bg-slate-50 p-4 text-slate-700">
                                {{ $aspirasi->feedback ?: 'Belum ada feedback.' }}
                            </div>
                        </td>
                        <td class="px-5 py-4">
                            <a href="{{ route('admin.aspirasi.show.page', ['aspirasi' => $aspirasi->id]) }}" class="text-blue-700">Lihat Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr class="border-t border-slate-100">
                        <td colspan="7" class="px-5 py-8 text-center text-slate-500">Belum ada aspirasi berstatus selesai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

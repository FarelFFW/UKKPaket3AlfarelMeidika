@extends('layouts.admin')

@section('title', 'Tindak Lanjut Aspirasi')

@section('content')
    <section class="mx-auto max-w-4xl">
        <form class="lf-card space-y-6 p-7">
            <div>
                <p class="lf-label">Laporan</p>
                <h2 class="mt-2 text-3xl font-extrabold">#ASP-2024-089 - Kerusakan Plafon Ruang Lab</h2>
            </div>

            <div>
                <label class="lf-label">Status Aspirasi</label>
                <select class="lf-input mt-2">
                    <option value="menunggu">Menunggu</option>
                    <option value="proses" selected>Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <div>
                <label class="lf-label">Umpan Balik untuk Siswa</label>
                <textarea rows="6" class="lf-input mt-2" placeholder="Tuliskan update perbaikan, estimasi selesai, atau arahan tambahan..."></textarea>
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

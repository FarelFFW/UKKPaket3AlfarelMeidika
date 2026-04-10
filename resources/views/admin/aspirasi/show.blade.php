@extends('layouts.admin')

@section('title', 'Detail Aspirasi')

@section('content')
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
        <section class="lf-card space-y-6 border-l-4 border-l-orange-600 p-6 xl:col-span-2">
            <div class="flex flex-wrap items-start justify-between gap-3">
                <div>
                    <p class="inline-flex rounded-md bg-orange-100 px-2 py-1 text-[11px] font-bold uppercase tracking-wide text-orange-700">Urgensi: Tinggi</p>
                    <h2 class="mt-3 text-4xl font-extrabold leading-tight">Kerusakan Plafon Ruang Lab Fisika</h2>
                    <p class="mt-2 text-slate-500">Laporan ID: #ASP-2024-089</p>
                </div>
                <div class="text-right">
                    <p class="lf-label">Dikirim Pada</p>
                    <p class="text-2xl font-bold">24 Oktober 2023</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <p class="lf-label">Nama Pelapor</p>
                    <p class="mt-2 text-2xl font-semibold">Aditya Pratama (XI-IPA 2)</p>
                </div>
                <div>
                    <p class="lf-label">Kategori</p>
                    <p class="mt-2 text-2xl font-semibold">Sarana & Prasarana</p>
                </div>
                <div>
                    <p class="lf-label">Lokasi</p>
                    <p class="mt-2 text-2xl font-semibold">Gedung B, Lantai 2, Ruang 204</p>
                </div>
                <div>
                    <p class="lf-label">Status Saat Ini</p>
                    <p class="mt-2"><x-status-badge status="proses" /></p>
                </div>
            </div>

            <div>
                <p class="lf-label">Deskripsi Keluhan</p>
                <p class="mt-3 rounded-xl bg-slate-100 p-4 text-base leading-relaxed text-slate-700">"Izin melaporkan, plafon di pojok kanan depan Lab Fisika terlihat mulai rapuh dan ada rembesan air saat hujan lebat kemarin. Mengingat di bawahnya terdapat meja praktikum yang sering digunakan, kami khawatir plafon tersebut bisa jatuh tiba-tiba dan membahayakan siswa."</p>
            </div>
        </section>

        <aside class="space-y-5">
            <section class="lf-card p-6">
                <h3 class="text-3xl font-bold">Tindak Lanjut Admin</h3>
                <p class="mt-2 text-sm text-slate-500">Berikan respon dan update status aspirasi</p>

                <div class="mt-5 space-y-4">
                    <div>
                        <label class="lf-label">Update Status Aspirasi</label>
                        <select class="lf-input mt-2">
                            <option>Sedang Diproses</option>
                            <option>Menunggu</option>
                            <option>Selesai</option>
                        </select>
                    </div>
                    <div>
                        <label class="lf-label">Pesan Umpan Balik ke Siswa</label>
                        <textarea class="lf-input mt-2" rows="5" placeholder="Tuliskan alasan atau instruksi lebih lanjut untuk siswa..."></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Kirim Notifikasi Email</span>
                        <button type="button" class="h-7 w-12 rounded-full bg-blue-600 text-xs font-semibold text-white">ON</button>
                    </div>
                    <a href="{{ route('admin.aspirasi.edit.page', ['id' => ($id ?? 1)]) }}" class="lf-btn-primary w-full">Simpan Perubahan</a>
                </div>
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

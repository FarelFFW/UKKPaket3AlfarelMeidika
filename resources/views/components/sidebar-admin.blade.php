<aside class="hidden w-72 border-r border-slate-200 bg-slate-50 md:flex md:flex-col">
    <div class="border-b border-slate-200 px-6 py-6">
        <p class="text-3xl font-extrabold tracking-tight text-slate-900">LaporFasilitas</p>
        <p class="mt-1 text-[11px] font-semibold uppercase tracking-[0.15em] text-slate-400">Sistem Aspirasi Sekolah</p>
    </div>

    <nav class="flex-1 space-y-2 px-3 py-5 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-700 hover:bg-white' }}">Beranda</a>
        <a href="{{ route('admin.aspirasi.index.page') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 font-medium {{ request()->routeIs('admin.aspirasi.*') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-700 hover:bg-white' }}">Riwayat</a>
        <a href="{{ route('admin.kategori.index.page') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 font-medium {{ request()->routeIs('admin.kategori.*') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-700 hover:bg-white' }}">Kategori</a>
        <a href="{{ route('admin.laporan.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 font-medium {{ request()->routeIs('admin.laporan.*') ? 'bg-white text-blue-700 shadow-sm' : 'text-slate-700 hover:bg-white' }}">Umpan Balik</a>
    </nav>

    <div class="p-4">
        <div class="lf-card flex items-center gap-3 p-3">
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-700 text-xs font-bold text-white">AD</div>
            <div>
                <p class="text-sm font-semibold">Admin Panel</p>
                <p class="text-xs text-slate-500">Administrator</p>
            </div>
        </div>
    </div>
</aside>

<header class="border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 py-4 md:px-8">
        <a href="{{ route('siswa.index') }}" class="text-2xl font-extrabold tracking-tight text-slate-900">LaporFasilitas</a>

        <nav class="hidden items-center gap-8 text-sm font-medium text-slate-500 md:flex">
            <a href="{{ route('siswa.index') }}" class="{{ request()->routeIs('siswa.index') ? 'text-blue-700 underline decoration-2 underline-offset-8' : 'hover:text-slate-900' }}">Beranda</a>
            <a href="{{ route('siswa.cek-status') }}" class="{{ request()->routeIs('siswa.cek-status') ? 'text-blue-700 underline decoration-2 underline-offset-8' : 'hover:text-slate-900' }}">Panduan</a>
        </nav>

        @if (request()->routeIs('siswa.index'))
            <a href="{{ route('admin.login.form') }}" class="lf-btn-primary">Login Admin</a>
        @else
            <a href="{{ route('siswa.history') }}" class="lf-btn-primary">Buat Laporan</a>
        @endif
    </div>
</header>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body class="lf-shell min-h-screen text-slate-900">
    <div class="flex min-h-screen">
        @include('components.sidebar-admin')

        <div class="flex min-w-0 flex-1 flex-col">
            <header class="flex items-center justify-between border-b border-slate-200 bg-white px-5 py-4 md:px-8">
                <h1 class="text-xl font-semibold tracking-tight">@yield('title', 'Admin')</h1>
                <div class="flex items-center gap-4 text-sm text-slate-500">
                    <span class="hidden items-center gap-2 md:inline-flex">
                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                        Sistem Online
                    </span>
                    <span class="h-8 w-8 rounded-full bg-slate-100 text-center text-xs leading-8">NOTIF</span>
                    <span class="h-8 w-8 rounded-full bg-slate-100 text-center text-xs leading-8">USER</span>
                </div>
            </header>

            <main class="flex-1 p-4 md:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>

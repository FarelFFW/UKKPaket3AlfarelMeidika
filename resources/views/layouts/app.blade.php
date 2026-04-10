<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aspirasi Sekolah')</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body class="lf-shell min-h-screen text-slate-900 @yield('body-class')">
    @include('components.navbar')

    <main class="mx-auto w-full max-w-7xl px-4 py-8 md:px-8">
        @yield('content')
    </main>

    @include('components.footer')
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>

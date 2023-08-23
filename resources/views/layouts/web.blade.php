<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'URBE University Admissions') }}</title>
        <meta name="description" content="Get your degree at URBE University. Apply today!">
        <link rel="shortcut icon" href="{{ asset('urbe-logo.svg') }}" type="image/x-icon">

        <!-- Fonts -->
        @vite('resources/css/app.css')
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="MOMNNCBJ" defer></script>
        <!-- / Fathom -->
        @livewireStyles
        @vite('resources/js/app.js')
    </head>
    <body class="font-sans antialiased">

        <main class="min-h-screen text-[#101820]">
            @yield('content')
        </main>
        @include('web.partials.footer')

        @stack('modals')

        @livewireScripts
    </body>
</html>

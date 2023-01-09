<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('urbe-logo.svg') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        @vite('resources/css/app.css')
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

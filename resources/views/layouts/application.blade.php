<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="font-sans antialiased">

        <main class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        {{-- Contact Bubble --}}
        @include('partials.help')

        @stack('modals')
        @vite('resources/js/app.js')
        @livewireScripts
    </body>
</html>

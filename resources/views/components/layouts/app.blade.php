<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'PDf Vizualizer' }}</title>

        @livewireStyles
        @vite('resources/css/app.css')
        @stack('styles')

    </head>
    <body class="p-4">
        <header>
            <span>
                <x-css-menu />
            </span>
        </header>

        <main>{{ $slot }}</main>

        @livewireScripts
        @vite('resources/js/app.js')
        @stack('scripts')

    </body>
</html>

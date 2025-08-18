<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'PDF Vizualizer' }}</title>

        @livewireStyles
        @vite('resources/css/app.css')
        @stack('styles')

    </head>
    <body>
        <div class="app">
            <header>
                <nav>
                    <ul>
                        <li>
                            <x-css-file />
                        </li>
                        <li>
                            <x-css-file />
                        </li>
                        <li>
                            <x-css-file />
                        </li>
                        <li>
                            <x-css-file />
                        </li>
                    </ul>
                </nav>
            </header>
            <main>
                <div class="py-4">{{ $slot }}</div>
            </main>
        </div>

        @livewireScripts
        @vite('resources/js/app.js')
        @stack('scripts')

    </body>
</html>

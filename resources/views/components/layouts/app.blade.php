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
                            <a href="{{ route('document.create') }}" wire:navigate>
                                <abbr title="Gerar folha de pagamento">
                                        <x-css-add />
                                </abbr>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('document.search') }}" wire:navigate>
                                <abbr title="Buscar folha de pagamento">
                                    <x-css-search />
                                </abbr>
                            </a>
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

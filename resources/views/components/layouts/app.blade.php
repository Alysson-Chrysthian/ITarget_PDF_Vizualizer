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
                            <span class="menu-dropdown">
                                <x-css-add />
                            </span>
                            <ul class="submenu hidden">
                                <li>
                                    <a href="{{ route('documents.create') }}">
                                        Adicionar documento
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span class="menu-dropdown">
                                <x-css-search />
                            </span>
                            <ul class="submenu hidden">
                                <li>
                                    <a href="{{ route('documents.search') }}">
                                        Buscar documento
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('instituitions.search') }}">
                                        Buscar orgao
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('creditors.search') }}">
                                        Buscar credor
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
            <main>
                <div class="py-4">{{ $slot }}</div>
            </main>
        </div>

        <x-toaster-hub />

        @livewireScripts
        @vite('resources/js/app.js')
        @stack('scripts')

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const menus_dropdown = document.querySelectorAll('.menu-dropdown');

                menus_dropdown.forEach((element) => {
                    element.addEventListener('click', (event) => {
                        const submenu = element.nextElementSibling;

                        submenu.classList.toggle('hidden');
                    });
                });
            });
        </script>

    </body>
</html>
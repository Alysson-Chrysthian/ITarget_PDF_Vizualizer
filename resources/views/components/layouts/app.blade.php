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
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('documents.search') }}">
                                Documentos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('instituitions.search') }}">
                                Orgaos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('creditors.search') }}">
                                Credores
                            </a>
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
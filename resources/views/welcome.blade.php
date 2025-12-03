<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'CIFP Francesc de Borja Moll') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
        <header class="w-full py-4 px-6 lg:px-8">
            @if (Route::has('login'))
                <nav class="flex items-center justify-between max-w-7xl mx-auto">
                    <div class="flex items-center">
                        <svg class="w-10 h-10 text-blue-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/>
                        </svg>
                        <span class="ml-2 text-xl font-bold text-gray-800">CIFP Francesc de Borja Moll</span>
                    </div>
                    <div class="flex items-center gap-4">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="inline-block px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium"
                            >
                                Panel de Control
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="inline-block px-5 py-2 text-gray-700 hover:text-blue-600 transition font-medium"
                            >
                                Iniciar Sessió
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="inline-block px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium"
                                >
                                    Registrar-se
                                </a>
                            @endif
                        @endauth
                    </div>
                </nav>
            @endif
        </header>

        <main class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
            <!-- Hero Section -->
            <div class="text-center mb-16">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                    Benvingut al <span class="text-blue-600">CIFP Francesc de Borja Moll</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-8">
                    Aplicació de demostració d'autenticació amb Laravel Breeze - Curs 2025-2026
                </p>
                <div class="flex justify-center gap-4">
                    @guest
                        <a href="{{ route('register') }}" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold text-lg">
                            Començar Ara
                        </a>
                        <a href="{{ route('login') }}" class="px-8 py-3 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition font-semibold text-lg">
                            Ja tinc compte
                        </a>
                    @else
                        <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold text-lg">
                            Anar al Panel
                        </a>
                    @endguest
                </div>
            </div>

            <!-- Features Section -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Registre d'Usuaris</h3>
                    <p class="text-gray-600">Sistema complet de registre amb validació de dades i confirmació per correu electrònic.</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Autenticació Segura</h3>
                    <p class="text-gray-600">Inici de sessió segur amb protecció contra atacs i recuperació de contrasenya.</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Gestió de Perfil</h3>
                    <p class="text-gray-600">Edició de dades personals, canvi de contrasenya i eliminació de compte.</p>
                </div>
            </div>

            <!-- Links Section -->
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Enllaços del Centre</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="https://curs25-26.cifpfbmoll.eu/" target="_blank" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition group">
                        <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900 group-hover:text-blue-600">Web del Centre</h4>
                            <p class="text-sm text-gray-500">Notícies i informació</p>
                        </div>
                    </a>

                    <a href="https://aulavirtual.caib.es/c07015884/" target="_blank" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition group">
                        <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900 group-hover:text-green-600">Moodle</h4>
                            <p class="text-sm text-gray-500">Aula virtual</p>
                        </div>
                    </a>

                    <a href="https://fpadistancia.caib.es/" target="_blank" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition group">
                        <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900 group-hover:text-purple-600">FP Virtual</h4>
                            <p class="text-sm text-gray-500">Formació a distància</p>
                        </div>
                    </a>

                    <a href="https://curs25-26.cifpfbmoll.eu/admissio/" target="_blank" class="flex items-center p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition group">
                        <svg class="w-8 h-8 text-orange-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                        <div>
                            <h4 class="font-semibold text-gray-900 group-hover:text-orange-600">Admissió</h4>
                            <p class="text-sm text-gray-500">Matrícula i inscripció</p>
                        </div>
                    </a>
                </div>
            </div>
        </main>

        <footer class="max-w-7xl mx-auto px-6 lg:px-8 py-8 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} CIFP Francesc de Borja Moll - Aplicació de demostració amb Laravel Breeze</p>
            <p class="mt-2 text-sm">
                <a href="https://laravel.com/docs" target="_blank" class="hover:text-blue-600">Laravel Docs</a>
                &middot;
                <a href="https://laravel.com/docs/starter-kits#laravel-breeze" target="_blank" class="hover:text-blue-600">Laravel Breeze</a>
            </p>
        </footer>
    </body>
</html>

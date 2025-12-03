<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Benvingut/da al CIFP Francesc de Borja Moll!</h3>
                    <p class="mb-4">Has iniciat sessió correctament. Aquesta és una aplicació de demostració d'autenticació amb Laravel Breeze.</p>
                    
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <a href="https://curs25-26.cifpfbmoll.eu/" target="_blank" class="block p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                            <h4 class="font-semibold text-blue-700">Web del Centre</h4>
                            <p class="text-sm text-gray-600">Notícies i informació general</p>
                        </a>
                        <a href="https://aulavirtual.caib.es/c07015884/" target="_blank" class="block p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                            <h4 class="font-semibold text-green-700">Moodle</h4>
                            <p class="text-sm text-gray-600">Aula virtual del centre</p>
                        </a>
                        <a href="https://fpadistancia.caib.es/" target="_blank" class="block p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                            <h4 class="font-semibold text-purple-700">FP Virtual</h4>
                            <p class="text-sm text-gray-600">Formació a distància</p>
                        </a>
                        <a href="https://curs25-26.cifpfbmoll.eu/admissio/" target="_blank" class="block p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
                            <h4 class="font-semibold text-orange-700">Admissió</h4>
                            <p class="text-sm text-gray-600">Procés d'admissió i matrícula</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

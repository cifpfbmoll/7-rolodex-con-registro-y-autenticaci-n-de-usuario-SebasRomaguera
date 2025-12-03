<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                📥 {{ __('Importar Contactos desde CSV') }}
            </h2>
            <a href="{{ route('contacts.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                ← Volver
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="csv_file">
                                📁 Archivo CSV
                            </label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none @error('csv_file') border-red-500 @enderror" 
                                   id="csv_file" 
                                   name="csv_file" 
                                   type="file" 
                                   accept=".csv,.txt"
                                   required>
                            @error('csv_file')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">Selecciona un archivo CSV (máximo 2MB)</p>
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" class="flex-1 text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                📥 Importar Contactos
                            </button>
                            <a href="{{ route('contacts.index') }}" class="flex-1 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Formato del archivo CSV</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <p class="mb-2">El archivo debe tener el siguiente formato:</p>
                            <div class="bg-white rounded p-3 font-mono text-xs">
                                Name,Phone,Email<br>
                                Juan Pérez,+34600123456,juan@example.com<br>
                                María García,+34600789012,maria@example.com
                            </div>
                            <ul class="list-disc list-inside space-y-1 mt-3">
                                <li>Primera línea: cabecera (Name, Phone, Email)</li>
                                <li>Las siguientes líneas: datos de contactos</li>
                                <li>El nombre es obligatorio</li>
                                <li>Teléfono y email son opcionales</li>
                                <li>Los contactos se importarán asociados a tu cuenta</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

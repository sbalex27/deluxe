<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Expediente') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <form action="{{ route('expedientes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Selección de Empleado -->
                    <div class="mb-4">
                        <label for="empleado_id" class="block text-gray-700 font-medium mb-2">Empleado</label>
                        <select name="empleado_id" id="empleado_id" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Detalles del Expediente -->
                    <div class="mb-4">
                        <label for="detalles" class="block text-gray-700 font-medium mb-2">Detalles</label>
                        <textarea name="detalles" id="detalles" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required></textarea>
                    </div>

                    <!-- Campo de imagen -->
                    <div class="mb-4">
                        <label for="imagen" class="block text-gray-700 font-medium mb-2">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" accept="image/*">
                    </div>

                    <!-- Botón de Guardar -->
                    <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition duration-200">Guardar</button>
                    
                    <!-- Botón de Cancelar -->
                    <a href="{{ route('expedientes.index') }}" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
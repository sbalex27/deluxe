<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Permiso') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                @if(session('mensaje'))
                    <div class="mb-4 p-4 text-green-700 bg-green-100 rounded" role="alert">
                        {{ session('mensaje') }}
                    </div>
                @endif

                <form action="{{ route('permisos.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="empleado_id" class="block text-gray-700 font-medium mb-2">Empleado</label>
                        <select name="empleado_id" id="empleado_id" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tipo" class="block text-gray-700 font-medium mb-2">Tipo</label>
                        <input type="text" name="tipo" id="tipo" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                    </div>

                    <div class="mb-4">
                        <label for="fecha_inicio" class="block text-gray-700 font-medium mb-2">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                    </div>

                    <div class="mb-4">
                        <label for="fecha_fin" class="block text-gray-700 font-medium mb-2">Fecha de Fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">Guardar</button>
                    <a href="{{ route('permisos.index') }}" class="w-full mt-2 inline-block text-center bg-gray-500 text-white py-2 rounded-md hover:bg-gray-600 transition duration-200">Regresar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
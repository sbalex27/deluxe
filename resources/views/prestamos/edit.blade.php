<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Préstamo') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <form action="{{ route('prestamos.update', $prestamo) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Selección de Empleado -->
                    <div class="mb-4">
                        <label for="empleado_id" class="block text-gray-700 font-medium mb-2">Empleado</label>
                        <select name="empleado_id" id="empleado_id" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id }}" {{ $empleado->id == $prestamo->empleado_id ? 'selected' : '' }}>
                                    {{ $empleado->nombre }} {{ $empleado->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Monto -->
                    <div class="mb-4">
                        <label for="monto" class="block text-gray-700 font-medium mb-2">Monto</label>
                        <input type="number" name="monto" id="monto" value="{{ $prestamo->monto }}" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required step="0.01">
                    </div>

                    <!-- Fecha de Otorgamiento -->
                    <div class="mb-4">
                        <label for="fecha_otorgamiento" class="block text-gray-700 font-medium mb-2">Fecha de Otorgamiento</label>
                        <input type="date" name="fecha_otorgamiento" id="fecha_otorgamiento" value="{{ $prestamo->fecha_otorgamiento }}" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                    </div>

                    <!-- Botones -->
                    <button type="submit" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Actualizar</button>
                    <a href="{{ route('prestamos.index') }}" class="block text-center bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition mt-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
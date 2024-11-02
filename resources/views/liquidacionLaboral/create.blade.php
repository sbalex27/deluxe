<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Liquidación Laboral') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <form action="{{ route('liquidacion-laboral.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="empleado_id" class="block text-sm font-medium text-gray-700">Empleado</label>
                        <select id="empleado_id" name="empleado_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                            <option value="">Seleccionar Empleado</option>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                            @endforeach
                        </select>
                        @error('empleado_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="monto" class="block text-sm font-medium text-gray-700">Monto</label>
                        <input type="text" id="monto" name="monto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                        @error('monto')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="fecha_liquidacion" class="block text-sm font-medium text-gray-700">Fecha de Liquidación</label>
                        <input type="date" id="fecha_liquidacion" name="fecha_liquidacion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required>
                        @error('fecha_liquidacion')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Crear Liquidación Laboral</button>
                        <a href="{{ route('liquidacion-laboral.index') }}" class="mt-2 inline-block text-center bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
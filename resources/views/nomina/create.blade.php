<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nómina') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <form action="{{ route('nomina.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="empleado_id" class="block text-gray-700">Empleado</label>
                        <select name="empleado_id" id="empleado_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">Seleccionar Empleado</option>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                            @endforeach
                        </select>
                        @error('empleado_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="salario" class="block text-gray-700">Salario</label>
                        <input type="text" name="salario" id="salario" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('salario') }}" required>
                        @error('salario')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="fecha_pago" class="block text-gray-700">Fecha de Pago</label>
                        <input type="date" name="fecha_pago" id="fecha_pago" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('fecha_pago') }}" required>
                        @error('fecha_pago')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Crear Nómina</button>
                    <a href="{{ route('nomina.index') }}" class="mt-2 inline-block text-center bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-200">Regresar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
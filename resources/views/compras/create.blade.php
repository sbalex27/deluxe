<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Compra') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <form action="{{ route('compras.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div class="mb-4">
                        <label for="empleado_id" class="block text-gray-700 font-bold mb-2">Empleado</label>
                        <select name="empleado_id" id="empleado_id" class="block w-full border-gray-300 rounded-md shadow-sm" required>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="monto" class="block text-gray-700 font-bold mb-2">Monto</label>
                        <input type="number" name="monto" id="monto" class="block w-full border-gray-300 rounded-md shadow-sm" required step="0.01">
                    </div>

                    <div class="mb-4">
                        <label for="fecha_compra" class="block text-gray-700 font-bold mb-2">Fecha de Compra</label>
                        <input type="date" name="fecha_compra" id="fecha_compra" class="block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Guardar</button>
                        <a href="{{ route('compras.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-200">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
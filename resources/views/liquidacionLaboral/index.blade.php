<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liquidaciones Laborales') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('liquidacion-laboral.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">
                        Crear Liquidación Laboral
                    </a>
                </div>

                @if(session('success'))
                    <div class="mt-4 text-green-600 bg-green-100 border border-green-300 rounded-md p-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Empleado</th>
                                <th class="py-3 px-4 border-b">Monto</th>
                                <th class="py-3 px-4 border-b">Fecha de Liquidación</th>
                                <th class="py-3 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($liquidaciones as $liquidacion)
                                <tr class="hover:bg-gray-100 transition duration-200">
                                    <td class="py-2 px-4 border-b text-center">{{ $liquidacion->id }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $liquidacion->empleado->nombre }} {{ $liquidacion->empleado->apellido }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $liquidacion->monto }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $liquidacion->fecha_liquidacion->format('Y-m-d') }}</td>
                                    <td class="py-2 px-4 border-b text-center flex justify-center space-x-2">
                                        <a href="{{ route('liquidacion-laboral.edit', $liquidacion->id) }}" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Editar</a>
                                        <form action="{{ route('liquidacion-laboral.destroy', $liquidacion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta liquidación?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
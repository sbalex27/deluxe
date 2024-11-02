<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Préstamos') }}
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

                <a href="{{ route('prestamos.create') }}" class="inline-block mb-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Crear Nuevo Préstamo</a>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Empleado</th>
                                <th class="py-3 px-4 border-b">Monto</th>
                                <th class="py-3 px-4 border-b">Fecha de Otorgamiento</th>
                                <th class="py-3 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestamos as $prestamo)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b">{{ $prestamo->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $prestamo->empleado->nombre }} {{ $prestamo->empleado->apellido }}</td>
                                    <td class="py-2 px-4 border-b">Q{{ number_format($prestamo->monto, 2) }}</td>
                                    <td class="py-2 px-4 border-b">{{ $prestamo->fecha_otorgamiento }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('prestamos.edit', $prestamo) }}" class="text-yellow-600 hover:underline">Editar</a>
                                        <form action="{{ route('prestamos.destroy', $prestamo) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
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
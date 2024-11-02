<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Compras') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="container mx-auto py-6 max-w-3xl bg-white rounded-lg shadow-lg p-6 bg-opacity-80">
            @if(session('mensaje'))
                <div class="text-green-600 bg-green-100 border border-green-300 rounded-md p-4 mb-4">
                    {{ session('mensaje') }}
                </div>
            @endif
            <a href="{{ route('compras.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Crear Nueva Compra</a>
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4">ID</th>
                        <th class="py-2 px-4">Empleado</th>
                        <th class="py-2 px-4">Descripción</th>
                        <th class="py-2 px-4">Monto</th>
                        <th class="py-2 px-4">Fecha de Compra</th>
                        <th class="py-2 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compras as $compra)
                        <tr>
                            <td class="py-2 px-4">{{ $compra->id }}</td>
                            <td class="py-2 px-4">{{ $compra->empleado->nombre }} {{ $compra->empleado->apellido }}</td>
                            <td class="py-2 px-4">{{ $compra->descripcion }}</td>
                            <td class="py-2 px-4">Q {{ number_format($compra->monto, 2) }}</td>
                            <td class="py-2 px-4">{{ $compra->fecha_compra }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('compras.edit', $compra) }}" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Editar</a>
                                <form action="{{ route('compras.destroy', $compra) }}" method="POST" style="display:inline;">
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
</x-app-layout>
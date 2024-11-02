@component('layouts.app')

@section('content')

<style>
    /* Estilo para el fondo */
    .bg-custom {
        background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg');
        background-size: cover;
        background-position: center;
    }
</style>

<div class="bg-custom bg-black bg-opacity-50 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white bg-opacity-80 max-w-6xl mx-auto p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Lista de Empleados</h2>

        @if(session('mensaje'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('mensaje') }}
            </div>
        @endif

        <a href="{{ route('empleados.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition mb-4 inline-block">
            Crear Nuevo Empleado
        </a>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Nombre</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Apellido</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Fecha de Contratación</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b border-gray-300">{{ $empleado->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $empleado->nombre }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $empleado->apellido }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $empleado->fecha_contratacion }}</td>

                        <td class="py-2 px-4 border-b border-gray-300">
                            <a href="{{ route('empleados.edit', $empleado) }}" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Editar</a>

                            <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $empleados->links() }} <!-- Esto generará los enlaces de paginación -->
        </div>
    </div>
</div>

@endcomponent
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del expediente') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <div class="mb-3">
                    <strong>ID:</strong> {{ $expediente->id }}
                </div>
                <div class="mb-3">
                    <strong>Empleado:</strong> {{ $expediente->empleado->nombre }} {{ $expediente->empleado->apellido }}
                </div>
                <div class="mb-3">
                    <strong>Detalles:</strong>
                    <p>{{ $expediente->detalles }}</p>
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('expedientes.index') }}" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Volver a la lista</a>
                    <a href="{{ route('expedientes.edit', $expediente) }}" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Editar</a>
                    <form action="{{ route('expedientes.destroy', $expediente) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-md px-4 py-2 bg-red-500 text-white hover:bg-red-600 transition" onclick="return confirm('¿Quieres eliminar este expediente?')">Borrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
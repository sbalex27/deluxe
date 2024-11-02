<x-app-layout>

@section('content')
<style>
    /* Estilo para el fondo */
    .bg-custom {
        background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); /* Cambia esta ruta a la imagen que desees */
        background-size: cover;
        background-position: center;
        padding: 20px; /* Espaciado interno */
    }
</style>

<div class="max-w-lg mx-auto p-6 bg-custom rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Editar Expediente</h2>
    
    <form action="{{ route('expedientes.update', $expediente) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Selección de Empleado -->
        <div class="mb-4">
            <label for="empleado_id" class="block text-gray-700 font-medium mb-2">Empleado</label>
            <select name="empleado_id" id="empleado_id" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id }}" {{ $empleado->id == $expediente->empleado_id ? 'selected' : '' }}>
                        {{ $empleado->nombre }} {{ $empleado->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Detalles del Expediente -->
        <div class="mb-4">
            <label for="detalles" class="block text-gray-700 font-medium mb-2">Detalles</label>
            <textarea name="detalles" id="detalles" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" required>{{ $expediente->detalles }}</textarea>
        </div>

        <!-- Botón de Actualizar -->
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition duration-200">Actualizar</button>
        
        <!-- Botón de Cancelar -->
        <a href="{{ route('expedientes.index') }}" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Cancelar</a>
    </form>
</div>


</x-app-layout>
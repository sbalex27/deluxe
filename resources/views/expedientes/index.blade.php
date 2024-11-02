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
    <div class="bg-white bg-opacity-80 max-w-lg mx-auto p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Selecciona un Empleado para Ver su Expediente</h2>

        @if(session('mensaje'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('mensaje') }}
            </div>
        @endif

        <form action="{{ route('expedientes.ver') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="empleado_id" class="block text-gray-700 font-semibold mb-2">Empleado</label>
                <select name="empleado_id" id="empleado_id" class="form-control border border-gray-300 rounded-md p-2 w-full" required>
                    <option value="">Selecciona un empleado</option>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Información a Ver</label>
                <div>
                    <label><input type="radio" name="tipo_info" value="personal" required> Información Personal</label>
                </div>
                <div>
                    <label><input type="radio" name="tipo_info" value="laboral" required> Información Laboral</label>
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Ver Información</button>
        </form>
    </div>
</div>


@endcomponent
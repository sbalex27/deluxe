@component('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-cover bg-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg');">
    <div class="bg-white bg-opacity-80 max-w-lg mx-auto p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Editar Empleado</h2>

        @if(session('mensaje'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('mensaje') }}
            </div>
        @endif

        <form action="{{ url('/empleados/' . $empleado->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Esto indica que es una actualización -->

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" class="form-control border border-gray-300 rounded-md p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="apellido" class="block text-gray-700 font-semibold mb-2">Apellido</label>
                <input type="text" name="apellido" value="{{ old('apellido', $empleado->apellido) }}" class="form-control border border-gray-300 rounded-md p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="fecha_contratacion" class="block text-gray-700 font-semibold mb-2">Fecha de Contratación</label>
                <input type="date" name="fecha_contratacion" value="{{ old('fecha_contratacion', $empleado->fecha_contratacion) }}" class="form-control border border-gray-300 rounded-md p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 font-semibold mb-2">Título (opcional)</label>
                <input type="file" name="titulo" class="form-control border border-gray-300 rounded-md p-2 w-full" accept=".pdf">
            </div>
            <div class="mb-4">
                <label for="diploma" class="block text-gray-700 font-semibold mb-2">Diploma (opcional)</label>
                <input type="file" name="diploma" class="form-control border border-gray-300 rounded-md p-2 w-full" accept=".pdf">
            </div>
            <div class="mb-4">
                <label for="ante_penales_policia" class="block text-gray-700 font-semibold mb-2">Antecedentes Penales y Policiales (opcional)</label>
                <input type="file" name="ante_penales_policia" class="form-control border border-gray-300 rounded-md p-2 w-full" accept=".pdf">
            </div>
            <div class="mb-4">
                <label for="copia_dpi" class="block text-gray-700 font-semibold mb-2">Copia DPI (opcional)</label>
                <input type="file" name="copia_dpi" class="form-control border border-gray-300 rounded-md p-2 w-full" accept=".pdf">
            </div>
            <div class="mb-4">
                <label for="nombre_conyuge" class="block text-gray-700 font-semibold mb-2">Nombre del Cónyuge (opcional)</label>
                <input type="text" name="nombre_conyuge" value="{{ old('nombre_conyuge', $empleado->nombre_conyuge) }}" class="form-control border border-gray-300 rounded-md p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="fecha_nacimiento_conyuge" class="block text-gray-700 font-semibold mb-2">Fecha de Nacimiento del Cónyuge (opcional)</label>
                <input type="date" name="fecha_nacimiento_conyuge" value="{{ old('fecha_nacimiento_conyuge', $empleado->fecha_nacimiento_conyuge) }}" class="form-control border border-gray-300 rounded-md p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="nombre_hijo" class="block text-gray-700 font-semibold mb-2">Nombre del Hijo (opcional)</label>
                <input type="text" name="nombre_hijo" value="{{ old('nombre_hijo', $empleado->nombre_hijo) }}" class="form-control border border-gray-300 rounded-md p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="fecha_nacimiento_hijo" class="block text-gray-700 font-semibold mb-2">Fecha de Nacimiento del Hijo (opcional)</label>
                <input type="date" name="fecha_nacimiento_hijo" value="{{ old('fecha_nacimiento_hijo', $empleado->fecha_nacimiento_hijo) }}" class="form-control border border-gray-300 rounded-md p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="foto_empleado" class="block text-gray-700 font-semibold mb-2">Foto del Empleado (opcional)</label>
                <input type="file" name="foto_empleado" class="form-control border border-gray-300 rounded-md p-2 w-full" accept="image/*">
            </div>
            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">Actualizar</button>
                <a href="{{ route('empleados.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">Regresar</a>
            </div>
        </form>
    </div>
</div>

@endcomponent
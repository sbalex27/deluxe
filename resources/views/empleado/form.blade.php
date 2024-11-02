
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<h1 class="text-2xl font-bold mb-6">{{ $modo }} empleado</h1>
<body>
    <div class="mb-4">
        <label for="Nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
        <input type="text" name="nombre" value="{{ isset($empleado->nombre) ? $empleado->nombre : '' }}" id="nombre"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
        <label for="Apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido</label>
        <input type="text" name="apellido" value="{{ isset($empleado->apellido) ? $empleado->apellido : '' }}" id="apellido"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
        <label for="Fecha_Contratacion" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Contratación</label>
        <input type="date" name="fecha_contratacion" value="{{ isset($empleado->fecha_contratacion) ? $empleado->fecha_contratacion : '' }}" id="fecha_contratacion"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div>
        <input type="submit" value="{{ $modo }} datos" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
    </div>
</body>
</form>

<a href="{{ url('empleado/') }}" class="text-blue-500 hover:underline">Regresar</a>
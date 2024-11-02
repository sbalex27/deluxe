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
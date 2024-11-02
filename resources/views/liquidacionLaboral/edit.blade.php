@component('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="form-container">
    <h2>Editar Liquidación Laboral</h2>
    <form action="{{ route('liquidacion-laboral.update', $liquidacion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="empleado_id">Empleado</label>
            <select name="empleado_id" id="empleado_id" required>
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id }}" {{ $empleado->id == $liquidacion->empleado_id ? 'selected' : '' }}>
                        {{ $empleado->nombre }} {{ $empleado->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="number" name="monto" id="monto" value="{{ $liquidacion->monto }}" required step="0.01">
        </div>

        <div class="form-group">
            <label for="fecha_liquidacion">Fecha de Liquidación</label>
            <input type="date" name="fecha_liquidacion" id="fecha_liquidacion" value="{{ $liquidacion->fecha_liquidacion->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('liquidacion-laboral.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endcomponent
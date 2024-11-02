@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Bono 14</h2>

    <form action="{{ route('planilla_bono_14.update', $planillaBono14) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-4">
            <label for="nomina_id" class="block font-bold mb-1">Nomina</label>
            <select name="nomina_id" id="nomina_id" class="form-input w-full p-2 border border-gray-300 rounded" required>
                @foreach($nominas as $nomina)
                    <option value="{{ $nomina->id }}" {{ $nomina->id == $planillaBono14->nomina_id ? 'selected' : '' }}>
                        {{ $nomina->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-4">
            <label for="monto" class="block font-bold mb-1">Monto</label>
            <input type="number" name="monto" id="monto" class="form-input w-full p-2 border border-gray-300 rounded" value="{{ $planillaBono14->monto }}" required step="0.01">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('planilla_bono_14.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
    </form>
@endsection
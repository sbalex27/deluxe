@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detalles de Bono 14</h2>

    <p><strong>ID:</strong> {{ $planillaBono14->id }}</p>
    <p><strong>Nomina ID:</strong> {{ $planillaBono14->nomina_id }}</p>
    <p><strong>Monto:</strong> {{ $planillaBono14->monto }}</p>

    <a href="{{ route('planilla_bono_14.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
@endsection
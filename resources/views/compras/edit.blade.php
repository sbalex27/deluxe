<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Compra') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                
                @if(Session::has('mensaje'))
                    <div class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ Session::get('mensaje') }}
                    </div>
                @endif

                <form action="{{ route('compras.update', $compra) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <label for="empleado_id" class="block font-bold mb-1">Empleado</label>
                        <select name="empleado_id" id="empleado_id" class="form-input w-full p-2 border border-gray-300 rounded" required>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id }}" {{ $empleado->id == $compra->empleado_id ? 'selected' : '' }}>
                                    {{ $empleado->nombre }} {{ $empleado->apellido }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="descripcion" class="block font-bold mb-1">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-input w-full p-2 border border-gray-300 rounded" value="{{ $compra->descripcion }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="monto" class="block font-bold mb-1">Monto</label>
                        <input type="number" name="monto" id="monto" class="form-input w-full p-2 border border-gray-300 rounded" value="{{ $compra->monto }}" required step="0.01">
                    </div>

                    <div class="form-group mb-4">
                        <label for="fecha_compra" class="block font-bold mb-1">Fecha de Compra</label>
                        <input type="date" name="fecha_compra" id="fecha_compra" class="form-input w-full p-2 border border-gray-300 rounded" value="{{ $compra->fecha_compra }}" required>
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" " class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Actualizar</button>
                        <a href="{{ route('compras.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
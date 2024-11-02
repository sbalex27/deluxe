<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Aguinaldo') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <form action="{{ route('planilla_aguinaldo.update', $planillaAguinaldo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nomina_id" class="block text-gray-700">Nómina</label>
                <select name="nomina_id" id="nomina_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach($nominas as $nomina)
                        <option value="{{ $nomina->id }}" {{ $planillaAguinaldo->nomina_id == $nomina->id ? 'selected' : '' }}>
                            {{ $nomina->id }}
                        </option>
                    @endforeach
                </select>
                @error('nomina_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="monto" class="block text-gray-700">Monto</label>
                <input type="text" name="monto" id="monto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $planillaAguinaldo->monto }}" required>
                @error('monto')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Actualizar Aguinaldo</button>
            <a href="{{ route('planilla_aguinaldo.index') }}" class="ml-2 inline-block text-gray-700">Regresar</a>
        </form>
    </div>
</x-app-layout>
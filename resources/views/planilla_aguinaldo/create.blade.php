<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Aguinaldo') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <form action="{{ route('planilla_aguinaldo.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nomina_id" class="block text-gray-700">Nómina</label>
                        <select name="nomina_id" id="nomina_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="">Seleccionar Nómina</option>
                            @foreach($nominas as $nomina)
                                <option value="{{ $nomina->id }}">{{ $nomina->id }}</option>
                            @endforeach
                        </select>
                        @error('nomina_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="monto" class="block text-gray-700" >Monto</label>
                        <input type="text" name="monto" id="monto" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('monto')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Crear Aguinaldo</button>
                    <a href="{{ route('planilla_aguinaldo.index') }}" class="ml-2 inline-block text-gray-700">Regresar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
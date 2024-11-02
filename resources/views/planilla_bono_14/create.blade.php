<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Bono 14') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <form action="{{ route('planilla_bono_14.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="nomina_id" class="block font-bold mb-1">Nomina</label>
                        <select name="nomina_id" id="nomina_id" class="form-input w-full p-2 border border-gray-300 rounded" required>
                            @foreach($nominas as $nomina)
                                <option value="{{ $nomina->id }}">{{ $nomina->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="monto" class="block font-bold mb-1">Monto</label>
                        <input type="number" name="monto" id="monto" class="form-input w-full p-2 border border-gray-300 rounded" required step="0.01">
                    </div>

                    <div class="flex justify-between">
                        <button type="submit"" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Crear</button>
                        <a href="{{ route('planilla_bono_14.index') }}" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
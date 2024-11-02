<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Poliza Contable') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <form action="{{ route('poliza_contable.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="nomina_id" class="block text-gray-700">Nomina ID</label>
                        <input type="number" name="nomina_id" class="form-control w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="detalles" class="block text-gray-700">Detalles</label>
                        <textarea name="detalles" class="form-control w-full border border-gray-300 rounded p-2" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Crear</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
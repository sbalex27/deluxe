<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de Poliza Contable') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <p><strong>ID:</strong> {{ $polizaContable->id }}</p>
                <p><strong>Nomina ID:</strong> {{ $polizaContable->nomina_id }}</p>
                <p><strong>Detalles:</strong> {{ $polizaContable->detalles }}</p>
                <a href="{{ route('poliza_contable.index') }}" class="mt-4 inline-block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Volver</a>
            </div>
        </div>
    </div>
</x-app-layout>
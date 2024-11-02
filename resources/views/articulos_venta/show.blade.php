<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de Artículo en Venta') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <p><strong>ID:</strong> {{ $articuloVenta->articulo_id }}</p>
                <p><strong>Nombre Artículo:</strong> {{ $articuloVenta->nombre_articulo }}</p>
                <p><strong>Categoría:</strong> {{ $articuloVenta->categoria }}</p>
                <p><strong>Precio:</strong> {{ $articuloVenta->precio }}</p>
                <p><strong>Cantidad Disponible:</strong> {{ $articuloVenta->cantidad_disponible }}</p>
                <p><strong>Fecha Disponibilidad:</strong> {{ $articuloVenta->fecha_disponibilidad }}</p>
                <a href="{{ route('articulos_venta.index') }}" class="mt-4 inline-block bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Volver</a>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Artículo en Venta') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <form action="{{ route('articulos_venta.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="nombre_articulo" class="block text-gray-700">Nombre Artículo</label>
                        <input type="text" name="nombre_articulo" class="form-control w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="categoria" class="block text-gray-700">Categoría</label>
                        <input type="text" name="categoria" class="form-control w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="precio" class="block text-gray-700">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="cantidad_disponible" class="block text-gray-700">Cantidad Disponible</label>
                        <input type="number" name="cantidad_disponible" class="form-control w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="fecha_disponibilidad" class="block text-gray-700">Fecha Disponibilidad</label>
                        <input type="date" name="fecha_disponibilidad" class="form-control w-full border border-gray-300 rounded p-2" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Crear</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
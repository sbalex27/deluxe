<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Artículo en Venta') }}
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

                <form action="{{ route('articulos_venta.update', $articuloVenta->articulo_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <label for="nombre_articulo" class="block font-bold mb-1">Nombre Artículo</label>
                        <input type="text" name="nombre_articulo" value="{{ old('nombre_articulo', $articuloVenta->nombre_articulo) }}" class="form-input w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="categoria" class="block font-bold mb-1">Categoría</label>
                        <input type="text" name="categoria" value="{{ old('categoria', $articuloVenta->categoria) }}" class="form-input w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="precio" class="block font-bold mb-1">Precio</label>
                        <input type="number" step="0.01" name="precio" value="{{ old('precio', $articuloVenta->precio) }}" class="form-input w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="cantidad_disponible" class="block font-bold mb-1">Cantidad Disponible</label>
                        <input type="number" name="cantidad_disponible" value="{{ old('cantidad_disponible', $articuloVenta->cantidad_disponible) }}" class="form-input w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="fecha_disponibilidad" class="block font-bold mb-1">Fecha Disponibilidad</label>
                        <input type="date" name="fecha_disponibilidad" value="{{ old('fecha_disponibilidad', $articuloVenta->fecha_disponibilidad) }}" class="form-input w-full p-2 border border-gray-300 rounded" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="enlace_imagen" class="block font-bold mb-1">Enlace de Imagen</label>
                        <input type="text" name="enlace_imagen" value="{{ old('enlace_imagen', $articuloVenta->enlace_imagen) }}" class="form-input w-full p-2 border border-gray-300 rounded" />
                    </div>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Actualizar</button>
                        <a href="{{ route('articulos_venta.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
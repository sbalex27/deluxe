<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Artículos en Venta') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="container mx-auto py-6 max-w-3xl bg-white rounded-lg shadow-lg p-6 bg-opacity-80">
            @if(session('success'))
                <div class="text-green-600 bg-green-100 border border-green-300 rounded-md p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            <a href="{{ route('articulos_venta.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Crear Artículo</a>

            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Nombre Artículo</th>
                        <th class="border px-4 py-2">Categoría</th>
                        <th class="border px-4 py-2">Precio</th>
                        <th class="border px-4 py-2">Cantidad Disponible</th>
                        <th class="border px-4 py-2">Fecha Disponibilidad</th>
                        <th class="border px-4 py-2">Imagen</th>
                        <th class="border px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articulos as $articulo)
                        <tr class="hover:bg-gray-100">
                            <td class="border px-4 py-2">{{ $articulo->articulo_id }}</td>
                            <td class="border px-4 py-2">{{ $articulo->nombre_articulo }}</td>
                            <td class="border px-4 py-2">{{ $articulo->categoria }}</td>
                            <td class="border px-4 py-2">{{ $articulo->precio }}</td>
                            <td class="border px-4 py-2">{{ $articulo->cantidad_disponible }}</td>
                            <td class="border px-4 py-2">{{ $articulo->fecha_disponibilidad }}</td>
                            <td class="border px-4 py-2">
                                @if($articulo->enlace_imagen)
                                    <img src="{{ $articulo->enlace_imagen }}" alt="Imagen del artículo" class="w-24 h-24 object-cover" />
                                @else
                                    Sin imagen
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('articulos_venta.edit', $articulo->articulo_id) }}" class="text-blue-500 hover:underline">Editar</a>
                                <form action="{{ route('articulos_venta.destroy', $articulo->articulo_id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
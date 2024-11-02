<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Polizas Contables') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                @if(session('success'))
                    <div class="mb-4 p-4 text-green-700 bg-green-100 rounded" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('poliza_contable.create') }}" class="mb-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Crear Poliza</a>

                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Nomina ID</th>
                            <th class="border px-4 py-2">Detalles</th>
                            <th class="border px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($polizas as $poliza)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2">{{ $poliza->id }}</td>
                                <td class="border px-4 py-2">{{ $poliza->nomina_id }}</td>
                                <td class="border px-4 py-2">{{ $poliza->detalles }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('poliza_contable.edit', $poliza) }}" class="text-blue-500 hover:underline">Editar</a>
                                    <form action="{{ route('poliza_contable.destroy', $poliza) }}" method="POST" class="inline">
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
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Planilla de Bono 14') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                
                @if(session('mensaje'))
                    <div class="mb-4 p-4 text-green-700 bg-green-100 rounded" role="alert">
                        {{ session('mensaje') }}
                    </div>
                @endif

                <a href="{{ route('planilla_bono_14.create') }}" class="inline-block mb-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Crear Nuevo Bono 14</a>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                                <th class="py-3 px-4 border-b">ID</th>
                                <th class="py-3 px-4 border-b">Nomina ID</th>
                                <th class="py-3 px-4 border-b">Monto</th>
                                <th class="py-3 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bonos as $bono)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b">{{ $bono->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $bono->nomina_id }}</td>
                                    <td class="py-2 px-4 border-b">Q{{ number_format($bono->monto, 2) }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('planilla_bono_14.edit', $bono) }}" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Editar</a>
                                        <form action="{{ route('planilla_bono_14.destroy', $bono) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"" class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition"">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
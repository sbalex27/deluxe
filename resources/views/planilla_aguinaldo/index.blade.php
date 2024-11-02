<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Planillas Aguinaldo') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                <div class="flex justify-between mb-4">
                    <a href="{{ route('planilla_aguinaldo.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Crear Aguinaldo</a>
                </div>

                @if(session('success'))
                    <div class="text-green-600 bg-green-100 border border-green-300 rounded-md p-4 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th>ID</th>
                            <th>Nómina</th>
                            <th>Monto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($planillas as $planilla)
                            <tr>
                                <td>{{ $planilla->id }}</td>
                                <td>{{ $planilla->nomina->id }}</td>
                                <td> Q {{ $planilla->monto }}</td>
                                <td>
                                    <a href="{{ route('planilla_aguinaldo.edit', $planilla->id) }}" class="bg-cyan-500 text-white px-2 py-1 rounded">Editar</a>
                                    <form action="{{ route('planilla_aguinaldo.destroy', $planilla->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" " class="bg-yellow-400 text-black px-2 py-1 rounded-md hover:bg-blue-500 transition">Eliminar</button>
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
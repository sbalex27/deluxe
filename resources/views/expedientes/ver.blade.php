{{-- resources/views/expedientes/ver.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información del Empleado') }}
        </h2>
    </x-slot>

    <div class="bg-blue-100 min-h-screen flex flex-col items-center justify-center" style="background-image: url('https://image.slidesdocs.com/responsive-images/background/blue-abstract-texture-polygon-technology-nature-powerpoint-background_94e8175035__960_540.jpg'); background-size: cover; background-position: center;">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <div class="container mx-auto py-6 bg-white bg-opacity-80 p-6 rounded-lg shadow-lg">
                @if(session('mensaje'))
                    <div class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('mensaje') }}
                    </div>
                @endif

                <h3 class="text-xl font-semibold mb-2">Nombre: {{ $empleado->nombre }} {{ $empleado->apellido }}</h3>

                @if($tipo_info == 'laboral')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div class="p-4 border border-gray-300 rounded-lg bg-white">
                            <h4 class="font-semibold text-lg">Compras</h4>
                            <ul>
                                @foreach($compras as $compra)
                                    <li>{{ $compra->descripcion }} - {{ $compra->monto }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-4 border border-gray-300 rounded-lg bg-white">
                            <h4 class="font-semibold text-lg">Liquidación Laboral</h4>
                            <ul>
                                @foreach($liquidacionLaboral as $liquidacion)
                                    <li>{{ $liquidacion->detalle }} - {{ $liquidacion->monto }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-4 border border-gray-300 rounded-lg bg-white">
                            <h4 class="font-semibold text-lg">Nómina</h4>
                            <ul>
                                @foreach($nomina as $n)
                                    <li>{{ $n->mes }} - {{ $n->monto }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-4 border border-gray-300 rounded-lg bg-white">
                            <h4 class="font-semibold text-lg">Permisos</h4>
                            <ul>
                                @foreach($permisos as $permiso)
                                    <li>{{ $permiso->tipo }} - {{ $permiso->fecha }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-4 border border-gray-300 rounded-lg bg-white">
                            <h4 class="font-semibold text-lg">Plantilla Aguinaldo</h4>
                            <ul>
                                @foreach($planilla_Aguinaldo as $aguinaldo)
                                    <li>{{ $aguinaldo->descripcion }} - {{ $aguinaldo->monto }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-4 border border-gray-300 rounded-lg bg-white">
                            <h4 class="font-semibold text-lg">Bono 14</h4>
                            <ul>
                                @foreach($planillaBono14 as $bono14)
                                    <li>{{ $bono14->descripcion }} - {{ $bono14->monto }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-4 border border-gray-300 rounded-lg bg-white">
                            <h4 class="font-semibold text-lg">Póliza Contable</h4>
                            <ul>
                                @foreach($polizaContable as $poliza)
                                    <li>{{ $poliza->descripcion }} - {{ $poliza->monto }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <a href="{{ route('expedientes.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">Regresar</a>
            </div>
        </div>
    </div>
</x-app-layout>
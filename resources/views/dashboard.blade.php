<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pagina principal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#f8f5e1] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 text-center">
                    <h3 class="text-lg font-semibold mb-4">{{ __('¿Qué deseas ver?') }}</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('empleado') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://cdn-icons-png.flaticon.com/512/554/554795.png') }}" alt="Empleado" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Empleado</span>
                            </a>
                        </div>
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('expedientes.index') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://cdn-icons-png.flaticon.com/512/3135/3135761.png') }}" alt="Expedientes" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Expediente</span>
                            </a>

                         
                        </div>

                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('compras.index') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://th.bing.com/th/id/OIP.jxLR1uf-6y6TfnSU_1OajAHaHa?rs=1&pid=ImgDetMain') }}" alt="Compras" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Compras</span>
                            </a>
                        </div>
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('prestamo') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://i.pinimg.com/originals/06/6b/98/066b98b41e30f405ec8e044e6a9c4568.png') }}" alt="Préstamo" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Préstamo</span>
                            </a>
                        </div>
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('permisos') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://th.bing.com/th/id/OIP.dN3i6Idu6_1Ht31320d4JgHaHa?rs=1&pid=ImgDetMain') }}" alt="Permisos" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Permisos</span>
                            </a>
                        </div>
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('liquidacion') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://static.vecteezy.com/system/resources/previews/014/065/399/original/line-icon-for-settlement-vector.jpg') }}" alt="Liquidación" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Liquidación Laboral</span>
                            </a>
                        </div>
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('nomina') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://static.vecteezy.com/system/resources/previews/022/820/094/original/line-icon-for-payroll-vector.jpg') }}" alt="Nómina" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Nómina</span>
                            </a>
                        </div>
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('planilla_aguinaldo.index') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://img.freepik.com/vector-premium/monedas-dinero-dolares-que-salen-caja-regalo-puntos-recompensa-programa-bonificacion-inversion-ahorro-ingresos-crecimiento-simbolo-riqueza-bonificacion-o-premio-exito-empresarial-ilustracion-vector-estilo-plano_169241-5216.jpg?w=2000') }}" alt="Aguinaldo" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Planilla de Aguinaldo</span>
                            </a>
                        </div>
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('planilla_bono_14.index') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://thumbs.dreamstime.com/z/icono-del-vector-de-bonos-en-el-fondo-blanco-225396734.jpg') }}" alt="Bono 14" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Planilla de Bono 14</span>
                            </a>
                        </div>
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('poliza_contable.index') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://th.bing.com/th/id/R.139f442e27a173e3f79b44b23fe11c9b?rik=UILqza43rVcosw&pid=ImgRaw&r=0') }}" alt="Póliza Contable" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Póliza Contable</span>
                            </a>

                            
                        </div>
                        <div class="bg-white bg-opacity-80 p-4 rounded-lg shadow-lg hover:bg-light-blue-100 transition">
                            <a href="{{ route('articulos_venta.index') }}" class="flex flex-col items-center text-blue-500">
                                <img src="{{ asset('https://images.vexels.com/media/users/3/205437/isolated/preview/1d84c7d31a188b47fe75640a85af8d9c-icono-de-trazo-de-venta-de-compras-en-linea.png') }}" alt="Articulos en venta" class="w-20 h-20 mb-2">
                                <span class="text-sm font-semibold">Articulos en venta</span>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
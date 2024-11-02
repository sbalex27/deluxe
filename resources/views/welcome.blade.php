<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenida</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://forbes.com.br/wp-content/uploads/2020/11/Listas_MaioresEmpresasPrivadasEUA_231120_Getty.jpg'); /* Cambia la URL por la de tu imagen */
            background-size: cover;
            background-position: center;
        }
    </style>
<head>
    <style>
        /* Estilo para el efecto de hover */
        .hover-bg-light-blue:hover {
            background-color: #b2e0f7; /* Color celeste */
        }
    </style>
</head>
<body class="font-sans antialiased text-white">
    <div class="bg-black bg-opacity-50 min-h-screen flex flex-col items-center justify-center">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="py-10 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Bienvenido a Empresa T Consulting, S.A</h1>
                @if (Route::has('login'))
                    <nav class="flex space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="rounded-md px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-4 py-2 bg-blue-400 text-white hover:bg-blue-500 transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-4 py-2 bg-blue-400 text-white hover:bg-blue-500 transition">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white bg-opacity-80 p-6 rounded-lg shadow-lg hover-bg-light-blue">
                    <h2 class="text-xl font-semibold mb-2 text-black">¿QUIÉNES SOMOS?</h2>
                    <p class="text-gray-700">
                        En Empresa T Consulting, S.A, somos un equipo apasionado por la tecnología y el hogar. Desde nuestra fundación en 01 de julio de 1999, nos hemos comprometido a ofrecer a nuestros clientes los mejores electrodomésticos y equipos de cómputo del mercado.
                    </p>
                </div>
                <div class="bg-white bg-opacity-80 p-6 rounded-lg shadow-lg hover-bg-light-blue">
                    <h2 class="text-xl font-semibold mb-2 text-black">VISIÓN</h2>
                    <p class="text-gray-700">
                        Aspiramos a ser líderes en la industria de electrodomésticos y tecnología, reconocidos por nuestra innovación, calidad y atención al cliente. Queremos ser el lugar de referencia para quienes buscan equipar su hogar o su espacio de trabajo con lo último en tecnología.
                    </p>
                </div>
                <div class="bg-white bg-opacity-80 p-6 rounded-lg shadow-lg hover-bg-light-blue">
                    <h2 class="text-xl font-semibold mb-2 text-black">MISIÓN</h2>
                    <p class="text-gray-700">
                        Nuestra misión es proporcionar a nuestros clientes soluciones tecnológicas que mejoren su calidad de vida, ofreciendo productos de alta calidad y un servicio excepcional. Creemos que la tecnología debe ser accesible y fácil de usar, por lo que seleccionamos cuidadosamente cada uno de nuestros productos para asegurarnos de que cumplan con los más altos estándares de rendimiento y durabilidad.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

            <div class="bg-white bg-opacity-80 p-6 rounded-lg shadow-lg mt-6">
                <h2 class="text-xl font-semibold mb-2">Ver Catálogo de Productos</h2>
                <p class="text-gray-700">Aquí puedes agregar información sobre los productos.</p>
                <!-- Espacio para agregar productos -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div class="bg-gray-200 p-4 rounded-lg">Producto 1</div>
                    <div class="bg-gray-200 p-4 rounded-lg">Producto 2</div>
                    <div class="bg-gray-200 p-4 rounded-lg">Producto 3</div>
                    <div class="bg-gray-200 p-4 rounded-lg">Producto 4</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
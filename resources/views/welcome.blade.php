<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('img/logoGym.png') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-900 text-white">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gray-900">
            
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold hover:text-orange-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-orange-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold hover:text-orange-500">Iniciar Sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold hover:text-orange-500">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8 text-center">
                <div class="flex justify-center">
                    <img src="{{ asset('img/logo.png') }}" alt="GymFlow Logo" class="h-32 w-auto mb-8">
                </div>
                
                <h1 class="text-5xl font-extrabold mb-4">Bienvenido a <span class="text-orange-500">GymFlow</span></h1>
                <p class="text-xl text-gray-400 mb-8 italic">"Donde la fuerza se encuentra con el control."</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
                    <div class="p-6 bg-gray-800 rounded-lg shadow-xl">
                        <h3 class="text-lg font-bold text-orange-400">Planes Flexibles</h3>
                        <p class="text-sm text-gray-400 mt-2">Mensuales, trimestrales y anuales diseñados para ti.</p>
                    </div>
                    <div class="p-6 bg-gray-800 rounded-lg shadow-xl">
                        <h3 class="text-lg font-bold text-orange-400">Control Total</h3>
                        <p class="text-sm text-gray-400 mt-2">Gestiona tus pagos y asistencias de forma digital.</p>
                    </div>
                    <div class="p-6 bg-gray-800 rounded-lg shadow-xl">
                        <h3 class="text-lg font-bold text-orange-400">Seguridad 24/7</h3>
                        <p class="text-sm text-gray-400 mt-2">Acceso controlado para una comunidad de confianza.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
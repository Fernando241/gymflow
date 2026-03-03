<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-500 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-gray-700">
                
                <div class="p-6 lg:p-8 border-b border-gray-700">
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('img/logoGym.png') }}" alt="Logo" class="h-10 w-auto mr-4">
                        <h1 class="text-3xl font-bold text-white">
                            Bienvenido, <span class="text-orange-500">{{ Auth::user()->name }}</span>
                        </h1>
                    </div>

                    <p class="text-gray-400 leading-relaxed text-lg">
                        Estás en la central de mando de <span class="font-bold">GymFlow</span>. 
                        Desde aquí puedes gestionar socios, planes y finanzas.
                    </p>
                </div>

                <div class="bg-gray-800 bg-opacity-50 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                    
                    <div class="p-6 bg-gray-700 rounded-lg border border-gray-600 hover:border-orange-500 transition duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <h2 class="ml-3 text-xl font-semibold text-white">Gestión de Socios</h2>
                        </div>
                        <p class="mt-4 text-gray-400 text-sm">Administra los 50 socios registrados y sus datos de contacto.</p>
                    </div>

                    <div class="p-6 bg-gray-700 rounded-lg border border-gray-600 hover:border-orange-500 transition duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                            <h2 class="ml-3 text-xl font-semibold text-white">Planes y Membresías</h2>
                        </div>
                        <p class="mt-4 text-gray-400 text-sm">Configura los precios de los planes mensual, trimestral y anual.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
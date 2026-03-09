<x-app-layout>

<div class="container p-6">

    {{-- Para ver Alert --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 border border-green-300 mb-4 rounded text-center">
            {{ session('success') }}
        </div>
    @endif

    <h1>Lista de Membresías</h1><br>
    <p class="text-muted">
        Total de membresias registradas: <strong>{{ $membresias->total() }}</strong>
    </p><br>

    <a href="{{ route('membresias.create') }}" class="p-2 bg-gray-800 text-white rounded-lg">
        Crear Membresia
    </a>
    <br><br>

    <table class="w-full border border-gray-300 mt-4">
        <thead class="bg-gray-200">
            <tr class="text-center border-b">
                <th>ID</th>
                <th>Socio</th>
                <th>Plan</th>
                <th>Precio</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
                <th>Días restantes</th>
                @if (Auth()->user()->role == 'admin')
                    <th>Acciones</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @foreach($membresias as $membresia)
                <tr class="text-center">
                    <td>{{ $membresia->id }}</td>
                    <td>{{ $membresia->user->name }}</td>
                    <td>{{ $membresia->plan->nombre_plan }}</td>
                    <td>{{ $membresia->precio_formateado }}</td>
                    <td>{{ $membresia->start_date->format('d/m/Y') }}</td>
                    <td>{{ $membresia->end_date->format('d/m/Y') }}</td>
                    <td>{{ $membresia->status }}</td>
                    <td>
                        @if($membresia->esta_vencida)
                            <span style="color:red; font-weight:bold;">
                                Vencida
                            </span>
                        @else
                            <span style="color:green;">
                                {{ $membresia->dias_restantes }} días
                            </span>
                        @endif
                    </td>
                    @if (Auth()->user()->role == 'admin')
                        <td class="flex justify-center gap-2">
                            <a href="{{ route('membresias.edit', $membresia->id) }}" class="bg-gray-700 p-2 rounded-md text-white">
                                Editar
                            </a>
                            <form action="{{ route('membresias.destroy', $membresia->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="bg-red-600 p-2 text-white rounded-md"
                                    onclick="return confirm('¿Seguro que deseas eliminar esta membresia?')"
                                    >
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    {{ $membresias->links() }}

</div>

</x-app-layout>
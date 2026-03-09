<x-app-layout>
    <div class="container p-6">
        <h1 class="text-center text-blue-950"><b>Usuarios registrados</b></h1>

            <table class="min-w-full border-separate border-spacing-y-3">
                <thead class="bg-gray-200">
                    <tr class="text-center border-b">
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->name }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            @if ($user->status)
                            Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        
                        <td>
                            <a href="{{ route('usuarios.edit', $user) }}" class="bg-gray-700 p-2 text-white rounded-md">
                                Editar rol
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
    </div>
</x-app-layout>
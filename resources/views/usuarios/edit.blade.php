<x-app-layout>
    <div class="container p-6">
        <h1 class="text-blue-950"><b>Editar rol de usuario</b></h1><br>

        <form action="{{ route('usuarios.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <p><strong>{{ $user->name }}</strong></p>

            <label>Rol</label>

            <select name="role">
                <option value="socio" 
                    {{ $user->role == 'socio' ? 'selected' : '' }}>
                    Socio
                </option>

                <option value="empleado"
                    {{ $user->role == 'empleado' ? 'selected' : '' }}>
                    Empleado
                </option>

                <option value="admin"
                    {{ $user->role == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>
            </select>

            <button type="submit" class="bg-gray-700 text-white p-2 rounded-md">
                Guardar cambios
            </button>
        </form>
    </div>
</x-app-layout>
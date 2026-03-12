<x-app-layout>

<div class="max-w-xl mx-auto mt-10 bg-gray-500 shadow rounded-lg p-6">

    <h2 class="text-xl font-bold mb-6">
    Editar datos de contacto
    </h2>

    <form method="POST" action="{{ route('perfil.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium">Teléfono</label>
            <input type="text"
            name="phone"
            value="{{ old('phone',$user->phone) }}"
            class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">
                Nombre contacto de emergencia
            </label>
            <input type="text"
            name="emergency_contact_name"
            value="{{ old('emergency_contact_name',$user->emergency_contact_name) }}"
            class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">
                Teléfono contacto de emergencia
            </label>
            <input type="text"
            name="emergency_contact_phone"
            value="{{ old('emergency_contact_phone',$user->emergency_contact_phone) }}"
            class="w-full border rounded p-2">
        </div>

        <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-white hover:text-black">
            Guardar cambios
        </button>

    </form>

</div>

</x-app-layout>
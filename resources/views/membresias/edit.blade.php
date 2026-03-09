<x-app-layout>

<div class="container p-6">

    <h1>Editar Membresía</h1><br>

    <form action="{{ route('membresias.update',$membresia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Socio</label>
            <select name="user_id">
                @foreach($socios as $socio)
                    <option value="{{ $socio->id }}"
                        {{ $socio->id == $membresia->user_id ? 'selected' : '' }}>
                        {{ $socio->name }}
                    </option>
                @endforeach
            </select>
        </div><br>

        <div>
            <label>Plan</label>
            <select name="plan_id">
                @foreach($planes as $plan)
                    <option value="{{ $plan->id }}"
                        {{ $plan->id == $membresia->plan_id ? 'selected' : '' }}>
                        {{ $plan->nombre_plan }} - ${{ $plan->precio }}
                    </option>
                @endforeach
            </select>
        </div><br>

        <button type="submit" class="bg-gray-700 p-2 text-white rounded-md">
            Actualizar Membresía
        </button>

    </form>
</div>

</x-app-layout>
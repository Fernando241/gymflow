<x-app-layout>

    <div class="container p-6">

        <h1>Crear Membresía</h1><br>

        <form action="{{ route('membresias.store') }}" method="POST">
            @csrf

            <div>
                <label>Socio</label>
                <select name="user_id" required>
                    <option value="">Seleccione un socio</option>

                    @foreach($socios as $socio)
                        <option value="{{ $socio->id }}">
                            {{ $socio->name }}
                        </option>
                    @endforeach
                </select>
            </div><br>

            <div>
                <label>Plan</label>
                <select name="plan_id" required>
                    <option value="">Seleccione un plan</option>
                    @foreach($planes as $plan)
                        <option value="{{ $plan->id }}">
                            {{ $plan->nombre_plan }} - ${{ $plan->precio }}
                        </option>
                    @endforeach
                </select>
            </div><br>

            <button type="submit" class="bg-gray-700 p-2 text-white rounded-md">
                Crear Membresía
            </button>
        </form>
    </div>

</x-app-layout>
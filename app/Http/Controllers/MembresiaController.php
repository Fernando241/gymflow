<?php

namespace App\Http\Controllers;

use App\Models\Membresia;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membresias = Membresia::with(['user', 'plan'])
                                ->latest()
                                ->paginate(10);
        $planes = Plan::all();
        return view('membresias.index', compact('membresias', 'planes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $socios = User::where('role', 'socio')
                        ->where('status', true)
                        ->orderBy('name')
                        ->get();

        $planes = Plan::orderBy('nombre_plan')->get();

        return view('membresias.create', compact('socios', 'planes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:planes,id'
        ]);

        $user = User::findOrFail($request->user_id);

        $plan = Plan::findOrFail($request->plan_id);

        Membresia::crearDesdePlan($user, $plan);

        return redirect()
            ->route('membresias.index')
            ->with('success', 'Membresia creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membresia $membresia)
    {
        $socios = User::where('role', 'socio')->get();
        $planes = Plan::all();

        return view('membresias.edit', compact('membresia', 'socios', 'planes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Membresia $membresia)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:planes,id'
        ]);

        $plan = Plan::findOrFail($request->plan_id);

        $startDate = $membresia->start_date;
        $endDate = Carbon::parse($startDate)->copy()->addDay($plan->duracion_dias);

        $membresia->update([
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'precio_pagado' => $plan->precio,
            'end_date' => $endDate
        ]);

        return redirect()
            ->route('membresias.index')
            ->with('success', 'Membresía actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membresia $membresia)
    {
        $membresia->delete();

        return redirect()
            ->route('membresias.index')
            ->with('success', 'Membresia eliminada correctamente');
    }

}

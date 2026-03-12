<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PerfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('perfil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'phone' => 'nullable|string|max:20',
            'emergency_contact_name' => 'nullable|string|max:100',
            'emergency_contact_phone' => 'nullable|string|max:20',
        ]);

        $user->phone = $request->phone;
        $user->emergency_contact_name = $request->emergency_contact_name;
        $user->emergency_contact_phone = $request->emergency_contact_phone;
        $user->save();

        return redirect()->route('dashboard')
            ->with('success','Datos actualizados correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(12);

        return view('usuarios.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->id == Auth::id()) {
            return back()->with('error', 'No puedes cambiar tu propio rol');
        }

        $request->validate([
            'role' => 'required|in:admin,empleado,socio'
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('usuarios.index')
            ->with('success', 'Rol Actualizado correctamente');
    }

}

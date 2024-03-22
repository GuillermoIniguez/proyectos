<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('id', 'asc')->paginate(10);
        $data = [
            'users' => $users
        ];
        return view('admin.user.index', $data); 
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'surname' => 'nullable|string|max:255', 
        ]);

        User::create($validatedData);

        return redirect()->route('users')->with('success', 'Usuario creado correctamente');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'required|string|max:255|unique:users,phone,'.$id,
            'surname' => 'nullable|string|max:255', // Agrega validación para el apellido
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('users')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success', 'Usuario eliminado correctamente');
    }
}

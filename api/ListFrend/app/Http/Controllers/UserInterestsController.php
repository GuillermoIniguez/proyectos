<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInterest;

class UserInterestsController extends Controller
{
    public function index() {
        $userinterests = UserInterest::orderBy('id', 'asc')->paginate(10);
        $data = [
            'userinterests' => $userinterests
        ];
        return view('admin.userinterest.index', $data); 
    }

    public function edit($id) {
        $userInterest = UserInterest::findOrFail($id);
        // Aquí puedes cargar cualquier dato adicional que necesites para la vista de edición
        return view('admin.userinterest.edit', compact('userInterest'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'interest_id' => 'required',
            // Agrega aquí todas las validaciones necesarias para el almacenamiento de un UserInterest
        ]);

        UserInterest::create($validatedData);

        return redirect()->route('userinterests')->with('success', 'UserInterest creado correctamente');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'interest_id' => 'required',
            // Agrega aquí todas las validaciones necesarias para la actualización de un UserInterest
        ]);

        $userInterest = UserInterest::findOrFail($id);
        $userInterest->update($validatedData);

        return redirect()->route('userinterests')->with('success', 'UserInterest actualizado correctamente');
    }

    public function destroy($id) {
        $userInterest = UserInterest::findOrFail($id);
        $userInterest->delete();
        return redirect()->route('userinterests')->with('success', 'UserInterest eliminado correctamente');
    }
}

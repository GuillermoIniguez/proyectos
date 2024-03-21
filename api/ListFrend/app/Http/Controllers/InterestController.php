<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interest;

class InterestController extends Controller
{
    public function index() {
        $interests = Interest::orderBy('id', 'asc')->paginate(10);
        $data = [
            'interests' => $interests
        ];
        return view('admin.interest.index', $data); 
    }

    public function edit($id) {
        $interest = Interest::findOrFail($id);
        return view('admin.interest.edit', compact('interest'));
    }


    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        Interest::create($validatedData);

        return redirect()->route('interests')->with('success', 'Interés creado correctamente');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ]);

        $interest = Interest::findOrFail($id);
        $interest->update($validatedData);

        return redirect()->route('interests')->with('success', 'Interés actualizado correctamente');
    }

    public function destroy($id) {
        $interest = Interest::findOrFail($id);
        $interest->delete();
        return redirect()->route('interests')->with('success', 'Interés eliminado correctamente');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use App\Models\User;

class MatchesController extends Controller
{
    public function index() {
        $user = User::all(); 
        $matches = Matches::orderBy('id', 'asc')->paginate(10);
        $data = [
            'matches' => $matches
        ];
        return view('admin.matches.index', $data,  compact('user')); 
    }

    
    public function edit($id) {
        $match = Matches::findOrFail($id);
        $users = User::all();
        return view('admin.matches.edit', compact('match', 'users'));
    }

    public function store(Request $request) {
    
        $users = User::all();
        $validatedData = $request->validate([
            'user_id' => 'required',
        ]);
    

        Matches::create([
            'user_id' => $request->user_id, 
        ]);

        return redirect()->route('matches')->with('success', 'Match creado correctamente');
    }

    public function update(Request $request, $id) {

        $validatedData = $request->validate([
            'user_id' => 'nullable',
        ]);

        $match = Matches::findOrFail($id);
        $match->update([
    
            'user_id' => $request->user_id,
        ]);

 
        return redirect()->route('matches')->with('success', 'Match actualizado correctamente');
    }

    public function destroy($id) {
        $match = Matches::findOrFail($id);
        $match->delete();
        return redirect()->route('matches')->with('success', 'Match eliminado correctamente');
    }
    
}

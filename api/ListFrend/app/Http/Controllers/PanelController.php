<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Asegúrate de importar el modelo User

class PanelController extends Controller
{
    public function config()
    {
        return view('admin.config');
    }
    public function index()
    {
        // Aquí puedes agregar la lógica necesaria para mostrar la página principal del panel de administración
        return view('admin.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Obtén el término de búsqueda del formulario

        // Realiza la búsqueda en tus entidades (por ejemplo, usuarios)
        $results = User::where('name', 'like', '%'.$query.'%')
                      ->orWhere('surname', 'like', '%'.$query.'%')
                      ->get();

        // Verifica si hay resultados
        if ($results->isEmpty()) {
            return view('admin.no_results');
        }

        // Devuelve los resultados a una vista
        return view('admin.search_results', compact('results'));
    }
}

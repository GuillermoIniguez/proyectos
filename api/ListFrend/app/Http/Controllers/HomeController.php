<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interest;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $interests = Interest::take(5)->get();

        return view('home', compact('interests'));
    }
}

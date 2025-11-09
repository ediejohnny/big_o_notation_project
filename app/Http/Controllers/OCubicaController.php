<?php

namespace App\Http\Controllers;

class OCubicaController extends Controller
{
    public function index()
    {
        return view('o-cubica.index', [
            'title' => 'O(n³) - Cúbica'
        ]);
    }
}

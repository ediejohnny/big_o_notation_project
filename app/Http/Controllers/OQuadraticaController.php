<?php

namespace App\Http\Controllers;

class OQuadraticaController extends Controller
{
    public function index()
    {
        return view('o-quadratica.index', [
            'title' => 'O(n²) - Quadrática'
        ]);
    }
}

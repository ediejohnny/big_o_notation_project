<?php

namespace App\Http\Controllers;

class OLinearitmicaController extends Controller
{
    public function index()
    {
        return view('o-linearitimica.index', [
            'title' => 'O(n log n) - Linearítmica'
        ]);
    }
}

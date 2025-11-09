<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OQuadraticaController extends Controller
{
    public function index(): View
    {
        return view('o-quadratica.index');
    }
}

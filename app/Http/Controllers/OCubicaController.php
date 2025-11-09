<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OCubicaController extends Controller
{
    public function index(): View
    {
        return view('o-cubica.index');
    }
}

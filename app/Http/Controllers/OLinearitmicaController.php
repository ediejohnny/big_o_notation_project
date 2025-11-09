<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OLinearitmicaController extends Controller
{
    /**
     * Display O(n log n) - Linearítmica complexity examples page
     *
     * Shows interactive sorting examples where time grows ~ n log n.
     */
    public function index(): View
    {
        return view('o-linearitimica.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OLogarithmicController extends Controller
{
    /**
     * Display O(log n) - Logarithmic complexity examples page
     * 
     * Shows interactive examples of logarithmic time complexity,
     * primarily binary search which "cuts the problem in half" at each step.
     */
    public function index(): View
    {
        return view('o-logarithmic.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OLinearController extends Controller
{
    /**
     * Display O(n) - Linear complexity examples page
     * 
     * Shows interactive examples of linear time complexity,
     * where execution time grows proportionally with input size.
     */
    public function index(): View
    {
        return view('o-linear.index');
    }
}

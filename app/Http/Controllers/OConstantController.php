<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OConstantController extends Controller
{
    /**
     * Display O(1) - Constant complexity examples page
     * 
     * Shows interactive examples where operations take the same amount of time
     * regardless of input size.
     */
    public function index(): View
    {
        return view('o-constant.index');
    }
}

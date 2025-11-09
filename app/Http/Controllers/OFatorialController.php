<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OFatorialController extends Controller
{
    /**
     * Display O(n!) - Fatorial complexity examples page
     *
     * Shows examples where operations grow factorially.
     */
    public function index(): View
    {
        return view('o-fatorial.index');
    }
}

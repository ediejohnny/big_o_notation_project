<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OExponencialController extends Controller
{
    /**
     * Display the O(2^n) exponential complexity examples page.
     */
    public function index()
    {
        return view('o-exponencial.index', [
            'title' => 'O(2ⁿ) - Complexidade Exponencial'
        ]);
    }
}

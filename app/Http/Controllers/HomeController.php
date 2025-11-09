<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page with Big O introduction
     */
    public function index(): View
    {
        return view('home');
    }
}

<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\View\View;

class OCubicaController extends Controller
{
    public function index(): View
    {
        return view('o-cubica.index');
=======
class OCubicaController extends Controller
{
    public function index()
    {
        return view('o-cubica.index', [
            'title' => 'O(n³) - Cúbica'
        ]);
>>>>>>> origin/feature/o-exponencial-examples
    }
}

<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\View\View;

class OQuadraticaController extends Controller
{
    public function index(): View
    {
        return view('o-quadratica.index');
=======
class OQuadraticaController extends Controller
{
    public function index()
    {
        return view('o-quadratica.index', [
            'title' => 'O(n²) - Quadrática'
        ]);
>>>>>>> origin/feature/o-exponencial-examples
    }
}

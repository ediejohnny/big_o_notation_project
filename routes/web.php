<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OConstantController;
use App\Http\Controllers\OLinearController;
use App\Http\Controllers\OLogarithmicController;
use App\Http\Controllers\OLinearitmicaController;
use App\Http\Controllers\OQuadraticaController;
use App\Http\Controllers\OCubicaController;
use App\Http\Controllers\OExponencialController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Big O complexity routes
Route::get('/o-constante', [OConstantController::class, 'index'])->name('o-constante');
Route::get('/o-logaritmico', [OLogarithmicController::class, 'index'])->name('o-logaritmico');
Route::get('/o-linear', [OLinearController::class, 'index'])->name('o-linear');
Route::get('/o-linearitimica', [OLinearitmicaController::class, 'index'])->name('o-linearitimica');
Route::get('/o-quadratica', [OQuadraticaController::class, 'index'])->name('o-quadratica');
Route::get('/o-cubica', [OCubicaController::class, 'index'])->name('o-cubica');
Route::get('/o-exponencial', [OExponencialController::class, 'index'])->name('o-exponencial');
// Route::get('/o-fatorial', [OFatorialController::class, 'index'])->name('o-fatorial');


<?php

// Ginagamit ang namespace na 'Illuminate\Support\Facades\Route' upang magamit ang Route facade
use Illuminate\Support\Facades\Route;

// Ini-import ang MathController mula sa App\Http\Controllers
use App\Http\Controllers\MathController;

// Gumagawa ng ruta kung saan tatanggap ng tatlong parameters: operation, val1, at val2
// Halimbawa ng URL: /add/5/3 -> Tatawagin ang 'compute' method sa MathController
Route::get('/{operation}/{val1}/{val2}', [MathController::class, 'compute']);

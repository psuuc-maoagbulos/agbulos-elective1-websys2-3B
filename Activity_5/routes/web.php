<?php

// Ginagamit ang namespace na 'Illuminate\Support\Facades\Route' upang magamit ang Route facade
use Illuminate\Support\Facades\Route;

// Ini-import ang MathController mula sa App\Http\Controllers
use App\Http\Controllers\MathController;

// Gumawa ng GET route na may dynamic parameters sa URL
Route::get('/{op1}/{val1}/{val2}/{op2}/{val3}/{val4}', [MathController::class, 'computeMultiple']);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MathController;

Route::get('/{operation}/{num1}/{num2}/{operation2}/{num3}/{num4}', [MathController::class, 'compute']);



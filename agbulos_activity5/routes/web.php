<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MathController;

Route::get('/{operation}/{val1}/{val2}', [MathController::class, 'compute']);


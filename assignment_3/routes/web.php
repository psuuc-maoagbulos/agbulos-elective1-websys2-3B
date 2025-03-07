<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\PersonalInfoController;

Route::get('/personal-info', [PersonalInfoController::class, 'showForm'])->name('form');
Route::post('/personal-info', [PersonalInfoController::class, 'submitValidate'])->name('submit');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\RandomUserController;
Route::get('/', function () {
    return view('welcome');
});

;

Route::get('/api/random-user', [RandomUserController::class, 'getRandomUser']);

Route::get('/weather', [WeatherController::class, 'getWeather']);
Route::get('/weather/multiple', [WeatherController::class, 'getMultipleCitiesWeather']);
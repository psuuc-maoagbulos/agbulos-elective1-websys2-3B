<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $city = $request->query('city', 'London'); // City from query parameter, defaults to London
        $apiKey = env('OPENWEATHER_API_KEY');

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric'
        ]);

        if ($response->successful()) {
            return response()->json([
                'city' => $city,
                'temperature' => $response['main']['temp'],
                'description' => $response['weather'][0]['description'],
                'humidity' => $response['main']['humidity']
            ]);
        } else {
            return response()->json(['error' => 'Could not fetch weather data'], 400);
        }
    }

    public function getMultipleCitiesWeather()
    {
        $cities = ['London', 'Dubai', 'Manila']; // Hardcoded for simplicity
        $apiKey = env('OPENWEATHER_API_KEY');
        $weatherData = [];

        foreach ($cities as $city) {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric'
            ]);

            if ($response->successful()) {
                $weatherData[] = [
                    'city' => $city,
                    'temperature' => $response['main']['temp'],
                    'description' => $response['weather'][0]['description'],
                    'humidity' => $response['main']['humidity']
                ];
            } else {
                $weatherData[] = [
                    'city' => $city,
                    'error' => 'Could not fetch weather data'
                ];
            }
        }

        return view('weather', ['weatherData' => $weatherData]);
    }
}
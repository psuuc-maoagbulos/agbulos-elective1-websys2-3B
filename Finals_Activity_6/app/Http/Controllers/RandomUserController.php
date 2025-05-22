<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RandomUserController extends Controller
{
    public function getRandomUser()
    {
        $response = Http::get("https://randomuser.me/api/");

        if ($response->successful()) {
            $user = $response->json()['results'][0];
            return response()->json([
                'name' => $user['name']['first'] . ' ' . $user['name']['last'],
                'email' => $user['email'],
                'city' => $user['location']['city'],
                'country' => $user['location']['country']
            ]);
        } else {
            return response()->json(['error' => 'Could not fetch user data'], 400);
        }
    }
}
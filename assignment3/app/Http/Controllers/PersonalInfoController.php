<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    public function showForm()
    {
        return view('personal_info');
    }

    public function submitValidate(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'sex' => 'required|in:Male,Female',
            'mobile_phone' => ['required', 'regex:/^(0998|0999|0920)-\d{3}-\d{3}$/'],
            'tel_no' => 'nullable|numeric',
            'birth_date' => 'required|date|before:today',
            'address' => 'nullable|string',
            'email' => 'required|email|max:100',
            'website' => 'nullable|url'
        ]);

        return back()->with('success', 'Form submitted successfully!');
    }
}

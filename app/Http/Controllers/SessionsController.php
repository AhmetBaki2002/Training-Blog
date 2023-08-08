<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    // attempt to authenticare and log in the user
    // based on the provided credentials
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back');
        }

        // auth faild

        throw ValidationException::withMessages([
            'email' => 'Your provided cretendial could not be verified'
        ]);
        // return back()->withInput()->withErrors(['email' => 'your provided cretendial could not be verified']);

    }
}

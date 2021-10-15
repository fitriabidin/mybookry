<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //
    public function create()
    {
        return view('logins.create');
    }

    public function store()
    {
        // validate the request

        $attributes = request()->validate([

            'email' => 'required|email',
            'password' => 'required'

        ]);
        // attemp to authenticacte and login the user
        // based on the provided credentials

        if(auth()->attempt($attributes))
        {
            // Session fixation
            session()->regenerate();
             // redirect with success message
            return redirect('/')->with('success','Welcome Back!');
        }

        //    auth fail
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]); //$error
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades;

class RegisterController extends Controller
{
    // display page
    public function create()
    {
        return view('registers.create');
    }

    // store data
    public function store()
    {
        // validate the request

        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255'
        ]);

        // eloquent mutator at setPasswordAttributes()

        $user = User::create($attributes);
        // redirect and show success message

        auth()->login($user);

        return redirect('/')->with('success','Your account has been created');
    }

}

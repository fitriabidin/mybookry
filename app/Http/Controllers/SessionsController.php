<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //log out
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');
    }
}

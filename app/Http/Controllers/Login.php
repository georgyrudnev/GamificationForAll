<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class Login extends Controller
{
    //

    function index() {
        return view('login');
    }
    function login(request $request) {
        $email = $request->input('user');
        $password = $request->input('password');
        $user = \App\Models\User::where('email', $email)->first();

        if ($user == null) {
            // TODO send info / log that user with that email does not exist in db
            return redirect()->route('posts');//->with('fail', "user does not exists");
        }
        if (hash::check($password, $user["password"])) {
            Auth::login($user);
            return redirect()->route('posts');//->with('success', "logged in successfully");
        }

        abort(401); // check if correct error code
        
    }
}

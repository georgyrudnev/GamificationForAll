<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    //

    function index() {
        return view('login');
    }
    function login(request $request) {
        $user = $request->input('user');
        $password = $request->input('password');
        dd($user, $password);
        $user = \app\Models\User::where('email', $email)->first();
        if ($user == null) {
            // TODO send info / log that user with that email does not exist in db
            return false;
        }
        if (hash::check($password, $user["password"])) {
            Auth::login($user);
            return redirect()->route('posts')->with('success', "logged in successfully");
        }
        return false; // TODO send info / log that user with that password wrong
    }
}

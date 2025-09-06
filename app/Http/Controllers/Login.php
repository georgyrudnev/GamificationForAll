<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    //

    function login(string $email, string $password) {

        $user = \app\Models\User::where('email', $email)->first();
        if ($user == null) {
            // TODO send info / log that user with that email does not exist in db
            return false;
        }
        if ($user["password"] == Hash::make('password')) {
            return true;
        }
        return false; // TODO send info / log that user with that password wrong
    }
}

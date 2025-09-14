<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post extends Controller
{
        //
    function index()
    {
        // fetch posts from db
        $posts = \App\Models\Post::all();
        $userId = Auth::id();
        $score = -1;
        $points = -1;
        if ($userId != null)
        {
            $user = \App\Models\User::find($userId);
        }
        //dd($userId);
        //dd($posts); // to quickly show what was loaded
        //send posts to view

        return view('posts/postsIndex', ['posts' => $posts]);

    }

    function show($id) {
        // fetch posts from db
        $post = \App\Models\Post::find($id);
        //dd($posts[$id-1]); // to quickly show what was loaded
        //send posts to view

        return view('posts/postsShow', ['post' => $post]);
    }
}

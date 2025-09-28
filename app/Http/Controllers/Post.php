<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\error;

class Post extends Controller
{
    //
    function index()
    {
        // fetch posts from db
        $posts = \App\Models\Post::all();
        $userId = Auth::id();
        $user = \App\Models\User::find($userId);
        //dd($userId);
        //dd($posts); // to quickly show what was loaded
        //send posts to view

        return view('posts/postsIndex', ['posts' => $posts, 'user' => $user]);

    }

    function show($id)
    {
        // fetch posts from db
        $post = \App\Models\Post::find($id);
        // fetch logged-in user from db
        $userId = Auth::id();
        $user = \App\Models\User::find($userId);

        return view('posts/postsShow', ['post' => $post, 'user' => $user]);
    }

    // TODO Create "create", "edit" and delete function
    function createComment(request $request, int $id)
    {


        $content = $request->input("content");
        $authorId = 12;
        if (Auth::check()) {
            $authorId = Auth::id();
        }

        \App\Models\Comment::create(['content' => $content, 'post_id' => $id, 'author_id' => $authorId]);
        return redirect()->route('posts.show', ['id' => $id]);
    }
    function updateComment(request $request, int $id) {

        $content = $request->input("commentContent");
        $request->validate([
            'commentContent' => 'required|string|min:3'

        ]);
        return redirect()->route('posts.show', ['id' => $id]);
    }
}

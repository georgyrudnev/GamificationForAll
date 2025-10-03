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
        $authorId = 12; // Anonymous author
        if (Auth::check()) {
            $authorId = Auth::id();
        }

        \App\Models\Comment::create(['content' => $content, 'post_id' => $id, 'author_id' => $authorId]);
        return redirect()->route('posts.show', ['id' => $id]);
    }
    function updateComment(request $request, int $id, int $commentId) {
        $comment = \App\Models\Comment::find($commentId);

        // check access rights
        if ($comment->canEditOrDelete(auth()->user())) {
            $content = $request->input("commentContent");
            $request->validate([
                'commentContent' => 'required|string|min:3'

        ]);

        $comment->update(['content' => $content]);
        return redirect()->route('posts.show', ['id' => $id]);
    }

    function deleteComment(request $request, int $id, int $commentId) {
        $comment = \App\Models\Comment::find($commentId);
        if ($comment->canEditOrDelete(auth()->user())) {
            $commentId->delete();
        }

        return redirect()->route('posts.show', ['id' => $id])->with("message", "Comment successfully deleted");
    }
}

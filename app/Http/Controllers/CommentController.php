<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }
    public function store($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'text' => 'required|string'
        ]);

        $post = Post::find($id);
        // $comment = new Comment;
        // $comment->name = $request->name;
        // $comment->email = $request->email;
        // $comment->text = $request->text;

        // $comment->$post->save();
        $comment = $post->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'text' => $request->text
        ]);

        if ($comment) {
            return response()->json([
                'success' => 'Comment created'
            ]);
        }
    }
}

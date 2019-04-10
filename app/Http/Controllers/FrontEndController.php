<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function get_posts($category_id)
    {
        $category = Category::find($category_id);
        $posts = $category->posts()->take(3)->orderBy('created_at', 'desc')->get();
        return response()->json([
            'posts' => $posts,
            'category' => $category->name
        ]);
    }
    public function single_post($slug)
    {
        $post = Post::where('slug', $slug)->get();
        $post_id = Post::select('id')->where('slug', $slug)->first();
        $comments = Comment::where('post_id', $post_id->id)->get();
        return response()->json([
            'post' => $post,
            'comments' => $comments
        ]);
    }
}

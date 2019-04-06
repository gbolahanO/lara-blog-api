<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return response()->json($post);
    }

    public function create()
    {
        $category = Category::all();

        if ($category->count() == 0) {
            return response()->json([
                'error' => 'You don"t have a category'
            ]);
        }
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'post_image' => 'required|string',
            'content' => 'required|string',
            'published' => 'required|boolean'
        ]);

        Post::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'post_image' => $request->post_image,
            'content' => $request->content,
            'published' => $request->published
        ]);

        return response()->json([
            'success' => 'post created'
        ]);
    }

    public function edit($id)
    {
        $post = Post::findorfail($id);
        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Post::findorfail($id);

        if ($request->has('category_id')) {
            $post->category_id = $request->category_id;
        }
        if ($request->has('title')) {
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
        }
        if ($request->has('post_image')) {
            $post->post_image = $request->post_image;
        }
        if ($request->has('content')) {
            $post->content = $request->content;
        }
        if ($request->has('published')) {
            $post->published = $request->published;
        }

        $post->save();

        return response()->json([
            'success' => 'post updated'
        ]);
    }

    public function destroy($id)
    {
        $post = Post::destroy($id);
        if ($post) {
            return response()->json([
                'success' => 'Post deleted'
            ]);
        }
    }
}

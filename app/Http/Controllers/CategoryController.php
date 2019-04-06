<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
       $category = Category::all();
       return response()->json($category);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        $category->save();

        return response()->json([
            'success' => 'Category created'
        ]);
    }

    public function edit($id)
    {
        $category = Category::findorfail($id);

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = Category::findorfail($id);

        $category->name = $request->name;

        $category->save();

        return response()->json([
            'success' => 'Category updated'
        ]);
    }

    public function destroy($id)
    {
        $category = Category::findorfail($id);

        foreach ($category->post as $post) {
            $post->forceDelete();
        }

        $category->delete();

        return response()->json([
            'success' => 'Category deleted'
        ]);
    }
}

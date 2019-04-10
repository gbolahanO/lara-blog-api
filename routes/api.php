<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts', 'PostController');
Route::resource('category', 'CategoryController');

Route::post('/comment/{id}', 'CommentController@store');
Route::get('/comment', 'CommentController@index');

Route::get('/r/posts/{category_id}', 'FrontEndController@get_posts');
Route::get('/r/post/{slug}', 'FrontEndController@single_post');
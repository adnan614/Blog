<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function all_post()
    {
        $post = Post::with('user', 'category')->orderBy('id', 'desc')->get();
        return response()->json([
            'posts' => $post
        ]);
    }
    public function save_post(Request $request)
    {
        $post = new post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = auth()->user()->id;
        $post->save();
    }
}

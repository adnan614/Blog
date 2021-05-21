<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function all_post()
    {
        $post = Post::with('user', 'category')->get();
        return response()->json([
            'posts' => $post
        ]);
    }
}

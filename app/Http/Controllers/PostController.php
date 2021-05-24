<?php

namespace App\Http\Controllers;

use App\Models\Post;
use image;

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
        $strpos = strpos($request->photo, ';');
        $sub = substr($request->photo, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time() . "." . $ex;
        $img = image::make($request->photo)->resize(200, 200);
        $upload_path = public_path() . "/uploadimage/";
        $img->save($upload_path . $name);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = auth()->user()->id;
        $post->image = $name;
        $post->save();
    }
}

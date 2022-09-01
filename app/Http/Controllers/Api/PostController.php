<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $posts->map(function ($post) {

            if ($post->cover_img) {
                $post->cover_img = asset("storage/" . $post->cover_img);
            } else {
                // $post->cover_img = asset("images/image-placeholder.jpeg");
            }


            return $post;
        });

        return response()->json($posts);
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);

        /* $post->load("category", "tags", "user:id,name"); */

        $post->cover_img = Storage::url($post->cover_img);
        dd($post);
        return response()->json($post);
    }
}

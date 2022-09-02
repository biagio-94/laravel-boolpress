<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::select("name", "content", "id","user_id")->paginate(3);
          $posts->load("user");
        $posts->map(function ($post) {
            $post->content = substr($post->content, 0, 100) . "...";

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

        return response()->json($post);
    }

    public function filter($user_id)
    {

        $user=User::findOrFail($user_id);
        $user->post->load("user");
        $user->post->map(function ($post) {
            $post->content = substr($post->content, 0, 100) . "...";

            if ($post->cover_img) {
                $post->cover_img = asset("storage/" . $post->cover_img);
            } else {
                // $post->cover_img = asset("images/image-placeholder.jpeg");
            }

            
            return $post;
        });
        $filteredPosts=$user->post;
        return response()->json($filteredPosts);

    }
}

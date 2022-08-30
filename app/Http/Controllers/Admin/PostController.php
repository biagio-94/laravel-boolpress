<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();


        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view("admin.posts.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|min:8",
            "content" => "required|min:15",
            "slug" => "nullable",
            "tags" => "nullable|exists:tags,id",
            "cover_img" => "required|image"
        ]);

        $post = new Post();
        $file = $data["cover_img"];
        $percorsoFile = Storage::put("/post_image", $file);
        $post->fill($data);
        $post->user_id = Auth::user()->id;
        $post->cover_img = $percorsoFile;
        $post->save();

        if (key_exists("tags", $data)) {
            $post->tags()->attach($data["tags"]);
        }

        return redirect()->route("admin.posts.show", $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view("admin.posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "name" => "required|min:8",
            "content" => "required|min:15",
            "slug" => "nullable",
            "cover_img" => "required|image"
        ]);

        $post = Post::findOrFail($id);
        if (key_exists("cover_img", $data)) {
            if ($post->cover_img) {

                Storage::delete($post->cover_img);
            }
            $file = $data["cover_img"];
            $percorsoFile = Storage::put("/post_image", $file);
             $post->cover_img = $percorsoFile;
        }
       
        $post->update($data);
        
        return redirect()->route("admin.posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach();
        Storage::delete($post->cover_img);
        $post->delete();
        return redirect()->route("admin.posts.index");
    }
    public function download($id){
        $post=Post::findOrFail($id);
        return Storage::download($post->cover_img);
    }
}

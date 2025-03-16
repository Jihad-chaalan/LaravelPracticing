<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDB = Post::all();

        // dd($postsFromDB);
        return view('posts.index', ['posts' => $postsFromDB]);
    }
    public function show($postId)
    {
        $singlePostFromDB = Post::find($postId);
        //$singlePostFromDB = Post::findOrFail($postId);  //if singlePostFromDB is null 404 not found is appear

        if (is_null($singlePostFromDB)) {
            return to_route('posts.index');
        }

        // $singlePostFromDB = Post::where('id', $postId)->first();
        // $singlePostFromDB = Post::where('id', $postId)->get();

        // dd($singlePostFromDB);
        return view("posts.show", ['post' => $singlePostFromDB]);
    }
    public function create()
    {

        return view("posts.create");
    }
    public function store()
    {
        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        // dd($title, $description, $postCreator);
        // dd($data);

        return to_route('posts.index');
    }

    public function edit($postId)
    {

        return view("posts.edit");
    }
    public function update($postId)
    {

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // dd($title, $description, $postCreator);

        return to_route('posts.show', 1);
    }
    public function destroy()
    {
        return to_route('posts.index');
    }
}

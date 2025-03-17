<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
        $users = User::all();

        return view("posts.create", ['users' => $users]);
    }
    public function store()
    {
        //1- get the user data
        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        // dd($title, $description, $postCreator);
        // dd($data);


        //2- store the submitted data in database

        //first way to store data in DB
        // $post = new Post;

        // $post->title = $title;
        // $post->description = $description;

        // $post->save(); //insert into posts table

        //Second way to store data in DB
        Post::create([
            'title' => $title,
            'description' => $description,
        ]);
        //3- redirection to posts.index
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

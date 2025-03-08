<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = [
            ['id' => 1, 'title' => 'Php', 'posted_by' => 'Jihad', 'created_at' => '2022-10-10 09:00:00'],
            ['id' => 2, 'title' => 'HTML', 'posted_by' => 'Jihad1', 'created_at' => '2024-01-08 07:00:00'],
            ['id' => 3, 'title' => 'CSS', 'posted_by' => 'Jihad2', 'created_at' => '2025-12-10 05:00:00'],
            ['id' => 4, 'title' => 'JS', 'posted_by' => 'Jihad3', 'created_at' => '2022-10-11 09:45:00']
        ];
        return view('posts.index', ['posts' => $allPosts]);
    }
    public function show($postId)
    {
        $singlePost = [
            'id' => 1,
            'title' => 'Php',
            'description' => 'this is a description',
            'posted_by' => 'Jihad',
            'created_at' => '2022-10-10 09:00:00'
        ];
        return view("posts.show", ['post' => $singlePost]);
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

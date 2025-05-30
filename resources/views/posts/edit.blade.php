@extends('layouts.app')

@section("title")Edit @endsection('title')

@section('content')

<!-- method="GET" action="{{route('posts.store')}}" -->
<form method="POST" action="{{route('posts.update', $post->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input name="title" type="text" value="{{$post -> title}}" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post -> description}}"</textarea>
    </div>


    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control">
            @foreach($users as $user)
            <option @if($user->id == $post->user_id) selected @endif value="{{$user -> id}}">{{$user -> name}}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Update</button>
</form>



@endsection('content')
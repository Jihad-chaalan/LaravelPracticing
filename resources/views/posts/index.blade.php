@extends('layouts.app')

@section("title")Index @endsection('title')

@section('content')


<div class="text-center">
    <a href="{{route('posts.create')}}" type="button" class="btn btn-success">Create Post</a>
</div>

<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{ $loop->index + 1}} </th> <!--{{$post->id}} -->
            <td>{{$post->title}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->created_at->format('Y-m-d')}}</td>
            <td>
                <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                <form style="display: inline;" method="POST" action="{{route('posts.destroy', $post['id'])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection('content')
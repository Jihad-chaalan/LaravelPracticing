@extends('layouts.app')

@section("title")Create @endsection('title')

@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{old('title')}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('description')}}</textarea>
    </div>


    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control">
            @foreach( $users as $user)
            <option value="{{$user -> id}}">{{$user -> name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>



@endsection('content')
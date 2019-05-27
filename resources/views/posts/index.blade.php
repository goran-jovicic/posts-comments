@extends('layouts.master')

@section('title', 'List of posts')    

@section('content')
    
<ul>
    @foreach ($posts as $post)
        <h1>
            <a href="{{'/posts/' . $post->id}}">{{$post->title}}</a>
        </h1>
    @endforeach
</ul>

<div class="form-group">
        <a href="/posts/create"><button style="margin-left: 2rem;" type="submit" class="btn btn-primary">Create Post</button></a>
</div>

@endsection
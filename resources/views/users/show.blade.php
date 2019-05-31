@extends('layouts.master')

@section('title', 'List of users posts')
    @if($user)
        {{$user->name}}
    @endif

@section('content')

    @if($user && $user->post)
        @foreach($user->post as $post)
            <div class="blog-post">
                <h2 class="blog-post-title">
                    <a href="/posts/{{$post->id}}"> {{$post->title}}</a>
                </h2>
                <p>{{ $post->created_at->toFormattedDateString()}}</p>
                <div class="blog-post">
                    {{ $post->body }}
                </div>
            </div>
        @endforeach
    @endif
@endsection
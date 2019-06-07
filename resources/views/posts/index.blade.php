@extends('layouts.master')

@section('title', 'List of posts')    

@section('content')
    
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{'/posts/' . $post->id}}" style="font-size:2rem;">{{$post->title}}</a>
            </li>
                @if($post->user_id)
                <span style="text-transform: capitalize; font-size: 1rem;">
                    <a href="/user/{{$post->user_id}}">Created by : <span style="font-weight: bold;">{{ $post->user->name }} </span></a>
                </span>
                @endif
        @endforeach
    </ul>

    <nav class="blog-pagination">
        <a 
        class="btn btn-outline-{{ $posts->currentPage() === 1 ? 'disabled' : 'primary'}}"
        href="{{ $posts->previousPageUrl() }}">
        Previous
        </a>
        <a 
        class="btn btn-outline-{{ $posts->hasMorePages() ? 'primary' : 'disabled'}}"
        href="{{ $posts->nextPageUrl() }}">
        Next
        </a>
        Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}
    </nav>

    <div class="form-group">
        <a href="/posts/create"><button style="margin-left: 2rem;" type="submit" class="btn btn-primary">Create Post</button></a>
    </div>
    

@endsection
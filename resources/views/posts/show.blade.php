@extends('layouts.master')

@section('title', $post->title)

@section('content')

    <h1 class="blog-post-title">{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    @if(count($post->comments))
        <h4>Comments:</h4>
            <ul>
                @foreach($post->comments as $comment)
                <li>
                    <p>
                        {{ $comment->author }}
                    </p>

                    <p>
                        {{ $comment->text }}
                    </p>
                </li>
                @endforeach
            </ul>
    @endif

    <h4> Post a comment</h4>

    <form method="POST" action="{{route('comments-post', ['post_id' => $post->id])}}">
        @csrf

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author"/>
        </div>

        <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" id="text" name="text"></textarea>
        </div>

        <div class="form-control">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
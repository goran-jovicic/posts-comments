@extends('layouts.master')

@section('title')
    Create new post
@endsection

@section('content')

    <h2 class="blog-post-title">Create new post</h2>

    <form method="POST" action={{route("store-post")}}>
        {{ csrf_field() }}
            
        <div class="form-group">
            <label for="title" >Title</label>
            <input type="text" class="form-control" id="title" name="title"/>
            @include ('partials.error-message', ['fieldTitle' => 'title'])
        </div>

        <div class="form-group">
            <label for="body" >Body</label>
            <input type="text" class="form-control" id="body" name="body"/>
            @include ('partials.error-message', ['fieldTitle' => 'body'])
        </div>

        <div class="form-group">
            <label for="published">Publish</label>
            <input type="checkbox" class="form-control" id="published" name="published" value="1"/>
        </div>

        <div class="form-group">
            <label for="tags[]">Tags</label><br>
            @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" id="tags[]" value="{{ $tag->id }}"/> {{ $tag->name }} <br>
                @include ('partials.error-message', ['fieldTitle' => 'tags'])
            @endforeach
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit Post</button>
        </div>

    </form>
@endsection

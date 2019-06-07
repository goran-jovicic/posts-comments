@extends('layouts.master')

@section('title', 'List of posts with tag')    

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

@endsection
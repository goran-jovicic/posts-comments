<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Mail\CommentRecieved;

class CommentsController extends Controller
{
    public function store($postId)
    {
        $post = Post::find($postId);

        $post->comments()->create(request()->all());

        \Mail::to($post->user)->send(new CommentRecieved($post));

        return redirect()->route('single-post', ['id' => $postId]);
    }
}

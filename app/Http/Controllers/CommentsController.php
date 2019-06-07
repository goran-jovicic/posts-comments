<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Mail\CommentRecieved;

class CommentsController extends Controller
{
    public function store($postId)
    {
        // dd('stagod');
        $post = Post::find($postId);

        $post->comments()->create(request()->all());
        // dd('stagod');
        \Mail::to($post->user)->send(new CommentRecieved($post));
        
        return back();
    }
}

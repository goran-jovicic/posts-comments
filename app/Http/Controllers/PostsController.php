<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {   
        if(Auth::check()){
            $posts = Post::published();
    
            return view('posts.index', compact('posts'));
        }

        return redirect('/login');
    }

    public function show($id)
    {
        // $post = Post::find($id);
        $post = Post::with('comments')->FindOrFail($id);
        \Log::info($post);
        // $post = Post::where('id', $id)->first();
        $posts = Post::orderBy('id', 'desc')->take(4)->get();

        return view('posts.show',compact('post','posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), Post::STORE_RULES);
        $post = Post::create(request()->all());
        
        return redirect()->route('all-posts');
    }
}

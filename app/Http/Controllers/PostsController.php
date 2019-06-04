<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {   
        // if(Auth::check()){
            $posts = Post::published()->with('user')->paginate(10);
            
            \Log::info($posts);
            
            return view('posts.index', compact('posts'));
        // }

        return redirect('/login');
    }

    public function show($id)
    {
        // $post = Post::find($id);
        $post = Post::with('comments')->FindOrFail($id);
        \Log::info($post);
        // $post = Post::where('id', $id)->first();
        // $posts = Post::orderBy('id', 'desc')->take(4)->get();

        return view('posts.show',compact('post'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('posts.create', compact('tags'));
    }

    public function store()
    {
        $this->validate(request(), Post::STORE_RULES);

        // $post = Post::create(request()->all());
        
        $post = new Post;

        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->user()->id;
        $post->published = request('published');
        $post->save();

        $post->tags()->attach(request ('tags'));

        return redirect()->route('all-posts');
    }
}

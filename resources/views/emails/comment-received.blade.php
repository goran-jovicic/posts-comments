<p> Hello {{ $post->user->name }}</p>

<p style="color:blue; text-align:center;"> You have a new comment on your post 
    <a href="{{ url('posts/' . $post->id) }}">{{ $post->title }}</a>
</p>
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    protected $fillable = [
        'author', 'text', 'post_id'
    ];
}

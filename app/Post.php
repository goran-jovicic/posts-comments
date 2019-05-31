<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'published',
    ];

    public static function published()
    {
        return self::where('published', true);
    }

    const STORE_RULES = [
        'title' => 'required',
        'body' => 'required | min:15'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

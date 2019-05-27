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
        return self::where('published', true)->get();
    }

    const STORE_RULES = [
        'title' => 'required',
        'body' => 'required | min:15'
    ];
}

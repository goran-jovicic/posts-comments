<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Comment;
use App\Post;
use App\User;

class CommentsTableTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testCommentsTableTest()
    {
        $post = factory(Post::class)->make();
        $user = factory(User::class)->create();

        $post->user_id = $user->id;
        $post->save();

        $post->comments()->saveMany(factory(Comment::class, 5)->make());
        
        $this->assertEquals(5, $post->comments->count());
    }
}

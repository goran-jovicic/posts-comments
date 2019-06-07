<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class PostsTableTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testPostTableHasPost()
    {
        $post = factory(Post::class)->make();

        $post->save();

        $this->assertDatabaseHas(
            'posts',
            [
                'title' => $post->title,
            ]
            );
    }
}

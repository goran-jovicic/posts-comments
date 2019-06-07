<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentRecieved;

class CommentRecievedMailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
    public function testCommentRecievedMailSent()
    {
        $this->withoutMiddleware();

        $post = factory(Post::class)->create();
        $user = factory(User::class)->create();

        $post->user_id = $user->id;
        $post->save();

        Mail::fake();

        $response = $this->post('/posts/' . $post->id . '/comments', [
            'author' => $user->name,
            'text' => 'Test for mail sent'
            ]);

        // dd($response->getStatusCode());
        // $result = json_decode($response->getContent(), true);

        // dd($result['message']);

        Mail::assertSent(CommentRecieved::class, function ($mail) use ($post){
            return $mail->post->id === $post->id;
        });
    }
}

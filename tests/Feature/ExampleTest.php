<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostsRouteTest()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    public function testNonExistingRouteTest()
    {
        $response = $this->get('/');

        $response->assertStatus(404);
    }

    public function testPostRouteTest()
    {
        $response = $this->get('/posts/{id}');

        $response->assertStatus(200);
    }

    public function testCreateValid()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
             ->get('/posts/create');
              
        // $response = $this->get('/posts/create');

        $response->assertStatus(200);
    }

    public function testCreateInvalid()
    {
        $response = $this->get('/posts/create');

        $response->assertStatus(500);
    }


}

// Route::get('/posts/create', ['as' => 'create-post', 'uses' => 'PostsController@create']);

// Route::post('/posts', ['as' => 'store-post', 'uses' => 'PostsController@store']);

// Route::get('/posts', ['as' => 'all-posts', 'uses' => 'PostsController@index']);

// Route::get('/posts/{id}', ['as' => 'single-post', 'uses' => 'PostsController@show']);

// Route::post('/posts/{postId}/comments', ['as' => 'comments-post', 'uses' => 'CommentsController@store']);

// Route::get('/register', ['as' => 'register-user', 'uses' => 'RegisterController@create']);

// Route::post('/register', ['as' => 'register-store', 'uses' => 'RegisterController@store']);

// Route::get('/logout', ['as' => 'logout-user', 'uses' => 'LoginController@destroy']);

// Route::get('/login', ['as' => 'login-user', 'uses' => 'LoginController@create']);

// Route::post('/login', ['as' => 'post-user', 'uses' => 'LoginController@store']);

// Route::get('/user/{id}', ['as' => 'user-posts', 'uses' => 'UsersController@show']);

// Route::get('/posts/tags/{tag}', ['as' => 'all-tags', 'uses' => 'TagsController@index']);

// Route::post('/tags/store', ['as'=> 'store-tags', 'uses' => 'TagsController@store']);
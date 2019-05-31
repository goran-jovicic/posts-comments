<?php
use App\Http\Middleware\CheckAge;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/create', ['as' => 'create-post', 'uses' => 'PostsController@create']);

Route::get('/posts', ['as' => 'all-posts', 'uses' => 'PostsController@index']);

Route::get('/posts/{id}', ['as' => 'single-post', 'uses' => 'PostsController@show']);

Route::post('/posts', ['as' => 'store-post', 'uses' => 'PostsController@store']);

Route::post('/posts/{postId}/comments', ['as' => 'comments-post', 'uses' => 'CommentsController@store']);

Route::get('/register', ['as' => 'register-user', 'uses' => 'RegisterController@create']);

Route::post('/register', ['as' => 'register-store', 'uses' => 'RegisterController@store']);

Route::get('/logout', ['as' => 'logout-user', 'uses' => 'LoginController@destroy']);

Route::get('/login', ['as' => 'login-user', 'uses' => 'LoginController@create']);

Route::post('/login', ['as' => 'post-user', 'uses' => 'LoginController@store']);

Route::get('/user/{id}', ['as' => 'user-posts', 'uses' => 'UsersController@show']);

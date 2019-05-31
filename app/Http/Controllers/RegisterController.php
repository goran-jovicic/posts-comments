<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Middleware\CheckAge;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('age', ['only' => 'store']);
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $this->validate(request(), User::STORE_RULES);

        // $user = User::create(request()->all());

        $user = new User;

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        auth()->login($user);

        session()->flash('message', 'Jako si divan sto si se registrovao');
        
        return redirect()->route('all-posts');
    }   
}

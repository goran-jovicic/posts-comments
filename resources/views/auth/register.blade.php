@extends('layouts.master')

@section('title', 'Register')

@section('content')
    <form method="POST" action="/register">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input 
            type="text" 
            class="form-control" 
            id="name" 
            name="name"/>
            @include ('partials.error-message', ['fieldTitle' => 'name'])
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input 
            type="text" 
            class="form-control" 
            id="email" 
            name="email"/>
            @include ('partials.error-message', ['fieldTitle' => 'email'])
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input 
            type="password" 
            class="form-control" 
            id="password" 
            name="password"/>
            @include ('partials.error-message', ['fieldTitle' => 'password'])
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
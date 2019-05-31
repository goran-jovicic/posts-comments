<nav style="background-color: black;">
    <div class="container">
        <div class="row">
            <a class="nav-link" href="/posts">
                <h2>Posts</h2>
            </a>
            @if(!Auth::check())
            <a class="nav-link" href="/register">
                <h2>Register</h2>
            </a>
            @endif
            @if(!Auth::check())
            <a class="nav-link" href="/login">
                <h2>Login</h2>
            </a>
            @endif
            @if(Auth::check())
            <a class="nav-link" href="/logout">
                <h2>Logout</h2>
            </a>
            @endif
        </div>
    </div>
    <hr>
</nav>
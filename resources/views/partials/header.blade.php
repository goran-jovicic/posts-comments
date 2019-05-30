<nav>
    <div class="container">
        <div class="row">
            <a class="nav-link ml-auto" href="/posts">
                <h2>Posts</h2>
            </a>

            <a class="nav-link ml-auto" href="/register">
                <h2>Register</h2>
            </a>

            <a class="nav-link ml-auto" href="/login">
                <h2>Login</h2>
            </a>
            @if(Auth::check())
            <p>
                {{Auth()->user()->email}}
            </p>
            <a class="nav-link ml-auto" href="/logout">
                <h2>Logout</h2>
            </a>
            @endif
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow fixed-top">
    <div class="container">
        <a href="/" class="navbar-brand"><span class="text-primary">MybookRy</span></a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item">
                <a href="/" class="nav-link">Welcome<span class="text-primary"> {{ Auth::user()->name }}</span></a>
            </li>

            <li class="nav-item">
                <a href="/mybooks/{{ Auth::user()->id }}" class="nav-link">My Book</a>
            </li>
            @if(Auth::user()->is_admin == 1)
            <li class="nav-item">
                <a href="/admin/books" class="nav-link">Manage Book</a>
            </li>
            @endif
            @endauth
            @guest
            <li class="nav-item">
                <a href="/login" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="/register" class="nav-link">Register</a>
            </li>
            @endguest
            @auth
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="btn btn-danger">Log Out</button>
            </form>
            @endauth
        </ul>
    </div>
    </div>
</nav>

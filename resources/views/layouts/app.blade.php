<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <ul>
            <li><a href="/dashboard">🏠 Dashboard</a></li>
            <li><a href="#">📁 Fayllar</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">🔓 Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

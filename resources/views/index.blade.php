<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    @if(Route::has('login'))
        <div>
            @auth
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
            {{Auth::user()->name}}

            @else
                <a href="{{route('login')}}">Login</a>
                <a href="{{route('register')}}">Register</a>
            @endauth
            @endif
        </div>
    <h1>Home</h1>
</body>
</html>
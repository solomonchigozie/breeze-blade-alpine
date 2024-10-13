<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>User Dashboard</h3>

    @if(Auth::check())
    <p>Name : {{  Auth::user()->name }} </p>
    <p>Email : {{  Auth::user()->email }} </p>

    @endif

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>


</body>
</html>
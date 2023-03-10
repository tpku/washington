<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>


    </head>
    <body>
        <h1>Home</h1>
        <nav>
            <ul>
                <li><a href="/workout">Your Workouts</a></li>
                <li><a href="/logout">logout</a></li>
                <li><a href="/settings">settings</a></li>
            </ul>
        </nav>
    </body>
</html>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Workouts</title>


    </head>
    <body>


        @isset($workouts)
        <ul>
            @foreach ($workouts as $workout)
                <li><a href="workout/{{$workout->id}}"> {{$workout->title}} | {{$workout->date}} </a></li>
            @endforeach
        </ul>
        @endisset

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

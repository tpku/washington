
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Workout</title>


    </head>
    <body>

        <a href="/workout/{{ $workout->id }}/edit">Edit</a>
        <h1>{{$workout->title}}</h1>
        <h2>{{$workout->date}}</h2>

        @isset($exercises)
        <ul>
            @foreach ($exercises as $exercise)
                <li>{{$exercise->title}} | {{$exercise->duration}} {{$exercise->unit}}</li>
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

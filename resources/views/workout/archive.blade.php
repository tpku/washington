
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Workouts</title>


    </head>
    <body>
        
        <ul>
            <li>Armar</li>
            <li>Ben</li>
            <li>Rygg</li>
            <li>Bröst</li>
        </ul>
        
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
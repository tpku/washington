
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Settings</title>


    </head>
    <body>

        <form method="post" action="/user/{{ $id }}">
            @csrf
            @method('PATCH')
            <div>
                <label for="name">Name</label>
                <input name="name" id="name" type="name" value="{{ $name  }}"/>
            </div>
            <div>
                <label for="email">Email</label>
                <input name="email" id="email" type="email" value="{{ $email }}"/>
            </div>
            <div>
                <label for="new_password">New password</label>
                <input name="new_password" id="new_password" type="password" />
            </div>
            <div>
                <label for="new_password_confirmation">Confirm password</label>
                <input name="new_password_confirmation" id="new_password_confirmation" type="password" />
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" id="password" type="password" />
            </div>
            <button type="submit">Save changes</button>
        </form>
        <form action="/user/{{$id}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Remove my self</button>
        </form>
        <a href="/">Back</a>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </body>
    </html>

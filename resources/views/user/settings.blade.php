
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Settings</title>


    </head>
    <body>
        
        <form method="post" action="/user/">
            @csrf
            @method('PATCH')
            <div>
                <label for="name">Name</label>
                <input name="name" id="name" type="name" placeholder="{{ $name  }}"/>
            </div>
            <div>
                <label for="email">Email</label>
                <input name="email" id="email" type="email" placeholder="{{ $email }}"/>
            </div>
            <div>
                <label for="new-password">New password</label>
                <input name="new-password" id="new-password" type="password" />
            </div>
            <div>
                <label for="repeat-password">Repeat password</label>
                <input name="repeat-password" id="repeat-password" type="password" />
            </div>
            <div>
                <label for="password">Password</label>
                <input name="password" id="password" type="password" />
            </div>
            <button type="submit">Save changes</button>
        </form>
        <a href="/">Back</a>
    </body>
    </html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit Workout</title>


    </head>
    <body>
        <h2>Create Workout</h2>
        <form method="post" action="/workout/1">
            @csrf
            @method('PATCH')
            <div>
                <label for="title">Title</label>
                <input name="title" id="title" type="name" />
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="arms">Arms</option>
                    <option value="shoulders">Shoulders</option>
                    <option value="back">Back</option>
                    <option value="chest">Chest</option>
                    <option value="legs">Legs</option>
                    <option value="compounds">Compound</option>
                    <option value="upperbody">Upper Body</option>
                    <option value="Lower">Lower Body</option>
                </select>
            </div>

            <div>
                <label for="date">Date</label>
                <input type="date" id="start" name="date" value="">
            </div>
            <button type="submit">Register</button>
        </form>
        
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
        
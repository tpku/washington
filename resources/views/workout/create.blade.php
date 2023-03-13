<form action="/workout/" method="post">
    @csrf
    @method('POST')

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
        <?php
        $dt = new DateTime();
        ?>
        <input type="date" id="date" name="date" value="{{$dt->format( 'Y-m-d' )}}">
    </div>

    <button type="submit">Add Workout</button>
</form>


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

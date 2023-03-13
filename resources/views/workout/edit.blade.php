
        <h2>Update Workout</h2>
        <form method="post" action="/workout/{{ $workout->id }}">
            @csrf
            @method('PATCH')
            <div>
                <label for="title">Title</label>
                <input name="title" id="title" type="name" value="{{$workout->title}}"/>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10">{{$workout->description}}</textarea>
            </div>
            <div>
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="{{$workout->category}}">{{$workout->category}}</option>
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
                    $dt = new DateTime($workout->date);
                ?>
                <input type="date" id="date" name="date" value="{{$dt->format( 'Y-m-d' )}}">
            </div>
            <button type="submit">update</button>
        </form>

        @isset($exercises)
            <ul>
                @foreach ($exercises as $exercise)
                <li>
                    <form action="/exercise/{{ $exercise->id }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="workout_id" value="{{ $workout->id }}">
                        <div>
                            <label for="{{$exercise->id}}_title">title</label>
                            <input type="text" id="{{$exercise->id}}_title" name="title" value="{{$exercise->title}}">
                        </div>
                        <div>
                            <label for="{{$exercise->id}}_duration">duration</label>
                            <input type="text" id="{{$exercise->id}}_duration" name="duration" value="{{$exercise->duration}}">
                        </div>
                        <div>
                            <label for="{{$exercise->id}}unit">unit</label>
                            <input type="text" id="{{$exercise->id}}unit" name="unit" value="{{$exercise->unit}}">
                        </div>
                        <button type="submit">update</button>
                    </form>

                    <form method="post" action="/exercise/{{ $exercise->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">delete exercise</button>
                    </form>
                </li>
                @endforeach
            </ul>
        @endisset

        <form action="/exercise/" method="post">
            @csrf
            @method('POST')
            <input type="hidden" name="workout_id" value="{{ $workout->id }}">
            <input type="text" name="title" placeholder="title">
            <input type="text" name="duration" placeholder="duration">
            <input type="text" name="unit" placeholder="unit">
            <input type="submit" value="add exercise">
        </form>

        <form method="post" action="/workout/{{ $workout->id }}">
            @csrf
            @method('DELETE')
            <button type="submit">delete workout</button>
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

        <a href="/workout/{{$workout->id}}">Back</a>


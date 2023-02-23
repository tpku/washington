<form method="post" action="/user/">
    @csrf
    <div>
        <label for="name">Name</label>
        <input name="name" id="name" type="name" />
    </div>
    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
    </div>
    <button type="submit">Register</button>
</form>
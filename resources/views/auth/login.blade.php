<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    @if($errors->any())
        <div>
            {{ $errors->first('login_error') }}
        </div>
    @endif
    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>

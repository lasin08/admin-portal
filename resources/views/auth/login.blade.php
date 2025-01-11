<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-container">
        <h1 class="admin-heading">Admin Portal</h1>
        <h2>Login</h2>
        
        @if($errors->any())
            <div class="alert">
                {{ $errors->first('login_error') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div>
                <label for="username">Username:</label>
                <input type="text" name="name" id="name" required>
            </div>
            
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

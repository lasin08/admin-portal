<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="{{ asset('css/admin-portal.css') }}">
     <link rel="stylesheet" href="{{ asset('css/customer-form.css') }}">
</head>
<body class="admin-portal-body">
    <header class="admin-portal-header">
        <h3>ADMIN PORTAL</h3>
        <form action="/logout" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="admin-portal-logout-btn">Logout</button>
        </form>
    </header>
    <div class="admin-portal-container" style="display: flex; flex-direction: row; height: 100%;">
        <nav class="admin-portal-nav">
            <ul>
               <li>
            <a href="{{ route('index', ['type' => 'customer']) }}" 
               class="{{ request()->routeIs('index') && request('type') === 'customer' ? 'selected' : '' }}">
               Customer
            </a>
        </li>
        <li>
            <a href="{{ route('index', ['type' => 'invoice']) }}" 
               class="{{ request()->routeIs('index') && request('type') === 'invoice' ? 'selected' : '' }}">
               Invoice
            </a>
        </li>
            </ul>
        </nav>
        <main class="admin-portal-main">
            @yield('content')
        </main>
    </div>
</body>
</html>

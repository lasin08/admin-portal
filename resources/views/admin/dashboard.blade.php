<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="{{ asset('css/admin-portal.css') }}">
</head>
<body class="admin-portal-body">
    <header class="admin-portal-header">
        <h1>Admin Portal</h1>
        <form action="/logout" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="admin-portal-logout-btn">Logout</button>
        </form>
    </header>
    <div style="display: flex;">
        <nav class="admin-portal-nav">
            <ul>
                <li><a href="/customers">Customer</a></li>
                <li><a href="/invoices">Invoice</a></li>
            </ul>
        </nav>
        <main class="admin-portal-main">
            <h2>Welcome to the Admin Portal</h2>
            <p>Use the navigation menu to manage customers and invoices.</p>
        </main>
    </div>
</body>
</html>

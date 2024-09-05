<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- Link to your admin CSS file -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            flex-direction: row; /* Ensure sidebar and content are side by side */
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            height: 100vh;
            position: fixed; /* Keep sidebar fixed on the left */
            top: 0;
            left: 0;
            overflow-y: auto; /* Enable scrolling if sidebar content is too long */
        }

        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #ecf0f1;
            margin-left: 250px; /* Offset content to the right of the fixed sidebar */
            min-height: 100vh;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            padding: 10px 20px;
            background-color: #ffffff;
            border-bottom: 1px solid #ddd;
        }

        .logout-button {
            background-color: #e74c3c;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .logout-button:hover {
            background-color: #c0392b;
        }
    </style>
    @vite('resources/css/admin.css')


</head>
<body>

<div class="sidebar">
    <a href="{{ url('/admin') }}">Dashboard</a>
    <a href="{{ url('/admin/projects') }}">Projects</a>
    <a href="{{ url('/admin/opencalls') }}">Open Calls</a>
    <a href="{{ url('/admin/settings') }}">Settings</a>
    <!-- Add more sidebar links as needed -->
</div>

<div class="content">
    <div class="top-bar">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

    @yield('content') <!-- Main content section -->
</div>

</body>
</html>

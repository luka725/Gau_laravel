<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App')</title>
    <!-- Add your stylesheets, scripts, or other head content here -->
</head>
<body>
    <header>
        <!-- Add your header content here -->
    </header>

    <nav>
        <!-- Add your navigation menu or links here -->
    </nav>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <!-- Add your footer content here -->
    </footer>

    <!-- Add your scripts or other footer content here -->
</body>
</html>
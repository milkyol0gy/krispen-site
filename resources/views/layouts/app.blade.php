<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Static Instagram')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f6f6f6; }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <nav class="bg-white shadow p-4 text-center font-semibold text-gray-700">
        Static Instagram Admin
    </nav>

    <main class="flex-grow container mx-auto py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 text-sm">
        &copy; {{ date('Y') }} Static Instagram Project
    </footer>

    <script async src="//www.instagram.com/embed.js"></script>
    <script>
        window.addEventListener('load', function() {
            if (window.instgrm) window.instgrm.Embeds.process();
        });
    </script>
</body>
</html>

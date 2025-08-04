<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8">
  <title>My Blog</title>
  @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Tailwind ulanishi -->
</head>
<body class="bg-gray-50">
  @yield('content')
</body>
</html>
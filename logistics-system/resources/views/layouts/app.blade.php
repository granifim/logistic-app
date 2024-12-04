<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Система управления логистикой')</title>

    <!-- Стили -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@include('partials.navbar')

<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>

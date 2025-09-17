<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | پنل ادمین</title>
    @vite(['resources/scss/main.scss', 'resources/js/app.js'])
</head>
<body>
<header>
    <h1>پنل مدیریت</h1>
    <nav>
        <a href="{{ route('admin.products.index') }}">مدیریت محصولات</a>
    </nav>
</header>

<main>
    @yield('content')
</main>
</body>
</html>

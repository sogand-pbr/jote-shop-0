<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | فروشگاه</title>

    {{-- لینک SCSS و JS --}}
    @vite(['resources/scss/main.scss', 'resources/js/app.js'])
</head>
<body>

{{-- هدر / ناوبری --}}
<header>
    <h1>فروشگاه</h1>
</header>

{{-- بخش محتوا --}}
<main>
    @yield('content')
</main>

{{-- فوتر --}}
<footer>
    <p>تمامی حقوق محفوظ است.</p>
</footer>

</body>
</html>

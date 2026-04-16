<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'posts' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <x-navbar />

    <main class="max-w-7xl mx-auto py-10 px-4">
        {{ $slot }}
    </main>

    <footer class="text-center py-6 text-gray-500 border-t">
        جميع الحقوق محفوظة © 2026
    </footer>

</body>
</html>
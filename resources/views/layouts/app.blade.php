<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('RicetteBelle')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('includes.header')

    <main id="main-container">
        <div class="container mx-auto p-4">
            @yield('content')
        </div>
    </main>

    @include('includes.footer')
</body>
</html>
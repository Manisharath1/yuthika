<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yuthika</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <!-- Optionally, you can also include your CSS files here -->

    </head>
    <body>
        @include('auth.login') <!-- This assumes your login view is stored in resources/views/auth/login.blade.php -->
        {{-- @include('auth.register') <!-- This assumes your login view is stored in resources/views/auth/login.blade.php --> --}}
    </body>
</html>

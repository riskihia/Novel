<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        @isset($notif)
            {{ $notif }}
        @endisset
        @vite('resources/js/app.js')
    </body>
</html>
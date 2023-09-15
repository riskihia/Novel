<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="/css/animate.min.css">
    </head>
    <body>
        <h1>Saya ada di swal</h1>
        <hr>

        @include('sweetalert::alert')
        @vite('resources/js/app.js')
    </body>
</html>
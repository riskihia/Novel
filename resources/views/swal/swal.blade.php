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
        <button id="tombol">Click Me</button>
        
         <script src="/js/sweetalert2@11.js"></script>
        
         <script>
         let tombol = document.getElementById('tombol');
         tombol.addEventListener('click',jalankanSweetAlert);
        
         function jalankanSweetAlert(){
            Swal.fire('Selamat!','Anda berhasil menjalankan Sweet Alert')
         }
         </script>
        @vite('resources/js/app.js')
    </body>
</html>
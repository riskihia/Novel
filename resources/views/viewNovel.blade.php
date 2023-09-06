<!DOCTYPE html>
<html class="h-full scroll-smooth bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Novel Terjemahan</title>
        @vite('resources/css/app.css')
    </head>
    <body class="h-full">
        {{-- Header section --}}
        @include('homepage.header')

        <div class="bg-gray-100 min-h-screen mt-16 py-10 px-2">
            <div class="bg-white shadow-md rounded-lg max-w-7xl mx-auto px-6 lg:px-8 lg:w-1/2">
                
                <h1 class="text-2xl">{{$novel->judul}}</h1>
                <div>
                    <img class="h-60 w-40 bg-gray-50 mx-auto rounded-lg shadow-lg" src="{{$novel->avatar}}" alt="">
                </div>
                <div>
                    <h2 class="text-xl">Sinopsis</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate corporis ut sit consequuntur ex quia repellendus perferendis sunt! Porro, reiciendis!
                        <br><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus unde incidunt officiis, corrupti possimus, neque inventore magnam rerum sequi, iure tempore magni laudantium suscipit veniam! Numquam blanditiis facilis consequatur eum mollitia, quas nostrum ullam illum sint cupiditate fuga sunt dolore accusamus quis esse corrupti sequi iste laudantium consequuntur hic autem?
                    </p>
                </div>
                <div>
                    <h2 class="text-xl">Detail</h2>
                    <p class="my-2"><span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Judul</span> : {{$novel->judul}}</p>
                    <p class="my-2"><span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Status</span> : {{$novel->judul}}</p>
                    <p class="my-2"><span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Link-terjemahan</span> : {{$novel->judul}}</p>
                    <p class="my-2"><span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Author</span> : {{$novel->judul}}</p>
                    <p class="my-2"><span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Genre</span> : Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores ipsam officiis illo dolore accusantium voluptatem incidunt obcaecati aliquam ex. Nulla blanditiis minus, tempora facilis rem ut nostrum molestiae cupiditate optio?</p>
                </div>
            </div>
        </div>

        {{-- Section footer --}}
        @include('homepage.footer')

    @vite('resources/js/app.js')
    </body>
</html>
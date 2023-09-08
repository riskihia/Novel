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
                <div class="text-center">
                    <img class="h-60 w-40 bg-gray-50 mx-auto rounded-lg shadow-lg" src="{{$novel->avatar}}" alt="">

                    @if ($novel->users->contains(Auth::user()))
                        
                        <form action="{{route("addLibraryNovel")}}" method="POST">
                            @csrf
                            <input type="hidden" name="judulNovel" value="{{$novel->judul}}">
                            <button class="bg-violet-500 my-2 py-1 px-3 text-white text-lg shadow-lg rounded-md">add to library</button>
                        </form>
                    @else
                    <button class="bg-violet-500 my-2 py-1 px-3 text-white text-lg shadow-lg rounded-md">Delete to library</button>
                    @endif

                </div>
                <div>
                    <h2 class="text-xl">Sinopsis</h1>
                    <p>{{$novel->sinopsis}}</p>
                </div>
                <div>
                    <h2 class="text-xl">Detail</h2>
                    <p class="my-2"><span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Judul</span> : {{$novel->judul}}</p>

                    <p class="my-2"><span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Status</span> : {{$novel->status}}</p>

                    <p class="my-2"><span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Link-terjemahan</span> : {{$novel->link}}</p>

                    <p class="my-2"><span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Author</span> : {{$novel->author_name}}</p>

                    <p class="my-2">
                        <span class="bg-violet-500 px-2 py-1 rounded-lg mx-2">Genre</span>
                        @foreach ($novel->tags as $tag)
                            {{ $tag->nama }}{{-- Menampilkan nama tag --}}
                            @if (!$loop->last)
                                , {{-- Tambahkan koma jika bukan tag terakhir --}}
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>

        {{-- Section footer --}}
        @include('homepage.footer')

    @vite('resources/js/app.js')
    </body>
</html>
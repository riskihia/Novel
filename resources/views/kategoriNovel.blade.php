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

        <div class="min-h-screen bg-gray-100">
            <div class="py-24">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="text-2xl">Kategory</h1>
                            
                            {{-- Tag atau genre --}}
                            <div x-data="{ expanded: false }">
                                <button id="button-genre" @click="expanded = ! expanded" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 my-3">Genre <i class="fa-solid fa-angle-down"></i></button>
                                <div id="isi-genre" x-show="expanded" x-collapse class="hidden grid-cols-3 md:grid-cols-5 gap-2 md:gap-8">
                                    @forelse ($tags as $tag)
                                    <a href="{{url("/genre/$tag->nama")}}" class="bg-gray-300 text-center py-2 px4 text-sm">{{$tag->nama}}</a>
                                    @empty
                                        <span>None off tag</span>
                                    @endforelse
                                    
                                </div>
                                
                            </div>

                            {{-- Author --}}
                            <div x-data="{ expanded: false }">
                                <button id="button-author" @click="expanded = ! expanded" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 my-3">Author <i class="fa-solid fa-angle-down"></i></button>
                                <div id="isi-author" x-show="expanded" x-collapse class="hidden grid-cols-3 md:grid-cols-5 gap-2 md:gap-8">
                                    @forelse ($authors as $author)
                                    <a href="{{url("/author/$author")}}" class="bg-gray-300 text-center py-2 px4 text-sm">{{$author}}</a>
                                    @empty
                                        <span>None off tag</span>
                                    @endforelse
                                </div>
                                
                            </div>
                            
                            <div x-data="{ expanded: false }">
                                <button id="button-status" @click="expanded = ! expanded" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 my-3">Status <i class="fa-solid fa-angle-down"></i></button>
                                <div id="isi-status" x-show="expanded" x-collapse class="hidden grid-cols-3 md:grid-cols-5 gap-2 md:gap-8">
                                    @forelse ($status as $status_item)
                                    <a href="{{url("/status/$status_item")}}" class="bg-gray-300 text-center py-2 px4 text-sm">{{$status_item}}</a>
                                    @empty
                                        <span>None off tag</span>
                                    @endforelse
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section kategori --}}
        @include('homepage.footer')
        @vite('resources/js/app.js')
    </body>
</html>
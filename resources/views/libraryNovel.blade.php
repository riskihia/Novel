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
                            <h1 class="text-2xl">Library</h1>

                            @if(isset($novels))    
                              <ul role="list" class="divide-y divide-gray-100">

                                  @forelse ($novels as $novel)
                                    <li class="flex justify-between gap-x-6 py-5">
                                      <div class="flex min-w-0 gap-x-4">
                                        
                                        <a href="{{$novel->link}}">
                                          <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{$novel->avatar}}" alt="">
                                        </a>
          
                                        <div class="min-w-0 flex-auto">
                                          <a href="/{{$novel->judul}}">
                                            <p class="text-sm font-semibold leading-6 text-gray-900">{{$novel->judul}}</p>
                                          </a>
                                          <a href="{{$novel->link}}" class="mt-1 truncate text-xs leading-5 text-gray-500">#tagss #tag</a>
                                        </div>
                                      </div>
                                      
                                    </li>
                                  @empty
                                    <li class="flex justify-between gap-x-6 py-5">
                                      <div class="flex min-w-0 gap-x-4">
                                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://www.mtlnovel.net/2023/08/rebirth-era-orphan-girls-have-space-208x300.jpg.webp" alt="">
                                        <div class="min-w-0 flex-auto">
                                          <p class="text-sm font-semibold leading-6 text-gray-900">Reborned as an Orphan Girl With a Spatial Pocket!</p>
                                          <p class="mt-1 truncate text-xs leading-5 text-gray-500">id.mtlnovel.com</p>
                                        </div>
                                      </div>
                                      <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                        <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                                        <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                                      </div>
                                    </li>
                                  @endforelse
                              </ul>
                              <div class="container mx-auto px-6">
                                {{$novels->links()}}
                              </div>
                            @else
                            <p class="text-sm">Silahkan <a href="/login" class="text-blue-500 text-sm">login</a> untuk menambahkan ke library</p>
                            @endif
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
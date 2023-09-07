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

        {{-- List Novel --}}
        <div class="min-h-screen bg-gray-100">
          <div class="py-24">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                      <div class="p-6 text-gray-900">
                        <div class="relative">
                          <div>
                            <form action="{{route("cari-list-novel")}}" method="POST">
                              @csrf
                              <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                              <div class="relative">
                                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                      <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                      </svg>
                                  </div>
                                  <input type="search" id="default-search" value="{{$searchQuery ?? ""}}" name="cari-novel" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Mockups, Logos...">
                                  
                                  <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                              </div>
                            </form>
                          </div>
                          <div id="hasilnya" class="absolute left-0 bg-white border border-gray-200 right-0">
                
                          </div>
                          <h1 class="text-2xl">List novel terjemahan</h1>
                          <ul role="list" class="divide-ydivide-gray-100">
                            @forelse ($novels as $novel)
                              <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                  <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{$novel->avatar}}" alt="">
                                  <div class="min-w-0 flex-auto">
                                    <a href="/{{$novel->judul}}" class="block text-sm font-semibold leading-6 text-gray-900">{{$novel->judul}}</a>
                                    
                                    <a href="{{$novel->link}}" class="mt-1 truncate text-xs leading-5 text-gray-500">{{$novel->judul}}</a>
                                  </div>
                                </div>
                                <div class="shrink-0 sm:flex sm:flex-col sm:items-end">
                                  <div>
                                    <span class="text-sm leading-6 text-gray-900">Co-founder / CEO</span>
                                  </div>
                                  <p class="mt-1 text-xs leading-5 text-gray-500">{{$novel->updated_at->diffForHumans()}}</p>
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
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        
        {{-- Section footer --}}
        @include('homepage.footer')

    @vite('resources/js/app.js')
    @include('homepage.script')
    </body>
</html>

<!DOCTYPE html>
<html class="h-full scroll-smooth bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Novel Terjemahan</title>
        @vite('resources/css/app.css')
    </head>
    <body class="h-full">
        
        {{-- Section untuk hero --}}
        <div id="HOME" class="bg-white">
            <header class="absolute inset-x-0 top-0 z-50">
              <nav class="flex items-center justify-between p-6 lg:px-8">
                <div class="flex lg:flex-1">
                  <a href="#" class="-m-1.5 p-1.5">
                    {{-- <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt=""> --}}
                    Logo
                  </a>
                </div>
                <div class="flex lg:hidden">
                  <button id="openButtonNav" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                  </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                  <a href="#HOME" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
                  <a href="#FEATURES" class="text-sm font-semibold leading-6 text-gray-900">Features</a>
                  <a href="#LIST-NOVEL" class="text-sm font-semibold leading-6 text-gray-900">List Novel</a>
                  <a href="#REQUEST" class="text-sm font-semibold leading-6 text-gray-900">Request</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                  @if (Route::has('login'))
                      <div class="text-right z-10">
                          @auth
                          <div class="flex">
                              <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">{{ Auth::user()->name }}</a>
                              <div class="mx-2">|</div>
                              <form class="cursor-pointer" method="POST" action="{{ route('logout') }}">
                                  @csrf
      
                                  <a class="font-semibold text-gray-600 hover:text-gray-900" :href="route('logout')"
                                          onclick="event.preventDefault();
                                                      this.closest('form').submit();">
                                      {{ __('Log Out') }}
                                  </a>
                              </form>
                          </div>
                            {{-- <a href="{{ url('/logout') }}" class="font-semibold text-red-600 hover:text-red-900">Logout</a> --}}
                          @else
                              <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>

                              @if (Route::has('register'))
                                  <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                              @endif
                          @endauth
                      </div>
                  @endif
                  {{-- <a href="/login" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a> --}}
                </div>
              </nav>
              <!-- Mobile menu, show/hide based on menu open state. -->
              <div id="navMobile" class="hidden">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                  <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                      Logo
                    </a>
                    <button id="closeButtonNav" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                      <span class="sr-only">Close menu</span>
                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>
                  <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                      <div class="space-y-2 py-6">
                        <a href="#HOME" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Home</a>
                        <a href="#FEATURES" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                        <a href="#LIST-NOVEL" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">List Novel</a>
                        <a href="#REQUEST" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Request</a>
                      </div>
                      <div class="py-6">
                        @if (Route::has('login'))
                            <div class="sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                <div class="flex">
                                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">{{ Auth::user()->name }}</a>
                                    <div class="mx-2">|</div>
                                    <form class="cursor-pointer" method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <a class="font-semibold text-gray-600 hover:text-gray-900" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </div>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                        {{-- <a href="/login" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </header>
          
            <div class="relative isolate px-6 pt-14 lg:px-8">
              <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                  <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    Kami sudah upload post terbaru. <a href="#" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span>Baca Selengkapnya <span aria-hidden="true">&rarr;</span></a>
                  </div>
                </div>
                <div class="text-center">
                  <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Lovers of Novel Translation</h1>
                  <p class="mt-6 text-lg leading-8 text-gray-600">Merayakan keindahan dan keajaiban terjemahan novel. Menyajikan cerita global dalam bahasa lokal, menghubungkan jiwa penikmat kata ke dunia yang tak terbatas.</p>
                  <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Join Komunitas</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Selengkapnya <span aria-hidden="true">→</span></a>
                  </div>
                </div>
              </div>
            </div>
        </div>

        {{-- Section untuk Feature --}}
        <div id="FEATURES" class="bg-white py-24 sm:py-32">
          <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
              <h2 class="text-base font-semibold leading-7 text-indigo-600">Novel Terjemahan</h2>
              <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Sharing link novel-novel terjemahan</p>
              <p class="mt-6 text-lg leading-8 text-gray-600">Temukan dunia petualangan tak terbatas melalui koleksi pilihan novel terjemahan kami. Rasakan kisah luar biasa dalam setiap halaman..</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
              <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                <div class="relative pl-16">
                  <dt class="text-base font-semibold leading-7 text-gray-900">
                    <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                      <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                      </svg>
                    </div>
                    Request Novel
                  </dt>
                  <dd class="mt-2 text-base leading-7 text-gray-600">Request novel yang kalian sukai dan ingin membacanya. </dd>
                </div>
                <div class="relative pl-16">
                  <dt class="text-base font-semibold leading-7 text-gray-900">
                    <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                      <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                      </svg>
                    </div>
                    Komunitas yang ramah
                  </dt>
                  <dd class="mt-2 text-base leading-7 text-gray-600">Semua anggota ramah dan saling membantu dan berbagi.</dd>
                </div>
                <div class="relative pl-16">
                  <dt class="text-base font-semibold leading-7 text-gray-900">
                    <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                      <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                      </svg>
                    </div>
                    Recomendation
                  </dt>
                  <dd class="mt-2 text-base leading-7 text-gray-600">Minta rekomendasi kepada sesama pecinta novel terjemahan.</dd>
                </div>
                <div class="relative pl-16">
                  <dt class="text-base font-semibold leading-7 text-gray-900">
                    <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                      <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                      </svg>
                    </div>
                    Up to date
                  </dt>
                  <dd class="mt-2 text-base leading-7 text-gray-600">Selalu mendapatkan sumber yang terbaru dan up to date.</dd>
                </div>
              </dl>
            </div>
          </div>
        </div>
        
        {{-- Section untuk list novel --}}
        <div id="LIST-NOVEL" class="container w-3/4 mx-auto">
          <h1 class="text-2xl">List novel terjemahan</h1>
          <ul role="list" class="divide-y divide-gray-100">
            @forelse ($novels as $novel)
              <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                  <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{$novel->avatar}}" alt="">
                  <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">{{$novel->judul}}</p>
                    <a href="{{$novel->link}}" class="mt-1 truncate text-xs leading-5 text-gray-500">{{$novel->judul}}</a>
                  </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                  <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
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
        </div>


        {{-- Section request --}}
        <div id="REQUEST" class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Request novel</h2>
          </div>
        
          <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
              <div>
                <label for="judul" class="block text-sm font-medium leading-6 text-gray-900">Judul novel</label>
                <div class="mt-2">
                  <input id="judul" name="judul" type="judul" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
        
              <div>
                <label for="link-novel" class="block text-sm font-medium leading-6 text-gray-900">Link novel</label>
                <div class="mt-2">
                  <input id="link-novel" name="link-novel" type="link-novel"  required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
        
              <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Request</button>
              </div>
            </form>
          </div>
        </div>

        {{-- Section footer --}}
        <footer class="bg-white rounded-lg shadow m-4">
          <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
              <div class="sm:flex sm:items-center sm:justify-between">
                  <a href="#" class="flex items-center mb-4 sm:mb-0">
                      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
                      <span class="self-center text-2xl font-semibold whitespace-nowrap">LOGO</span>
                  </a>
                  <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0">
                      <li>
                          <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                      </li>
                      <li>
                          <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                      </li>
                      <li>
                          <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Contact</a>
                      </li>
                  </ul>
              </div>
              <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
              <span class="block text-sm text-gray-500 sm:text-center">© 2023 <a href="#" class="hover:underline">Novel Terjemahan™</a>. All Rights Reserved.</span>
          </div>
        </footer>

    @vite('resources/js/app.js')
    </body>
</html>

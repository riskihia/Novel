<header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8 bg-white">
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
        <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
        <a href="#FEATURES" class="text-sm font-semibold leading-6 text-gray-900">Library</a>
        <a href="/kategori" class="text-sm font-semibold leading-6 text-gray-900">Kategori</a>
        <a href="/list-novel" class="text-sm font-semibold leading-6 text-gray-900">List Novel</a>
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

                        <a class="rounded-md shadow-sm bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white" :href="route('logout')"
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
      <div id="sidebar-backdrop" class="fixed inset-0 z-50"></div>
      <div class="fixed inset-y-0 left-0 z-50 w-1/2 overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
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
              <a href="/" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Home</a>

              <a href="#FEATURES" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Library</a>
              
              <a href="/kategori" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Kategori</a>

              <a href="/list-novel" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">List Novel</a>

              <a href="#REQUEST" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Request</a>
            </div>
            <div class="py-6">
              @if (Route::has('login'))
                  <div class="sm:inset-0 text-center z-10 w-full">
                      @auth
                      <div class="flex w-full">
                          <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">{{ Auth::user()->name }}</a>
                          <div class="mx-2">|</div>
                          <form class="cursor-pointer" method="POST" action="{{ route('logout') }}">
                              @csrf
  
                              <a class="rounded-md shadow-sm bg-red-600 px-3.5 py-2.5 text-sm font-semibold text-white" :href="route('logout')"
                                      onclick="event.preventDefault();
                                                  this.closest('form').submit();">
                                  {{ __('Log Out') }}
                              </a>
                          </form>
                      </div>
                      @else
                          <a href="{{ route('login') }}" class="rounded-md shadow-sm bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white">Log in</a>

                          @if (Route::has('register'))
                              <a href="{{ route('register') }}" class="rounded-md shadow-sm bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white ">Register</a>
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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("Halaman Novel") }} --}}
                    <h1 class="text-2xl">List novel terjemahan</h1>
                    <ul role="list" class="divide-y divide-gray-100">

                        @forelse ($novels as $novel)
                          <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                              
                              <a href="{{$novel->link}}">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{$novel->avatar}}" alt="">
                              </a>

                              <div class="min-w-0 flex-auto">
                                <a href="{{$novel->link}}">
                                  <p class="text-sm font-semibold leading-6 text-gray-900">{{$novel->judul}}</p>
                                </a>
                                <a href="{{$novel->link}}" class="mt-1 truncate text-xs leading-5 text-gray-500">#tagss #tag</a>
                              </div>
                            </div>
                            <div class="shrink-0 sm:flex sm:flex-col sm:items-end">
                              <div>
                                <form action="{{ route('novels-edit', $novel->id) }}" method="GET" class="inline">
                                  @csrf
                                  <button type="submit" class="text-sm leading-6 text-gray-900 px-2 py-1 bg-yellow-200 rounded-md">Edit</button>
                                </form>
                                <form action="{{route("novels-delete", $novel->id)}}" method="POST" class="inline">
                                  @method("DELETE")
                                  @csrf
                                  <button type="submit" class="inline text-sm leading-6 text-gray-900 px-2 py-1 bg-red-200 rounded-md">Delete</button>
                                </form>
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
</x-app-layout>

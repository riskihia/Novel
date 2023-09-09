<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("Halaman Request") }} --}}
                    @foreach ($requests as $request)
                        <div>
                            <ul role="list" class="divide-y border border-gray-300 divide-gray-100 mb-2">
                                <li class="flex justify-between items-center gap-x-6 py-2 px-3">
                                  <div class="min-w-0">
                                    <div class="min-w-0 flex-auto">
                                      <p class="text-sm font-semibold leading-6 text-gray-900">{{$request->judul}}</p>
                                    </div>
                                  </div>
                                  <div class="shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <form action="{{route("requests-delete", $request->id)}}" method="POST" class="inline">
                                      @method("DELETE")
                                      @csrf
                                      <button type="submit" class="inline text-sm leading-6 text-gray-900 px-2 py-1 bg-green-200 rounded-md">Done</button>
                                    </form>
                                  </div>
                                </li>
                              </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

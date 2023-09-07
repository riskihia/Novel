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

                    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                        
                      <form class="space-y-6" action="{{route("novels-update", $novel)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method("PUT")
                            <div>
                              <label for="file-upload" class="flex border-0 ring-1 ring-inset ring-gray-300 rounded-lg w-full items-center py-2 px-3 cursor-pointer" x-data="{ files: null }">
                                
                                <input name="avatar" class="sr-only" id="file-upload" type="file" accept="image/png, image/jpeg" x-on:change="files = Object.values($event.target.files)"/>
                                
                                <i class="fa-solid fa-image fa-2x me-2"></i> 
                                <span x-text="files ? files.map(file => file.name).join(', ') : 'Choose single file...'"></span>
                              </label>
                              @error('avatar')
                                    <span class="text-red-500">{{$message}} error </span>
                              @enderror
                            </div>
                            
                            {{-- Judul --}}
                            <div>
                              <label for="judul" class="block text-sm font-medium leading-6 text-gray-900">Judul novel</label>
                              <div class="mt-2">
                                <input id="judul" value="{{$novel->judul}}" name="judul" type="judul" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                              </div>
                            </div>
                      
                            {{-- Sinopsis --}}
                            <div class="mt-4">
                              <label for="sinopsis" class="block text-sm font-medium leading-6 text-gray-900">Sinopsis</label>
                              <div class="mt-2">
                                <textarea id="sinopsis" name="sinopsis" required maxlength="500" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $novel->sinopsis }}</textarea>
                              </div>
                              @error('sinopsis')
                                <span class="text-red-500">{{ $message }} error</span>
                              @enderror
                            </div>

                            {{-- Link novel --}}
                            <div>
                              <label for="link-novel" class="block text-sm font-medium leading-6 text-gray-900">Link novel</label>
                              <div class="mt-2">
                                <input id="link-novel" name="link" type="link-novel" value="{{$novel->link}}"  required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                              </div>
                            </div>

                            {{-- Status --}}
                            <div class="mt-2">
                              <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                              <select id="status" name="status" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <option value="ongoing" @if($novel->status == 'ongoing') selected @endif>Ongoing</option>
                                <option value="completed" @if($novel->status == 'completed') selected @endif>Completed</option>
                                <option value="hiatus" @if($novel->status == 'hiatus') selected @endif>Hiatus</option>
                              </select>
                              @error('status')
                                    <span class="text-red-500">{{$message}} error </span>
                              @enderror
                            </div>


                            {{-- Author --}}
                            <div>
                              <label for="author-name" class="block text-sm font-medium leading-6 text-gray-900">Author name</label>
                              <div class="mt-2">
                                <input id="author-name" name="author" type="author-name" value="{{$novel->author_name}}"  required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                              </div>
                              @error('author')
                                    <span class="text-red-500">{{$message}} error </span>
                              @enderror
                            </div>

                            {{-- Tags --}}
                            <div>
                              <label class="block text-sm font-medium leading-6 text-gray-900">Genre Novel</label>
                              <div class="grid grid-cols-2">
                                @foreach ($allTags as $tag)
                                  <div class="flex items-center">
                                      <input name="tags[]" id="{{$tag->nama}}" type="checkbox" value="{{$tag->nama}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" 
                                      @if(in_array($tag->nama, $selectedTags)) checked @endif>
                                      <label for="{{$tag->nama}}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$tag->nama}}</label>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                      
                            <div>
                              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update Novel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

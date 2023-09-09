<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @if(session('email') === 'admin@gmail.com' || session('email') === 'riski@gmail.com')
                @include('layouts.navigation')
            @endif
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#default-search').on('input', function () {
                    var searchQuery = $(this).val();
                    console.log(searchQuery);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('input-search') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'searchQuery': searchQuery
                        },
                        success: function (response) {
                            var novels = response.novels;
                            console.log(novels);
                            console.log(novels.length);
                            $('#hasilnya').html('');
                            // $('#hasilnya').append('<p>' + novels.data[0].judul + '</p>');
                            if (novels.length > 0) {
                                novels.forEach(function (novel) {
                                  console.log(novel);
                                  $('#hasilnya').append(
                                    '<form  action="{{route("search-novel")}}" method="POST" class="inline">'+
                                      '<input type="hidden" name="_token" value="{{ csrf_token() }}" />'+
                                      '<input type="hidden" value="'+novel.judul+'" name="cari-novel">'+
                                      '<button type="submit" class="block w-full p-1 pl-10 text-sm text-gray-900 rounded-lg cursor-pointer bg-white focus:ring-blue-500 focus:border-blue-500 hover:bg-gray-300">'
                                       + novel.judul + 
                                       '</button></form>'
                                    );
                                });
                            } else {
                                // Handle the case when there are no search results
                                $('#hasilnya').html('No results found.');
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>

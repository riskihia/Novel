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
                                '<form action="{{ request()->is("/") ? route("cari-novel") : route("cari-list-novel")}}" method="POST" class="inline">'+
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
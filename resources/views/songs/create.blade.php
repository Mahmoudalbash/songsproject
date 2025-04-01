<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new song</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-red-600 text-white min-h-screen">





<!-- Search bar -->
<form action="{{ route('songs.create') }}" method="GET" class="flex justify-center mt-4">
    <label for="title" class="sr-only">Search</label>
    <input type="text" name="title" id="title" placeholder="Search for song"
           class="w-full max-w-xs text-gray-700 border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
    <input type="submit" value="Search" class="btn bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg py-2 px-4 font-bold">
</form>

<!-- Dropdown om liedjes van de API te selecteren -->
<div class="mb-4">
    <label class="block mb-2 font-bold text-xl text-white">Songs from API:</label>
    @if (!empty($songsFromAPI))
        <ul class="space-y-4">
            @foreach ($songsFromAPI as $song)
                <li class="bg-gray-800 text-white p-4 rounded-lg shadow-md">
                    <form action="{{ route('songs.store') }}" method="POST" class="flex items-center justify-between">

                        @csrf
                        <div>
                            <input type="hidden" name="title" value="{{ $song['name'] }}">
                            <input type="hidden" name="singer" value="{{ $song['artist'] }}">

                            <p class="text-lg font-bold">{{ $song['name'] }}</p>
                            <p class="text-sm text-gray-400">Artist: {{ $song['artist'] }}</p>
                        </div>

                        <button type="submit" class="btn bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg py-2 px-4 font-bold">
                            Add This Song
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else

        <p class="text-gray-300">No songs found from API.</p>
    @endif
</div>

<main class="p-4 mt-16 max-w-lg mx-auto bg-white rounded-lg shadow-lg">

    <form action="{{ route('songs.store') }}" method="POST">

        @csrf
        <!-- Veld voor de titel van het liedje -->
        <div class="mb-4">
            <label for="title" class="block mb-2 font-bold text-gray-700">Title of song:</label>
            <input type="text" id="title" name="title" placeholder="Enter new song name"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>


        <div class="mb-4">
            <label for="singer" class="block mb-2 font-bold text-gray-700">Artist:</label>
            <input type="text" id="singer" name="singer" placeholder="Enter name of artist"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>





        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-700">Select Albums:</label>
            @foreach ($albums as $album)
                <div class="flex items-center mb-2">
                    <input type="checkbox" id="album_{{ $album->id }}" name="album[]" value="{{ $album->id }}"
                           class="mr-2">
                    <label for="album_{{ $album->id }}" class="text-gray-700">{{ $album->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit"
                class="btn bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg py-2 px-4 font-bold">Create</button>
    </form>


    <div class="flex justify-between mt-4">
        <a href="{{ route('songs.index') }}"
           class="text-indigo-600 hover:underline">Back</a>
    </div>
</main>



</body>

</html>




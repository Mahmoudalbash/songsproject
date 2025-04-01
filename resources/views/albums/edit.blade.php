<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Album</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-red-600 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6">Update Album</h2>

    <form action="{{ route('albums.update', $album->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <label for="name" class="text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ $album->name }}" required
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <label for="year" class="text-gray-700">Year</label>
            <input type="text" id="year" name="year" value="{{ $album->year }}" required
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <label for="times_sold" class="text-gray-700">Times Sold</label>
            <input type="text" id="times_sold" name="times_sold" value="{{ $album->times_sold }}" required
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mt-6 text-center">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-500 transition-colors">
                Update Album
            </button>
        </div>
    </form>

        <div class="mt-6">
            <ul>
                @foreach($album->songs as $song)
                    <li>
                        {{ $song->title }}
                        <form action="{{route('albumsong.destroy', ['album' => $album->id, 'song' => $song->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">x</button>
                        </form>
                    </li>
                @endforeach

            </ul>
        </div>

        <div class="mt-6">
            <form action="{{route('albums.edit', $album->id)}}"  method="GET">
                <input type="text" name="search">
                <button type="submit">Zoeken</button>
            </form>
            <ul>
                @foreach($songsNotInAlbum as $song)
                    <li>
                        {{ $song->title }}
                        <form action="{{route('albumsong.store', ['album' => $album->id, 'song' => $song->id])}}" method="POST">
                            @csrf
                            <button type="submit">+</button>
                        </form>
                    </li>
                @endforeach

            </ul>
        </div>



    <div class="mt-6 text-center">
        <a href="{{ route('albums.index') }}" class="text-indigo-600 hover:underline">Back to List</a>
    </div>
</div>

</body>
</html>


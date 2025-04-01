<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums List</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-500 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-4xl">
    <h1 class="text-3xl font-bold text-center mb-6">All Albums</h1>
    <a href="{{ route('bands.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
        Bands
    </a>
    <a href="{{ route('songs.index') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
        Songs
    </a>
    @auth
    <div class="text-center mb-4">
        <a href="{{ route('albums.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">
            Add Album
        </a>
    </div>
    @endauth

    <table class="table-auto w-full text-left border-collapse">
        <thead>
        <tr>
            <th class="border-b-2 border-gray-300 px-4 py-2">Name</th>
            <th class="border-b-2 border-gray-300 px-4 py-2">Year</th>
            <th class="border-b-2 border-gray-300 px-4 py-2">Times Sold</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($albums as $album)
            <tr class="hover:bg-gray-100">
                <td class="border-b border-gray-300 px-4 py-2">
                    <a href="{{ route('albums.show', $album->id) }}" class="text-indigo-600 hover:underline">
                        {{ $album->name }}
                    </a>
                </td>
                <td class="border-b border-gray-300 px-4 py-2">{{ $album->year }}</td>
                <td class="border-b border-gray-300 px-4 py-2">{{ $album->times_sold }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song List</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-500 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-4xl">
    <h1 class="text-3xl font-bold text-center mb-6">All Songs</h1>
    <a href="{{ route('bands.index') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
        Bands
    </a>
    <a href="{{ route('albums.index') }}" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
        Albums
    </a>
    <div class="text-center mb-4">
        <a href="{{ route('songs.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">
            Add Song
        </a>
    </div>

    <table class="min-w-full border-collapse border border-gray-300">
        <thead>
        <tr class="bg-gray-100">
            <th class="border border-gray-300 px-4 py-2 text-left">Song</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Singer</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($songs as $song)
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('songs.show', $song->id) }}" class="text-indigo-600 hover:underline">
                        {{ $song->title }}
                    </a>
                </td>
                <td class="border border-gray-300 px-4 py-2">{{ $song->singer }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>



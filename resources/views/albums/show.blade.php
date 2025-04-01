<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Album</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-700 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-2xl">
    <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">
        Album: {{ $album->name }} - Year: {{ $album->year }} - Times Sold: {{ $album->times_sold }}
    </h1>


    <div class="mt-6 text-center">
        <h2 class="text-xl font-bold text-blue-600 mb-2">Band Information</h2>
        @if($album->band)
            <p class="text-gray-700">Band: {{ $album->band->name }}</p>
            <p class="text-gray-700">Genre: {{ $album->band->genre }}</p>
            <p class="text-gray-700">Founded in: {{ $album->band->founded }}</p>
            <p class="text-gray-700">Active Till: {{ $album->band->active_till }}</p>


        @endif
    </div>


    <div class="mt-6 text-center">
        <h2 class="text-xl font-bold text-blue-600 mb-2">Songs in this Album</h2>
        @if($album->songs->isNotEmpty())
            <ul class="list-disc list-inside text-gray-700">
                @foreach($album->songs as $song)
                    <li>{{ $song->title }} by {{ $song->singer }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-700">No songs associated with this album.</p>
        @endif
    </div>

@auth()
    <div class="text-center mb-6 mt-6">
        <form action="{{ route('albums.destroy', $album->id) }}" method="post" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500 transition-colors">
                Delete
            </button>
        </form>
    </div>



    <div class="flex justify-center space-x-4">
        <a href="{{ route('albums.edit', ['album' => $album->id]) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">
            Edit Album
        </a>
        @endauth

        <a href="{{ route('albums.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
            Back to List
        </a>
    </div>
</div>
<a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">Log in </a>
</body>
</html>


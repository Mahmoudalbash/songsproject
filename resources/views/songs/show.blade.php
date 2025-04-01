<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Song</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-700 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md text-center">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">Song: {{ $song->title }} - Singer {{ $song->singer }}</h1>
@auth
    <div class="mb-4">
        <form action="{{ route('songs.destroy', $song->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500 transition-colors">
                Delete
            </button>
        </form>
    </div>

    <div class="space-x-4">
        <a href="{{ route('songs.edit', ['song' => $song->id]) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">Edit Song</a>
        @endauth
        <a href="{{ route('songs.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">Back to List</a>
    </div>
</div>
<a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">Log in </a>
</body>
</html>


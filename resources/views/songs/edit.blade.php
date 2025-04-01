<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-red-600 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6">Update Song</h2>

    <form action="{{ route('songs.update', $song->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Song Details -->
        <div class="grid grid-cols-2 gap-4">
            <label for="title" class="text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{ $song->title }}" required
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <label for="singer" class="text-gray-700">Singer</label>
            <input type="text" id="singer" name="singer" value="{{ $song->singer }}" required
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <!-- Album Selection -->
        <div class="mt-6">
            <label for="album_id" class="text-gray-700">Select Album</label>
            <select id="album_id" name="album_id" required
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}" {{ in_array($album->id, $linkedAlbums) ? 'selected' : '' }}>
                        {{ $album->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 text-center">
            <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-500 transition-colors">
                Update Song
            </button>
        </div>
    </form>

    <!-- Back to Songs List -->
    <div class="mt-6 text-center">
        <a href="{{ route('songs.index') }}" class="text-indigo-600 hover:underline">Back to List</a>
    </div>
</div>

</body>
</html>

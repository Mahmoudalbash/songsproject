<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Band</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-red-600 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6">Update Band</h2>

    <form action="{{ route('bands.update', $band->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <label for="name" class="text-gray-700">Name</label>
            <input type="text" id="name" name="name" value="{{ $band->name }}" required
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <label for="genre" class="text-gray-700">Genre</label>
            <input type="text" id="genre" name="genre" value="{{ $band->genre }}" required
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <label for="founded" class="text-gray-700">Founded</label>
            <input type="number" id="founded" name="founded" value="{{ $band->founded }}" required
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <label for="active_till" class="text-gray-700">Active Till</label>
            <input type="number" id="active_till" name="active_till" value="{{ $band->active_till }}" required
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mt-6 text-center">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-500 transition-colors">
                Update Band
            </button>
        </div>
    </form>

    <div class="mt-6 text-center">
        <a href="{{ route('bands.index') }}" class="text-indigo-600 hover:underline">Back to List</a>
    </div>
</div>

</body>
</html>


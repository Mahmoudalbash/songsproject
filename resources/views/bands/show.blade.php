<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Band</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-700 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg">
    <h1 class="text-2xl font-bold text-blue-600 text-center mb-6">
        Band: {{ $band->name }} - Band Genre: {{ $band->genre }} - Founded in: {{ $band->founded }} - Active Till: {{ $band->active_till }}
    </h1>

    <div class="mt-6">
        <h2 class="text-xl font-bold text-blue-600 mb-4">Albums</h2>
        @if($band->albums->isEmpty())
            <p class="text-gray-700">No albums found for this band.</p>
        @else
            <ul class="list-disc list-inside text-gray-700">
                @foreach($band->albums as $album)
                    <li>{{ $album->name }}  Albums </li>
                @endforeach
            </ul>
        @endif
    </div>

@auth()
    <div class="text-center mb-4 mt-4">
        <form action="{{ route('bands.destroy', $band->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500 transition-colors">
                Delete Band
            </button>
        </form>
    </div>


    <div class="flex justify-between mt-4">
        <a href="{{ route('bands.edit', ['band' => $band->id]) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">
            Edit Band
        </a>
        @endauth
        <a href="{{ route('bands.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
            Back to List
        </a>
    </div>
</div>
<a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">Log in </a>
</body>
</html>

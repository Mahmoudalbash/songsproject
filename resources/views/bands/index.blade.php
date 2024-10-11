<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bands List</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-500 min-h-screen flex items-center justify-center"> <!-- Groene achtergrond toegevoegd -->

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-4xl">
    <h1 class="text-3xl font-bold text-center mb-6">All Bands</h1>

    <div class="text-center mb-4">
        <a href="{{ route('bands.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-500 transition-colors">
            Add Band
        </a>
    </div>

    <table class="table-auto w-full text-left border-collapse">
        <thead>
        <tr>
            <th class="border-b-2 border-gray-300 px-4 py-2">Name</th>
            <th class="border-b-2 border-gray-300 px-4 py-2">Genre</th>
            <th class="border-b-2 border-gray-300 px-4 py-2">Founded</th>
            <th class="border-b-2 border-gray-300 px-4 py-2">Active Till</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($bands as $band)
            <tr class="hover:bg-gray-100">
                <td class="border-b border-gray-300 px-4 py-2">
                    <a href="{{ route('bands.show', $band->id) }}" class="text-indigo-600 hover:underline">
                        {{ $band->name }}
                    </a>
                </td>
                <td class="border-b border-gray-300 px-4 py-2">{{ $band->genre }}</td>
                <td class="border-b border-gray-300 px-4 py-2">{{ $band->founded }}</td>
                <td class="border-b border-gray-300 px-4 py-2">{{ $band->active_till }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Score</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-4">Edit Score</h1>
                    <form action="{{ route('scores.update', ['score_id' => $score->id]) }}" method="POST" class="space-y-4">
    @csrf
    @method('PATCH')

    <div>
        <label for="score" class="block text-sm font-medium text-gray-700">Score:</label>
        <input type="text" id="score" name="score" value="{{ $score->score }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <!-- Add any other fields you want to edit -->

    <div>
        <button type="submit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Score</button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>

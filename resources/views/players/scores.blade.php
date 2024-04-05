<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add necessary meta tags, title, and stylesheets -->
</head>
<body>
<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Scores for {{ $player->name }}</h1>

        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($scores as $score)
    <tr>
        <td class="px-6 py-4 whitespace-nowrap">{{ $score->score }}</td>
    </tr>
@endforeach
            </tbody>
        </table>

        <a href="{{ route('games.index') }}" class="mt-8 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Games</a>
    </div>
</x-app-layout>
</body>
</html>

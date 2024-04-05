<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Game {{ $game->id }} Details</h1>
        <p class="text-lg mb-4">Date: {{ $game->created_at->format('Y-m-d H:i:s') }}</p>

        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Player</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> <!-- Add this header for actions -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($scores as $score)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($score->player)
                                @if ($score->player->name)
                                    <a href="{{ route('player.scores', ['player_id' => $score->player->id]) }}">{{ $score->player->name }}</a>
                                @else
                                    Player associated with the game not found
                                @endif
                            @else
                                Game not found
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $score->score }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- Add buttons or links for CRUD operations -->
                            <a href="{{ route('scores.edit', ['score_id' => $score->id]) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                            <form action="{{ route('scores.destroy', ['score_id' => $score->id]) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this score?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('games.index') }}" class="mt-8 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to Games</a>
    </div>
</x-app-layout>

</body>
</html>

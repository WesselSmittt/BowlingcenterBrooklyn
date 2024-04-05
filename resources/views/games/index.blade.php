<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-orange-300">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Game
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Scores
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($games as $game)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    Game {{ $game->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $game->created_at->format('Y-m-d') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <a href="{{ route('games.show', $game->id) }}" class="text-indigo-600 hover:text-indigo-900">View Scores</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@if ($games->hasPages())
    <div>
        {{-- Previous Page Link --}}
        @if ($games->onFirstPage())
            <span>&laquo;</span>
        @else
            <a href="{{ $games->previousPageUrl() }}" rel="prev">&laquo;</a>
        @endif

        {{-- Next Page Link --}}
        @if ($games->hasMorePages())
            <a href="{{ $games->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <span>&raquo;</span>
        @endif
    </div>
@endif
</x-app-layout>
</body>
</html>

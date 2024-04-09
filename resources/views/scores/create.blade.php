<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Score</title>
</head>
<body>
    <h1>Create Score</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="POST" action="{{ route('scores.store') }}">
        @csrf
        <div>
            <label for="game_id">Game ID:</label>
            <select id="game_id" name="game_id">
                @foreach ($games as $game)
                    <option value="{{ $game->id }}">{{ $game->id }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="player_id">Player ID:</label>
            <input type="text" id="player_id" name="player_id" value="{{ old('player_id') }}">
        </div>
        <div>
            <label for="score">Score:</label>
            <input type="text" id="score" name="score" value="{{ old('score') }}">
        </div>
        <button type="submit">Create Score</button>
    </form>
</body>
</html>

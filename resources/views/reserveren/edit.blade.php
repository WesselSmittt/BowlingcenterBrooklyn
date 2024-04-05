<x-app-layout>
    <div class="container">
        <form method="POST" action="{{ route('reserveren.update', $reserveren->id) }}">
            @csrf
            @method('PUT')

            <label for="total_childs">Aantal kinderen</label>
            <input type="number" id="total_childs" name="total_childs" value="{{ $reserveren->total_childs }}">

            <label for="total_adults">Aantal volwassenen</label>
            <input type="number" id="total_adults" name="total_adults" value="{{ $reserveren->total_adults }}">

            <!-- Add other fields... -->

            <button type="submit">Bijwerken</button>
        </form>
    </div>
</x-app-layout>
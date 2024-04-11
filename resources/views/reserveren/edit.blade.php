<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Reserveren') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Deze tijd valt buiten de openingstijden!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('reserveren.update', $reserveren->id) }}" class="grid grid-cols-2 gap-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="start_time">Begin tijd:</label>
                            <input type="datetime-local" id="start_time" name="start_time" class="w-full" value="{{ old('start_time', $reserveren->start_time) }}">
                        </div>

                        <div>
                            <label for="end_time">Eind tijd:</label>
                            <input type="datetime-local" id="end_time" name="end_time" class="w-full" value="{{ old('end_time', $reserveren->end_time) }}">
                        </div>

                        <div>
                            <label for="total_childs">Totaal aantal kinderen:</label>
                            <input type="number" id="total_childs" name="total_childs" class="w-full" value="{{ old('total_childs', $reserveren->total_childs) }}">
                        </div>

                        <div>
                            <label for="total_adults">Totaal aantal volwassenen:</label>
                            <input type="number" id="total_adults" name="total_adults" class="w-full" value="{{ old('total_adults', $reserveren->total_adults) }}">
                        </div>

                        <div>
                            <label for="package">Pakket:</label>
                            <select id="package" name="package" class="w-full">
                                <option value="">Geen</option>
                                <option value="snackpakket_basis" {{ old($reserveren->package) == 'snackpakket_basis' ? 'selected' : '' }}>Snackpakket basis</option>
                                <option value="snackpakket_luxe" {{ old($reserveren->package) == 'snackpakket_luxe' ? 'selected' : '' }}>Snackpakket luxe</option>
                                <option value="kinderpartij" {{ old($reserveren->package) == 'kinderpartij' ? 'selected' : '' }}>Kinderpartij</option>
                                <option value="vrijgezellenfeest" {{ old($reserveren->package) == 'vrijgezellenfeest' ? 'selected' : '' }}>Vrijgezellenfeest</option>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <button type="submit" class="w-full">Verzenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

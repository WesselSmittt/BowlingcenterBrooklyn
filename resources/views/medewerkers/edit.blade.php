<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('medewerkers.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Back
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Edit Reservation') }}: {{ $reservation->id }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('medewerkers.update', $reservation->id) }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div class="space-y-2">
                            <label for="tariff_id" class="block text-sm font-medium text-gray-700">Tariff ID</label>
                            <input id="tariff_id" type="number" name="tariff_id" value="{{ $reservation->tariff_id }}" required autofocus class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="space-y-2">
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input id="start_time" type="time" name="start_time" value="{{ $reservation->start_time }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="space-y-2">
                            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                            <input id="end_time" type="time" name="end_time" value="{{ $reservation->end_time }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="space-y-2">
                            <label for="total_childs" class="block text-sm font-medium text-gray-700">Total Children</label>
                            <input id="total_childs" type="number" name="total_childs" value="{{ $reservation->total_childs }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="space-y-2">
                            <label for="total_adults" class="block text-sm font-medium text-gray-700">Total Adults</label>
                            <input id="total_adults" type="number" name="total_adults" value="{{ $reservation->total_adults }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="space-y-2">
                            <label for="menu_id" class="block text-sm font-medium text-gray-700">Menu ID</label>
                            <input id="menu_id" type="number" name="menu_id" value="{{ $reservation->menu_id }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="space-y-2">
                            <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
                            <input id="user_id" type="number" name="user_id" value="{{ $reservation->user_id }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
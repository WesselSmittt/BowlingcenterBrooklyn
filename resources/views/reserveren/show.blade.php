<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Reservation Details') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ url()->previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Ga Terug
            </a>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Naam: {{ $reservation->user->name }}</p>
                    <p>Datum aangemaakt: {{ $reservation->created_at }}</p>
                    <p>Begin tijd: {{ $reservation->start_time }}</p>
                    <p>Eind tijd: {{ $reservation->end_time }}</p>
                    <p>Aantal kinderen: {{ $reservation->total_childs }}</p>
                    <p>Aantal volwassenen: {{ $reservation->total_adults }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
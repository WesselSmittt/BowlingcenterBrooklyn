<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medewerkers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach($reservations as $reservation)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>ID: {{ $reservation->id }}</p>
                        <p>Tariff ID: {{ $reservation->tariff_id }}</p>
                        <p>User ID: {{ $reservation->user_id }}</p>
                        <p>Start Time: {{ $reservation->start_time }}</p>
                        <p>End Time: {{ $reservation->end_time }}</p>
                        <p>Total Children: {{ $reservation->total_childs }}</p>
                        <p>Total Adults: {{ $reservation->total_adults }}</p>
                        <p>Menu ID: {{ $reservation->menu_id }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Reservation Details') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ url()->previous() }}" class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded">
                Ga Terug
            </a>

            <div class="overflow-x-auto ">
    <table class="table-auto w-full border-collapse border border-gray-200 mt-4 rounded-lg">
        <tbody class="divide-y divide-gray-200">
                <tr class="rounded-4">
                    <td class="px-4 py-2 bg-orange-200 ">Naam</td>
                    <td class="px-4 py-2 bg-pink-200">{{ $reservation->user->name }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 bg-orange-200">Datum aangemaakt</td>
                    <td class="px-4 py-2 bg-pink-200">{{ $reservation->created_at }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 bg-orange-200">Begin tijd</td>
                    <td class="px-4 py-2 bg-pink-200">{{ $reservation->start_time }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 bg-orange-200">Eind tijd</td>
                    <td class="px-4 py-2 bg-pink-200">{{ $reservation->end_time }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 bg-orange-200">Aantal kinderen</td>
                    <td class="px-4 py-2 bg-pink-200">{{ $reservation->total_childs }}</td>
                </tr>
                <tr>
                    <td class="px-4 py-2 bg-orange-200">Aantal volwassenen</td>
                    <td class="px-4 py-2 bg-pink-200">{{ $reservation->total_adults }}</td>
                </tr>
            </tbody>
            </table>
        </div>

        <div class="flex justify-center mt-4">
            <a href="{{ route('reserveren.edit', $reservation->id) }}" class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-2 px-10 rounded">
                Wijzigen
            </a>
        </div>
    </div>        
</div>
        
    </div>
</x-app-layout>
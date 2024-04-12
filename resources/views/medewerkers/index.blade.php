<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzicht reserveringen') }}
        </h2>
    </x-slot>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    @if (session('success_delete'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success_delete') }}</span>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-orange-300">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Tariff ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Klant naam
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Start Time
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    End Time
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Total Children
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Total Adults
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Menu ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Edit
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($allReservations as $reservation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->tariff_id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('allreservations.user', $reservation->user_id) }}" class="text-indigo-600 hover:text-indigo-900">
                                        {{ $reservation->user_name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->start_time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->end_time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->total_childs }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->total_adults }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->menu_id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('reservation.edit', $reservation->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        edit
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-center items-center mb-4">
                        <form method="GET" action="{{ route('medewerkers.index') }}">
                            <input type="date" name="vanaf_datum" value="{{ request('vanaf_datum') }}">
                            <button type="submit">Tonen</button>
                        </form>
                        <a href="{{ route('medewerkers.index') }}" class="ml-4 px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 text-xl">Clear</a>

                    </div>
                    @if (session('message'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">
                            <span class="block sm:inline">{{ session('message') }}</span>
                        </strong>
                    </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200 mt-4">
                        <thead class="bg-orange-300">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Voornaam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Tussenvoegsel</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Achternaam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Datum</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aantal uren</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aantal volwassenen</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Aantal kinderen</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Reservering status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Pakket</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Wijzigen</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($reserveringen as $reservering)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservering->persoon->voornaam }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservering->persoon->tussenvoegsel }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservering->persoon->achternaam }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservering->datum }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservering->aantal_uren }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservering->aantal_volwassenen }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservering->aantal_kinderen }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservering->reservering_status->naam }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservering->pakket_optie->naam ?? 'Geen' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <a href="{{ route('reserveringen.edit', $reservering->id) }}" class="text-indigo-600 hover:text-indigo-900">✏️</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
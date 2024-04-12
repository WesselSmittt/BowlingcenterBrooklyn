<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Overzicht van alle reservaties') }}
        </h2>
    </x-slot>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-orange-300">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Voornaam
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Tussenvoegsel
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Achternaam
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Reserveringsdatum
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Uren
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Aantal volwassenen
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Aantal kinderen
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider relative">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <form method="GET" action="{{ route('Dylan.index') }}" class="absolute right-0 top-0 flex items-center space-x-1 mt-1 text-xs" style="right: 10px; top: 10px;">
                            <label for="date" class="font-medium text-gray-700">Date:</label>
                            <input type="date" name="date" id="date" value="{{ request('date') }}" class="border-2 border-gray-300 p-1 rounded-md focus:outline-none focus:border-blue-500 text-xs" style="width: 100px;">
                            <button type="submit" class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 text-xs" style="width: 50px;">Filter</button>
                            <a href="{{ route('Dylan.index') }}" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 text-xs" style="width: 50px;">Clear</a>
                        </form>
                        @if ($message)
                        <h2 class="text-center text-red-500">
                            {{ $message }}
                        </h2>
                        @endif
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->persoon->voornaam }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->persoon->tussenvoegsel ?? 'Geen tussenvoegsel' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->persoon->achternaam }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->datum}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->aantal_uren }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->aantal_volwassen }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->aantal_kinderen ?? 'Geen kinderen' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->reserveringStatus->naam }}
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-orange-300">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    voornaam
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    tussenvoegsel
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    achternaam
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Pakket Optie
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    aantal volwassenen
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    aantal kinderen
                                </th>

                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    datum
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Wijzig
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->persoon->voornaam }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->persoon->tussenvoegsel ?? 'Geen tussenvoegsel' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->persoon->achternaam }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->pakketOptie ? $reservation->pakketOptie->naam : 'Geen pakket optie gekozen' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->aantal_volwassen }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->aantal_kinderen ??'Geen kinderen' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $reservation->datum}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('dylan.edit', $reservation->id) }}" class="text-indigo-600 hover:text-indigo-900">Wijzig</a>
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
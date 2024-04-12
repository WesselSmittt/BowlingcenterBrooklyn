<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Overzicht van mijn reservaties') }}
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
                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Succesvol verwijderd!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif
                @if (Session::has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                @endif

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
                                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="text-indigo-600 hover:text-indigo-900">Wijzig</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-6">
                        <a href="{{ route('medewerker.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Ga naar Medewerker Overzicht
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
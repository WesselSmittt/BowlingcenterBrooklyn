<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('medewerkers.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Back
        </a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Klant') }}: {{ $reservations->first()->user_name ?? '' }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                    User ID
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
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($reservations as $reservation)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->tariff_id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->user_name }} </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->start_time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->end_time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->total_childs }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->total_adults }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->menu_id }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
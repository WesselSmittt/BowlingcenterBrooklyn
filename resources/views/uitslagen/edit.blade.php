<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzicht Uitslagen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Voornaam</th>
                                <th class="px-4 py-2">Tussenvoegsel</th>
                                <th class="px-4 py-2">Achternaam</th>
                                <th class="px-4 py-2">Aantal punten</th>
                                <th class="px-4 py-2">Datum</th>  
                            </tr>
                        </thead>
                
                        <tbody>
                        <tr>
                            <td class="border px-4 py-2">{{ $uitslag->spel->persoon->Voornaam }}</td>
                            <td class="border px-4 py-2">{{ $uitslag->spel->persoon->Tussenvoegsel }}</td>
                            <td class="border px-4 py-2">{{ $uitslag->spel->persoon->Achternaam }}</td>
                            <td class="border px-4 py-2">{{ $uitslag->AantalPunten }}</td>
                            <td class="border px-4 py-2">{{ $uitslag->spel->reservering->Datum }}</td>
                        </tr>
                    </tbody>
                </table>
                        <form method="POST" action="{{ route('uitslagen.update', $uitslag->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="AantalPunten">
                                    Aantal punten
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="AantalPunten" type="number" name="AantalPunten" value="{{ $uitslag->AantalPunten }}" required>
                            </div>

                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Bewerken
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
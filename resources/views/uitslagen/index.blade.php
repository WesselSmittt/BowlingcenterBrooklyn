<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzicht Spelers') }}
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
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        <tbody>
                        @foreach ($uitslagen as $uitslag)
                            <tr>
                                @if ($uitslag->spel && $uitslag->spel->persoon)
                                <td class="border px-4 py-2">
                                    <a href="{{ route('uitslagen.profile', $uitslag->spel->persoon->id) }}">
                                    {{ $uitslag->spel->persoon->Voornaam }}
                                    </a>
                                </td>                                    
                                    <td class="border px-4 py-2">{{ $uitslag->spel->persoon->Tussenvoegsel }}</td>
                                    <td class="border px-4 py-2">{{ $uitslag->spel->persoon->Achternaam }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $uitslag->AantalPunten }}
                                        <a href="{{ route('uitslagen.edit', $uitslag->id) }}" class="btn btn-primary text-blue-500 hover:text-blue-300">Bewerken</a>
                                    </td>
                                 
                                @else
                                    <td class="border px-4 py-2" colspan="3">Geen persoon gekoppeld</td>
                                @endif
                                @if ($uitslag->spel && $uitslag->spel->reservering)
                                    <td class="border px-4 py-2">{{ $uitslag->spel->reservering->Datum }}</td>
                                @else
                                    <td class="border px-4 py-2">Geen reservering gekoppeld</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
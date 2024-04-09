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
                <a href="{{ route('uitslagen.index') }}" class="btn btn-primary">Terug naar Index</a>
                    <br>
                    <form method="GET" action="{{ route('uitslagen.index') }}">
                        <label for="date">Kies een datum:</label>
                        <input type="date" id="date" name="date"> 
                        <button type="submit" class="btn btn-primary">Tonen</button>
                    </form>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @else
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
                        @foreach ($uitslagen as $uitslag)
                            <tr>
                                @if ($uitslag->spel && $uitslag->spel->persoon)
                                    <td class="border px-4 py-2">{{ $uitslag->spel->persoon->Voornaam }}</td>
                                    <td class="border px-4 py-2">{{ $uitslag->spel->persoon->Tussenvoegsel }}</td>
                                    <td class="border px-4 py-2">{{ $uitslag->spel->persoon->Achternaam }}</td>
                                @else
                                    <td class="border px-4 py-2" colspan="3">Geen persoon gekoppeld</td>
                                @endif
                                    <td class="border px-4 py-2">{{ $uitslag->AantalPunten }}</td>
                                @if ($uitslag->spel && $uitslag->spel->reservering)
                                    <td class="border px-4 py-2">{{ $uitslag->spel->reservering->Datum }}</td>
                                @else
                                    <td class="border px-4 py-2">Geen reservering gekoppeld</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>            
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
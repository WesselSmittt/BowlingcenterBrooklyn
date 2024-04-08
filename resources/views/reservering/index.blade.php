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
                                <th class="px-4 py-2">PersoonId</th>
                                <th class="px-4 py-2">OpeningstijdId</th>
                                <th class="px-4 py-2">TariefId</th>
                                <th class="px-4 py-2">BaanId</th>
                                <th class="px-4 py-2">PakketOptieId</th>
                                <th class="px-4 py-2">ReserveringStatusId</th>
                                <th class="px-4 py-2">Reserveringsnummer</th>
                                <th class="px-4 py-2">Datum</th>
                                <th class="px-4 py-2">AantalUren</th>
                                <th class="px-4 py-2">BeginTijd</th>
                                <th class="px-4 py-2">EindTijd</th>
                                <th class="px-4 py-2">AantalVolwassenen</th>
                                <th class="px-4 py-2">AantalKinderen</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reserveringen as $reservering)
                                <tr>
                                    <td class="border px-4 py-2">{{ $reservering->BaanId }}</td>
                                    <td class="border px-4 py-2">{{ $reservering->PakketOptieId }}</td>
                                    <td class="border px-4 py-2">{{ $reservering->ReserveringStatusId }}</td>
                                    <td class="border px-4 py-2">{{ $reservering->Reserveringsnummer }}</td>
                                    <td class="border px-4 py-2">{{ $reservering->Datum }}</td>
                                    <td class="border px-4 py-2">{{ $reservering->AantalUren }}</td>
                                    <td class="border px-4 py-2">{{ $reservering->BeginTijd }}</td>
                                    <td class="border px-4 py-2">{{ $reservering->EindTijd }}</td>
                                    <td class="border px-4 py-2">{{ $reservering->AantalVolwassenen }}</td>
                                    <td class="border px-4 py-2">{{ $reservering->AantalKinderen }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
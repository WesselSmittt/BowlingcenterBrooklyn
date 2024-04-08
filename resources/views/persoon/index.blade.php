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
                                <th class="px-4 py-2">Roepnaam</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personen as $persoon)
                                <tr>
                                    <td class="border px-4 py-2">{{ $persoon->Voornaam }}</td>
                                    <td class="border px-4 py-2">{{ $persoon->Tussenvoegsel }}</td>
                                    <td class="border px-4 py-2">{{ $persoon->Achternaam }}</td>
                                    <td class="border px-4 py-2">{{ $persoon->Roepnaam }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
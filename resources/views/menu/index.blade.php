<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-wrap">
                <a href="{{ route('menu.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Add New Product</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Snackpakket Basis</th>
                                <th class="px-4 py-2">Snackpakket Luxe</th>
                                <th class="px-4 py-2">Kinderpartij</th>
                                <th class="px-4 py-2">Vrijgezellenfeest</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td class="border px-4 py-2">{{ $menu->snackpakket1 }}</td>
                                    <td class="border px-4 py-2">{{ $menu->snackpakket2 }}</td>
                                    <td class="border px-4 py-2">{{ $menu->kinderpartij }}</td>
                                    <td class="border px-4 py-2">{{ $menu->vrijgezellenfeest }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
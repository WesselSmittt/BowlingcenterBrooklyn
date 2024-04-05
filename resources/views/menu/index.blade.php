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
                    <table class="table-auto w-full">
                    <a href="{{ route('menu.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Product</a>
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Column1</th>
                                <th class="px-4 py-2">Column2</th>
                                <th class="px-4 py-2">Column3</th>
                                <th class="px-4 py-2">Column4</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td class="border px-4 py-2">{{ $menu->column1 }}</td>
                                    <td class="border px-4 py-2">{{ $menu->column2 }}</td>
                                    <td class="border px-4 py-2">{{ $menu->column3 }}</td>
                                    <td class="border px-4 py-2">{{ $menu->column3 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
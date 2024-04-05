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
                                    <tr class="{{ $loop->iteration % 2 ? 'bg-gray-100' : '' }}">
                                        <td class="border px-4 py-2">{{ $menu->product ? $menu->product->product_name : 'No Product' }}</td>
                                        <td class="border px-4 py-2">{{ $menu->product ? $menu->product->price : 'No Price' }}</td>
                                        <td class="border px-4 py-2">{{ $menu->product && $menu->product->category ? $menu->product->category->category_name : 'No Category' }}</td>
                                        <td>
                                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">❌</button>
                                            </form>
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
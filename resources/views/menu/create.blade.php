<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-wrap">
                    <div class="w-1/2 p-3">
                    <table class="table-auto w-full mb-6">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Naam</th>
                                <th class="px-4 py-2">Prijs</th>
                                <th class="px-4 py-2">Categorie</th>
                                <!-- Add other columns... -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            @if ($product->category && $product->category->id == 1)
                                <tr class="{{ $loop->iteration % 2 ? 'bg-gray-100' : '' }}">
                                    <td class="border px-4 py-2">{{ $product->product_name }}</td>
                                    <td class="border px-4 py-2">{{ $product->price }}</td>
                                    <td class="border px-4 py-2">{{ $product->category ? $product->category->category_name : 'No Category' }}</td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('menu.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="submit" value="Add to Menu">
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    </div>

                    <div class="w-1/2 p-3">
                    <table class="table-auto w-full mb-6">
                        <tbody>
                            @foreach ($products as $product)
                                @if ($product->category && $product->category->id == 2)
                                    <tr class="{{ $loop->iteration % 2 ? 'bg-gray-100' : '' }}">
                                        <td class="border px-4 py-2">{{ $product->product_name }}</td>
                                        <td class="border px-4 py-2">{{ $product->price }}</td>
                                        <td class="border px-4 py-2">{{ $product->category ? $product->category->category_name : 'No Category' }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('menu.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="submit" value="Add to Menu">
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                    <div class="w-1/2 p-3">
                    <table class="table-auto w-full mb-6">
                        <tbody>
                            @foreach ($products as $product)
                                @if ($product->category && $product->category->id == 3)
                                    <tr class="{{ $loop->iteration % 2 ? 'bg-gray-100' : '' }}">
                                        <td class="border px-4 py-2">{{ $product->product_name }}</td>
                                        <td class="border px-4 py-2">{{ $product->price }}</td>
                                        <td class="border px-4 py-2">{{ $product->category ? $product->category->category_name : 'No Category' }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('menu.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="submit" value="Add to Menu">
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                    <div class="w-1/2 p-3">
                    <table class="table-auto w-full mb-6">
                        <tbody>
                            @foreach ($products as $product)
                                @if ($product->category && $product->category->id == 4)
                                    <tr class="{{ $loop->iteration % 2 ? 'bg-gray-100' : '' }}">
                                        <td class="border px-4 py-2">{{ $product->product_name }}</td>
                                        <td class="border px-4 py-2">{{ $product->price }}</td>
                                        <td class="border px-4 py-2">{{ $product->category ? $product->category->category_name : 'No Category' }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('menu.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="submit" value="Add to Menu">
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
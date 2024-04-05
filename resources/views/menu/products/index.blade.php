<x-app-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold text-center mb-6">Producten</h1>
        <a href="{{ route('product.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            Nieuw product toevoegen
        </a>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Naam</th>
                    <th class="px-4 py-2">Prijs</th>
                    <!-- Add other columns... -->
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="{{ $loop->iteration % 2 ? 'bg-gray-100' : '' }}">
                        <td class="border px-4 py-2">{{ $product->product_name }}</td>
                        <td class="border px-4 py-2">{{ $product->price }}</td>
                        <!-- Add other columns... -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
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
                    <th class="px-4 py-2">Categorie</th>
                    <th class="px-4 py-2">Acties</th>
                    <!-- Add other columns... -->
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="{{ $loop->iteration % 2 ? 'bg-gray-100' : '' }}">
                        <td class="border px-4 py-2">{{ $product->product_name }}</td>
                        <td class="border px-4 py-2">{{ $product->price }}</td>
                        <td class="border px-4 py-2">{{ $product->category ? $product->category->category_name : 'No Category' }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">❌</button>
                            </form>
                        </td>
                        <!-- Add other columns... -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
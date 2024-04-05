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
                <h1>Add New Product</h1>
                <form action="{{ route('menu.store') }}" method="POST">
                    @csrf
                    <label for="product_name">Product naam:</label>
                    <input type="text" id="products_name" name="product_name">
                    <label for="price">Prijs:</label>
                    <input type="text" id="price" name="price">
                    <label for="categories">Categorie:</label>
                    <input type="text" id="categories" name="categories">
                    <!-- Voeg meer velden toe voor elke kolom in uw menu tabel -->
                    <input type="submit" value="Submit">
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('product.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Name</label></br>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="name" value="{{ $product->name }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Description</label></br>
                            <textarea name="description" class="border-2 border-gray-300 p-2 w-full" id="description" required>{{ $product->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Price</label></br>
                            <input type="number" class="border-2 border-gray-300 p-2 w-full" name="price" id="price" value="{{ $product->price }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Category</label></br>
                            <select class="border-2 border-gray-300 p-2 w-full" name="category_id" id="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
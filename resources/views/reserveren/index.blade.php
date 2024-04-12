<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Reserveren') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Deze tijd valt buiten de openingstijden!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('reserveren.store') }}" class="space-y-8">
                        @csrf

                        <div class="space-y-2">
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Begin tijd:</label>
                            <input type="datetime-local" id="start_time" name="start_time" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="space-y-2">
                            <label for="end_time" class="block text-sm font-medium text-gray-700">Eind tijd:</label>
                            <input type="datetime-local" id="end_time" name="end_time" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="space-y-2">
                            <label for="total_childs" class="block text-sm font-medium text-gray-700">Totaal aantal kinderen:</label>
                            <input type="number" id="total_childs" name="total_childs" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="space-y-2">
                            <label for="total_adults" class="block text-sm font-medium text-gray-700">Totaal aantal volwassenen:</label>
                            <input type="number" id="total_adults" name="total_adults" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>


                        <div>
                            <label for="package">Pakket:</label>
                            <select id="package" name="package" class="w-full">
                                <option value="">Geen</option>
                                <option value="snackpakket_basis">Snackpakket basis</option>
                                <option value="snackpakket_luxe">Snackpakket luxe</option>
                                <option value="kinderpartij">Kinderpartij</option>
                                <option value="vrijgezellenfeest">Vrijgezellenfeest</option>
                            </select>
                        </div>


                        <div class="justify-center flex">
                            <button type="submit" class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
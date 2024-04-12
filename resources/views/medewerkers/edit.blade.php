<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wijzig Optiepakket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">
                    <span class="block sm:inline">{{ session('error') }}</span></strong>
            </div>
            @endif


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('reserveringen.update', $reservering) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="optiepakket_id" class="block text-sm font-medium text-gray-700">Optiepakket</label>
                            <select id="optiepakket_id" name="optiepakket_id" required class="mt-1 block w-full">
                                @foreach ($pakketopties as $pakketoptie)
                                <option value="{{ $pakketoptie->id }}" {{ $reservering->pakketoptie_id == $pakketoptie->id ? 'selected' : '' }}>
                                    {{ $pakketoptie->naam }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-center mt-4">
                            <button type="submit" class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-2 px-10 rounded">
                                {{ __('Wijzigen') }}
                            </button>
                        </div>

                        <a href="{{ route('medewerkers.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back
                        </a>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                            {{ __('Edit Reservation') }}: {{ $reservation->id }}
                        </h2>
                        </x-slot>
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 text-gray-900">
                                        <form method="POST" action="{{ route('medewerkers.update', $reservation->id) }}" class="space-y-8">
                                            @csrf
                                            @method('PUT')

                                            <div class="space-y-2">
                                                <label for="tariff_id" class="block text-sm font-medium text-gray-700">Tariff ID</label>
                                                <input id="tariff_id" type="number" name="tariff_id" value="{{ $reservation->tariff_id }}" required autofocus class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                                            </div>

                                            <div class="space-y-2">
                                                <label for="start_time" class="block text-sm font-medium text-gray-700">Begin tijd:</label>
                                                <input id="start_time" type="datetime-local" name="start_time" value="{{ date('Y-m-d\TH:i', strtotime($reservation->start_time)) }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                                            </div>

                                            <div class="space-y-2">
                                                <label for="end_time" class="block text-sm font-medium text-gray-700">Eind tijd:</label>
                                                <input id="end_time" type="datetime-local" name="end_time" value="{{ date('Y-m-d\TH:i', strtotime($reservation->end_time)) }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                                            </div>

                                            <div class="space-y-2">
                                                <label for="total_childs" class="block text-sm font-medium text-gray-700">Total Children</label>
                                                <input id="total_childs" type="number" name="total_childs" value="{{ $reservation->total_childs }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                                            </div>
                                            <div class="space-y-2">
                                                <label for="total_adults" class="block text-sm font-medium text-gray-700">Total Adults</label>
                                                <input id="total_adults" type="number" name="total_adults" value="{{ $reservation->total_adults }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                                            </div>

                                            <div class="space-y-2">
                                                <label for="menu_id" class="block text-sm font-medium text-gray-700">Menu ID</label>
                                                <input id="menu_id" type="number" name="menu_id" value="{{ $reservation->menu_id }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                                            </div>

                                            <div class="space-y-2">
                                                <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
                                                <input id="user_id" type="number" name="user_id" value="{{ $reservation->user_id }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                                            </div>

                                            <div>
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
</x-app-layout>
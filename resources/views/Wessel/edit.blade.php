<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wijzig Optiepakket') }}
        </h2>
    </x-slot>
    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">
            <span class="block sm:inline">{{ session('error') }}</span></strong>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('Wessel.update', $reservering) }}">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
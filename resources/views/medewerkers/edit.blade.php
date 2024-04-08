<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wijzig Optiepakket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
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

                        <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="ml-4">
                            {{ __('Wijzigen') }}
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
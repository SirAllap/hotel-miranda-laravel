<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order details:') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="room-service/orders">
                @csrf

                <!-- Room number -->
                <div>
                    <x-input-label for="room_id" :value="__('Room Number:')" />
                    @if(isset($user) && isset($room))
                    <div class="mt-2 border border-gray-300 w-20 bg-white p-2 rounded-md">
                        <p class="text-xl ml-1">{{ $user->room_number }}</p>
                    </div>
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    @endif
                </div>

                <!-- Type -->
                <div class="mt-4">
                    <x-input-label for="type" :value="__('Order type:')" />

                    <select id="type" name="type" class="mt-2 border-gray-300 rounded-md block w-full p-3" :value="old('type')" required autofocus>
                        <option value="" selected disabled>Select the order type:</option>
                        <option value="Food">Food</option>

                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Whats on your mind:')" />

                    <textarea id="description" rows="4" placeholder="e.j: I'd like a big plate of oysters" class="mt-2 resize-none border-gray-300 rounded-md block w-full" type="text" name="description" :value="old('description')" required autofocus></textarea>

                    <x-input-error :messages=" $errors->get('description')" class="mt-2" />
                </div>

                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <div class="flex justify-center mt-20">
                    <x-primary-button class="w-full justify-center">
                        {{ __('ORDER NOW') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
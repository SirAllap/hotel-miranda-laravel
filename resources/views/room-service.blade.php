<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order details:') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> -->
            <form method="POST" action="#">
                @csrf

                <!-- Room number -->
                <div>
                    <x-input-label for="room_number" :value="__('Room Number:')" />

                    <x-text-input placeholder="e.j:109" id="room_number" class="block mt-1 w-full p-3" type="number" name="room_number" :value="old('room_number')" required autofocus />

                    <x-input-error :messages="$errors->get('room_number')" class="mt-2" />
                </div>

                <!-- Type -->
                <div class="mt-4">
                    <x-input-label for="order_type" :value="__('Order type:')" />

                    <select id="order_type" class="border-gray-300 rounded-md block w-full p-3" required autofocus>
                        <option value="" selected disabled>Choose an option</option>
                        <option value="food">Food</option>

                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="order_body" :value="__('Whats on your mind:')" />

                    <textarea id="order_body" rows="4" placeholder="e.j:I want to order some food" class="resize-none border-gray-300 rounded-md block w-full" type="text" name="order_body" required autofocus></textarea>

                    <x-input-error :messages="$errors->get('order_body')" class="mt-2" />
                </div>

                <div class="flex justify-center mt-20">
                    <x-primary-button class="w-full justify-center">
                        {{ __('ORDER NOW') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
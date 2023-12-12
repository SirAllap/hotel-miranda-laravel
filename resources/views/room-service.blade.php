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
                    <select id="type" name="room_id" class="border-gray-300 rounded-md block w-full p-3" :value="old('type')" required autofocus>
                        <option value="" selected disabled>Select your room number:</option>
                        @if(isset($availableRooms))
                        @foreach($availableRooms as $availableRoom)
                        <option value="{{$availableRoom->id}}">Room number: {{$availableRoom->room_number}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <!-- Type -->
                <div class="mt-4">
                    <x-input-label for="type" :value="__('Order type:')" />

                    <select id="type" name="type" class="border-gray-300 rounded-md block w-full p-3" :value="old('type')" required autofocus>
                        <option value="" selected disabled>Select the order type:</option>
                        <option value="Food">Food</option>

                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Whats on your mind:')" />

                    <textarea id="description" rows="4" placeholder="e.j: I'd like a big plate of oysters" class="resize-none border-gray-300 rounded-md block w-full" type="text" name="description" :value="old('description')" required autofocus></textarea>

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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders:') }}
        </h2>
    </x-slot>
    @if(isset($desc))
    {{$desc}}
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    ROOM Nº
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Order time
                                </th>
                                <th scope="col" colspan="2" class="px-6 py-3 text-center">
                                    ACTION
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(isset($orders))
                            @foreach ($orders as $order)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <form method="POST" action="/room-service/orders">
                                    @csrf
                                    @method('PUT')
                                    <td scope=" row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        {{ $order->room_id }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <select id="{{ $order->id }}-type" name="type" class="border-gray-300 rounded-md block w-full p-3 disabled:border-transparent !disabled:border-b sm:rounded-lg disabled:text-center disabled:bg-transparent" value="{{ $order->type }}" disabled>
                                            <option value="" selected disabled>{{ $order->type }}</option>
                                            <option value="Food">Food</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <input id="{{ $order->id }}-description" disabled name="description" type="text" value="{{ $order->description }}" class="border-gray-300 rounded-md block w-full p-3 disabled:border-transparent !disabled:border-b sm:rounded-lg disabled:text-center disabled:bg-transparent">
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $order->created_at }}
                                    </td>
                                    <td class="px-6 py-4 text-center font-mono">
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <x-secondary-button type="button" id="{{ $order->id }}-edit" onclick="editInputs('{{$order->id}}')">
                                            Edit
                                        </x-secondary-button>
                                        <x-secondary-button type="submit" id="{{ $order->id }}-save" style="display: none;">
                                            Save
                                        </x-secondary-button>
                                    </td>
                                </form>
                                <td class=" px-6 py-4 text-center font-mono">
                                    <form method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <x-primary-button>
                                            Delete
                                        </x-primary-button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

<script>
    function editInputs(orderId) {
        document.getElementById(orderId + '-type').toggleAttribute('disabled');
        document.getElementById(orderId + '-description').toggleAttribute('disabled');
        var editButton = document.getElementById(orderId + '-edit');
        var saveButton = document.getElementById(orderId + '-save');
        editButton.style.display = 'none';
        saveButton.style.display = null;
        if (saveButton.innerHTML === 'Save') {
            editButton.style.display = 'inline';
            saveButton.style.display = 'none';
        }
    }
</script>
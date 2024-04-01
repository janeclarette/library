<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900 leading-tight">
            {{ __("Shopping Cart") }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    @csrf
                    @if($cartItems->isNotEmpty())
                        <form action="{{ route('checkout') }}" method="POST" class="mb-6">
                            <ul class="divide-y divide-gray-200">
                                @foreach($cartItems as $item)
                                    <li class="py-4 flex justify-between items-center">
                                        <div class="flex items-center">
                                            <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="mr-4">
                                            <span class="text-lg font-semibold">{{ $item->quantity }}</span>
                                            <span class="ml-4">{{ $item->book->name }}</span>
                                            <span class="ml-4 text-gray-600">${{ $item->book->price }}</span>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <form action="{{ route('cart.increment', $item) }}" method="POST" class="mr-2">
                                                @csrf
                                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded-md">+</button>
                                            </form>
                                            <form action="{{ route('reduceByOne', $item->id) }}" method="POST" class="mr-2">
                                                @csrf
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-md">-</button>
                                            </form>
                                            <form action="{{ route('removeItem', $item->id) }}" method="POST" class="mr-2">
                                                @csrf
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-md">Remove</button>
                                            </form>
                                        </div>


                                    </li>
                                @endforeach
                                <li class="pt-4">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Proceed to Checkout</button>
                                </li>
                            </ul>
                        </form>
                    @else
                        <div class="text-center">
                            <h2 class="text-xl font-semibold mb-4">No Items in Cart!</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

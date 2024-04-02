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
                                <!-- Cart Header -->
                                <li class="py-4 flex justify-between items-center font-semibold">
                                    <span class="w-1/4">Product</span>
                                    <span class="w-1/4 text-center">Unit Price</span>
                                    <span class="w-1/4 text-center">Quantity</span>
                                    <span class="w-1/4 text-center">Total Price</span>
                                    <span class="w-1/4 text-center">Actions</span>
                                </li>

                                <!-- Cart Items -->
                                @foreach($cartItems as $item)
                                    <li class="py-4 flex justify-between items-center">
                                        <div class="flex items-center w-1/4">
                                            <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="mr-4">
                                            <span>{{ $item->book->name }}</span>
                                        </div>
                                        
                                        <span class="w-1/4 text-center">${{ $item->book->price }}</span>
                                        
                                        <div class="flex items-center w-1/4 text-center">
                                            <span>{{ $item->quantity }}</span>
                                        </div>
                                        
                                        <span class="w-1/4 text-center">${{ $item->book->price * $item->quantity }}</span>
                                        
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
                                
                                <!-- Proceed to Checkout Button -->
                                <li class="pt-4 flex justify-end">
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

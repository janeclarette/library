<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900 leading-tight">
            {{ __("Checkout Dashboard") }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Selected Items:</h3>
                    @if($cartItems->isNotEmpty())
                        <ul class="divide-y divide-gray-200">
                            @php
                                $totalPrice = 0; // Initialize total price variable
                            @endphp
                            @foreach($cartItems as $item)
                                <li class="py-4">
                                    <p class="text-lg font-semibold">{{ $item->book->name }} - ${{ $item->book->price }}</p>
                                    <p class="text-base">Quantity: {{ $item->quantity }}</p>
                                    @php
                                        $totalPrice += $item->book->price * $item->quantity; // Calculate total price
                                    @endphp
                                </li>
                            @endforeach
                        </ul>
                        <p class="mt-4 text-xl font-semibold">Total Price: ${{ $totalPrice }}</p> <!-- Display total price -->

                        <!-- Payment method, shipping fee, and courier form -->
                        <form action="{{ route('place-order') }}" method="POST" class="mt-6">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book ? $book->id : '' }}">
                            <div class="mb-4">
                                <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method:</label>
                                <select name="payment_method" id="payment_method" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="Cash on Delivery">Cash on Delivery</option>
                                    <option value="Gcash">Gcash</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="courier" class="block text-sm font-medium text-gray-700">Courier:</label>
                                <select name="courier" id="courier" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="J&B">J&B</option>
                                    <option value="Grab2Go">Grab2Go</option>
                                    <option value="DStandard">DStandard</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Place Order</button>
                        </form>

                    @else
                        <p class="text-lg">No items selected.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

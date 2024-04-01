//checkout

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900 leading-tight">
            {{ __("Checkout Dashboard") }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Delivery Address Container -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2">Delivery Address:</h3>
                    {{-- <p>{{ $user->address }}</p> --}}
                    <button class="mt-2 text-blue-500 hover:text-blue-700">Change</button>
                </div>
            </div>

            <!-- Product Ordered Container -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2">Products Ordered:</h3>
                    @if($cartItems->isNotEmpty())
                        <ul class="divide-y divide-gray-200">
                            @php
                                $totalPrice = 0; 
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
                        <p class="mt-4 text-xl font-semibold">Total Price: ${{ $totalPrice }}</p>
                        <button class="mt-2 text-blue-500 hover:text-blue-700">Change</button>
                    @else
                        <p class="text-lg">No items selected.</p>
                    @endif
                </div>
            </div>

            <!-- Shipping Option Container -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2">Shipping Option:</h3>
                    <select name="shipping_option" id="shipping_option" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Standard Shipping">Standard Shipping</option>
                        <option value="Express Shipping">Express Shipping</option>
                    </select>
                    <button class="mt-2 text-blue-500 hover:text-blue-700">Change</button>
                </div>
            </div>

            <!-- Payment Method Container -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2">Payment Method:</h3>
                    <select name="payment_method" id="payment_method" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Cash on Delivery">Cash on Delivery</option>
                        <option value="Gcash">Gcash</option>
                    </select>
                    <button class="mt-2 text-blue-500 hover:text-blue-700">Change</button>
                </div>
            </div>

            <!-- Place Order Button -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-center">
                    <form action="{{ route('place-order') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Place Order</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<!-- checkout.dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Checkout Dashboard") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Selected Items:</h3>
                    @if($cartItems->isNotEmpty())
                        <ul class="list-group">
                            @php
                                $totalPrice = 0; // Initialize total price variable
                            @endphp
                            @foreach($cartItems as $item)
                                <li class="list-group-item">
                                    {{ $item->book->name }} - ${{ $item->book->price }} 
                                    <br> Quantity: {{ $item->quantity }}
                                    @php
                                        $totalPrice += $item->book->price * $item->quantity; // Calculate total price
                                    @endphp
                                </li>
                            @endforeach
                        </ul>
                        <p>Total Price: ${{ $totalPrice }}</p> <!-- Display total price -->

                        <!-- Payment method, shipping fee, and courier form -->
                        <form action="{{ route('place-order') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="payment_method">Payment Method:</label>
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="Cash on Delivery">Cash on Delivery</option>
                                    <option value="Gcash">Gcash</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="courier">Courier:</label>
                                <select name="courier" id="courier" class="form-control">
                                    <option value="J&B">J&B</option>
                                    <option value="Grab2Go">Grab2Go</option>
                                    <option value="DStandard">DStandard</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </form>

                    @else
                        <p>No items selected.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

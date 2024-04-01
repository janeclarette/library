<!-- order_dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Order Dashboard") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Your Orders:</h3>
                    @if($orders->isNotEmpty())
                        <ul class="list-group">
                        @foreach($orders as $order)
    <li class="list-group-item">
        <br>
        <p>Order ID: {{ $order->order_id }}</p>
        <p>Book Name: {{ $order->book_name }}</p>
        Date Ordered: {{ $order->date_ordered }}
        <br>
        Payment Method: {{ $order->payment_method }}
        <br>
        Courier: {{ $order->courier }}
        <br>
        Status: {{ $order->status }}
        <br>
    </li>
@endforeach

                        </ul>
                    @else
                        <p>No orders found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

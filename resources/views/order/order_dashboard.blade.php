<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900 leading-tight">
            {{ __("Order Dashboard") }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Your Orders:</h3>
                    @if($orders->isNotEmpty())
                        <ul class="divide-y divide-gray-200">
                            @foreach($orders as $order)
                                <li class="py-4">
                                <div class="mb-2">
                                        <span class="text-lg font-semibold">Order ID:</span>
                                        <span>{{ $order->id }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="text-lg font-semibold">Book Name:</span>
                                        <span>{{ $order->book->name }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="text-lg font-semibold">Date Ordered:</span>
                                        <span>{{ $order->date_ordered }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="text-lg font-semibold">Payment Method:</span>
                                        <span>{{ $order->payment_method }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="text-lg font-semibold">Courier:</span>
                                        <span>{{ $order->courier }}</span>
</div>

                                    <div class="mb-2">
                                        <span class="text-lg font-semibold">Status:</span>
                                        <span>{{ $order->status }}</span>
                                    </div>
                                    @if(trim($order->status) === 'Shipped')
                                        @if($order->reviewed)
                                            <button disabled class="bg-gray-400 text-white font-bold py-2 px-4 rounded cursor-not-allowed">
                                                Review Order (Already Reviewed)
                                            </button>
                                        @else
                                            <form action="{{ route('review.create', $order->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Review Order
                                                </button>
                                            </form>
                                        @endif
                                    @endif


                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-lg">No orders found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<x-app-layout>
    <!-- Header code remains the same -->

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Your Orders:</h3>
                    @if($orders->isNotEmpty())
                        @foreach($orders as $order)
                            <div class="bg-EEE9DA text-black overflow-hidden shadow-md sm:rounded-lg mb-4">
                                <div class="p-6">
                                    <!-- Display order details -->
                                    <div class="mb-2">
                                        <span class="text-lg font-semibold">Order ID:</span>
                                        <span>{{ $order->order_id }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="text-lg font-semibold">Book Name:</span>
                                        <span>{{ $order->book_name }}</span>
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
                                    <!-- Add a button to open the review modal -->
                                    @if(trim($order->status) === 'Shipped')
                                    <button onclick="openReviewModal('{{ $order->id }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Review Order
                                    </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-lg">No orders found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal overlay for review -->
<div id="reviewModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 hidden">
    <div class="flex items-center justify-center h-full">
        <div class="relative w-full max-w-md mx-auto p-6 bg-white rounded-lg shadow-xl">
            <!-- Content of create.blade.php -->
            <!-- Use Livewire or Alpine.js to include dynamic content -->
            <!-- For simplicity, I'll include a static version here -->
            <form action="{{ route('review.store') }}" method="POST" class="space-y-4">
                @csrf

                <input type="hidden" name="order_id" id="orderId">

                <label for="rating" class="block text-sm font-medium text-gray-700">Rating:</label>
                <input type="number" name="rating" id="rating" min="1" max="5" required
                       class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

                <label for="comment" class="block text-sm font-medium text-gray-700">Comment:</label>
                <textarea name="comment" id="comment" rows="3"
                          class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>

                <div class="flex justify-end">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Submit Review
                    </button>
                </div>
            </form>

            <!-- Close button -->
            <button onclick="closeReviewModal()"
                    class="absolute top-0 right-0 mt-4 mr-4 text-gray-600 hover:text-gray-900">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

    <script>
        // Function to open the review modal and populate orderId input
        function openReviewModal(orderId) {
            document.getElementById('orderId').value = orderId; // Set the orderId to the hidden input field
            document.getElementById('reviewModal').classList.remove('hidden'); // Show the modal
        }

        // Function to close the review modal
        function closeReviewModal() {
            document.getElementById('reviewModal').classList.add('hidden');
        }
    </script>
</x-app-layout>

